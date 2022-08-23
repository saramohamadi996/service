<?php

namespace Service\Service\Http\Traits;

trait uploadFileTrait
{
    /**
     * it upload file.
     * @param $file
     * @param $imagePath
     * @return string
     */
    public function uploadFile($file, $imagePath): string
    {
        $filename = $file->getClientOriginalName();
        public_path($imagePath . $filename);
        $m = uniqid() . rand('10000', '99999');
        $filename = $m . $filename;
        $file->move(public_path($imagePath), $filename);
        return $imagePath . '/' .$filename;
    }
}
