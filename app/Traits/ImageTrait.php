<?php

namespace App\Traits;

Trait ImageTrait
{

    function saveImage($image, $folder)
    {
        $file_extension = $image->getClientOriginalExtension();
        $file_name = time().'.'. $file_extension;
        $path = $folder;
        $image->move($path,$file_name);

        return $file_name;
    }

    function saveImage_1($image, $folder)
    {
        $file_extension = $image->getClientOriginalExtension();
        $filename_1 = time() . '_' . rand(1000,9999) . '.' . $file_extension;
        $path = $folder;
        $image->move($path,$filename_1);

        return $filename_1;
    }
//
//    function saveImage_2($image, $folder)
//    {
//        $file_extension = $image->getClientOriginalExtension();
//        $filename_2 = time().'.'. $file_extension;
//        $path = $folder;
//        $image->move($path,$filename_2);
//
//        return $filename_2;
//    }
//
//    function saveImage_3($image, $folder)
//    {
//        $file_extension = $image->getClientOriginalExtension();
//        $filename_3 = time().'.'. $file_extension;
//        $path = $folder;
//        $image->move($path,$filename_3);
//
//        return $filename_3;
//    }
//
//    function saveImage_4($image, $folder)
//    {
//        $file_extension = $image->getClientOriginalExtension();
//        $filename_4 = time().'.'. $file_extension;
//        $path = $folder;
//        $image->move($path,$filename_4);
//
//        return $filename_4;
//    }

};
