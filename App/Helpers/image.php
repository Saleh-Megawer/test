<?php

use Gumlet\ImageResize;


function image_resize($file, $new_file_name, $uploadToPath, $width, $height)
{
    $img_name = $file['name']; // Get Image Name

    $img_name = $new_file_name; // Change Image Name

    $image = new ImageResize($file['tmp_name']);

    $image->resizeToWidth($width);

    $image->resizeToHeight($height);

    return $image->save($uploadToPath . $img_name);

    
}
