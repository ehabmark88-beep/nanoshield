<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
Trait VideoTrait
{

    public function saveVideo($video, $folder)
    {
        $file_extension = $video->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = public_path($folder);

        // تأكد من وجود المجلد
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // حفظ الفيديو في التخزين العام
        $video->move($path, $file_name);

        return $file_name;
    }
};
