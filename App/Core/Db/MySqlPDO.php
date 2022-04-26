<?php

namespace App\Core\Db;

use PDO;

class MySqlPDO
{

    public $conn;

    /**
     * Connection Informition
     */
    private $host = "localhost";
    private $dbname = DB_NAME;
    private $db_user = DB_USERNAME;
    private $db_pass = DB_PASSWORD;

    public $name = 'asdasd';
    public function __construct()
    {
        try {

            $this->conn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->db_user, $this->db_pass);
            $this->conn->exec("set names utf8");
            // set the PDO error mode to exception
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }



    /**
     * Select Methods
     */

    /* Select One Column [v1] */

    public function first($tableName, $wheres, $bindParams, $column = '*')
    {
        // Expload The Wheres WRODS
        $wheres = explode(',', $wheres);
        $data = []; // Empty Array For Set In Side
        foreach ($wheres as $w) { // Loop All Wheres Words
            $data[] = "AND " . $w . ' = ? ';
            $data[0] = str_replace("AND ", '', $data[0]); // Remove First (AND)
        }
        $wheres = implode($data); // Change To String

        $stmt = $this->conn->prepare("SELECT $column FROM $tableName WHERE $wheres");
        $stmt->execute($bindParams);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }



    /**
     * Update Data
     */
    public function update($table, $data = [], $where)
    {
        $columns = null;
        $values  = [];

        foreach ($data as $column => $value) {
            $columns .= ',`' . $column . '` = ?';
            $values[] = $value ;
        }

        $columns = substr($columns, 1); // Remove First (,)
    
        // // // Sql Query
        $stmt = $this->conn->prepare("UPDATE $table SET $columns WHERE $where");
        $stmt->execute($values);
        $row = $stmt->rowCount();

        // Return True 1 Or False 0
        return $row;
    }


    /**
     * Create IN DB v1
     */
    public function create($table, $data = [])
    {
        $columns = null;
        $values  = null;

        foreach ($data as $column => $value) {
            $columns .= ',`' . $column . '`';
            $values  .=  ':' . $column . ',';
        }

        $columns = substr($columns, 1); // Remove First (,)
        $values  = substr_replace($values, '', -1); // Remove First (,)


        $stmt = $this->conn->prepare("INSERT INTO $table($columns) VALUES($values)");
        $stmt->execute($data);
        $row = $stmt->rowCount();
        return $row;
    }






    /**
     * Select All Rows [v1] 
     */
    public function all($tableName, $where = null, $bindParams = [], $order_by = null, $column = '*', $limit = null)
    {

        // IF WHERE Not Null Print WHERE And Key
        $where = $where !== null ? "WHERE " . $where : null;
        // IF Npt Empty Params
        $bindParams = !empty($bindParams) ? $bindParams : null;
        // IF Not Null The Order
        $order_by = $order_by !== null ? "ORDER BY " . $order_by : null;

        // IF Limit Not Null Print
        $limit = $limit !== null ? "LIMIT " . $limit : "";

        $stmt = $this->conn->prepare("SELECT $column FROM $tableName $where $order_by $limit");
        $stmt->execute($bindParams);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }



    /**
     * Delete Methods
     */
    public function delete($table_name, $where)
    {

        // Sql Query
        $stmt = $this->conn->prepare("DELETE FROM $table_name WHERE $where");
        $stmt->execute();
        $row = $stmt->rowCount();
        // Return True 1 Or False 0
        return $row;
    }



    /**
     * Select All Rows [v1] 
     */
    public function selectLIKE($tableName, $where, $like, $column = '*')
    {


        $stmt = $this->conn->prepare("SELECT $column FROM $tableName WHERE $where LIKE '%$like%' ");
        $stmt->execute();
        $rows = $stmt->fetchAll();

        return $rows;
    }









    

    /**
     * Get Last ID Inserted In The Database
     */
    public function getLastId($table_name, $column_id)
    {
        // Sql Query
        $stmt = $this->conn->prepare("SELECT $column_id FROM $table_name ORDER BY $column_id DESC LIMIT 1");
        $stmt->execute();
        $row = $stmt->fetch();
        // Return The ID
        return $row[$column_id];
    }

    /**
     * Get Columns Numbers
     */
    public function numbersOfColumns($count, $table_name, $where = null, $bindParams = [])
    {
        // IF WHERE Not Null Print WHERE And Key
        $where = $where !== null ? "WHERE " . $where : null;

        // Sql Query
        $stmt = $this->conn->prepare(" SELECT count($count) FROM $table_name $where");
        $stmt->execute($bindParams);
        $row = $stmt->fetchColumn();
        // Return The ID
        return $row;
    }
}
