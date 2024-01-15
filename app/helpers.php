<?php

use \Image as Image;
/**
 * @param $img
 * @param $dir
 * @param $disk
 * @return string
 */
if(!function_exists('put_img_under_public'))
{
    function put_img_under_public($image , $dir = '') : string
    {
        if(is_object($image)) {
            $path = "/images/$dir";
            if(!File::isDirectory(public_path($path))) {
                File::makeDirectory(public_path($path));
            }
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path($path), $image_name);
            $image_full_path =  $path . $image_name;
        } else {
            $image_full_path = '';
        }
        return $image_full_path;
    }
}
