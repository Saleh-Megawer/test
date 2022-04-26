<?php

use App\Core\Db\MySqlPDO;

function connect()
{
    return new MySqlPDO;
}

function first($table,$where,$bind,$column = '*')
{
    
    return connect()->first($table,$where,$bind,$column);
}




function count_columns($count,$table,$where,$bind)
{
    
    return connect()->numbersOfColumns($count,$table,$where,$bind);
}
