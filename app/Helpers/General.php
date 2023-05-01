<?php

use Illuminate\Support\Facades\Config;
function uploadImage($folder,$image){
    $extention=strtolower($image->extention());
    $filename=time().rand(100,999).'.'. $extention;
    $image->getClientOriginalName=$filename;
    $image->move($folder,$filename);
}


?>
