<?php

////////////////// Global Helper Function


/**
 * Print R Data
 */
function pr($data)
{
   echo "<pre>";
   print_r($data);
   echo "</pre>";
}
/**
 * Var Dump Data
 */
function vd($data)
{
   echo "<pre>";
   var_dump($data);
   echo "</pre>";
}


/**
 * assets Helper Function To Get From Public Folder
 */
function asset($link)
{
   $link = str_replace('/', '\\', $link);
   return PUBLIC_PATH . $link;
}



/**
 * Redirect v1
 */
function redirect($to = null)
{
   $to = $to == null ? APP_URL : APP_URL . $to;

   $to = str_replace('\\', '/', $to);

   header("Location:" . $to);
   exit();
}

/**
 * Back Last Page 
 */
function back()
{
   header("Location:" . $_SERVER['HTTP_REFERER']);
   exit();
}

/**
 * Random Name
 */
function random_name($input)
{
   return time() . '_' . rand(999, 10000) . $input;
}
function delete_file($dir, $fileName)
{
    if (file_exists($dir . $fileName)) {
        unlink($dir . $fileName);
    }
}

/**
 * url v1
 */
function url($to = null)
{
   echo str_replace('\\', '/', APP_URL . $to);
}

function go($to = null)
{
   return str_replace('\\', '/', APP_URL . $to);
}



/**
 * Get Current DateTime
 */
function now()
{
   return date('Y-m-d h:i:s');
}



/**
 * Return Json Data
 */
function json($data)
{
   header("Content-type: application/json");
   $res = ['status' => 'success', 'message' => 'تم اضافة البيانات بنجاح'];
   return json_encode($data, JSON_UNESCAPED_UNICODE);
}


function if_equal($f_val, $l_val, $set_content, $other_content)
{
   if ($f_val == $l_val) {
      return $set_content;
   } else {
      return $other_content;
   }
}


/**
 * Check Image Function
 * 
 * $img_name = The Image Name Like ( image.png )
 * 
 * $path_to_get_img = Get Image From URL
 * 
 * $default_img = Get Default Image IF Main Image Not Exist
 * 
 */
function check_image($img_name, $path_to_get_img, $default_img)
{
   if (empty($img_name)) {

      $img  = asset($default_img);
   } else {

      if (file_exists(PUBLIC_DIR . $path_to_get_img . $img_name)) {

         $img = asset($path_to_get_img . $img_name);
      } else {

         $img = asset($default_img);
      }
   }

   return $img;
}




/**
 * Selected In Select Box
 */

function selected($value_1,$value_2)
{
   if ($value_1 == $value_2) {
      echo 'selected';
   }
}



/**
 * Set Active Class
 */
function active_page($title,$page_name,$class_name = 'active')
{ 
   if($title == $page_name){
      echo $class_name;
   }
}




function public_path($path = null)
{
   echo PUBLIC_PATH . str_replace('/','\\',$path);
}