<?php

namespace App\Utils;

class FileUtils
{
    public static function processUpload($file, $path)
    {
        if ($file instanceof \Illuminate\Http\UploadedFile) {
            if ($file->getSize() <= 10 * 1024 * 1024) {
                $filename = time() . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($path), $filename);
                return $filename;
            } else {
                throw new \Exception('Ukuran file tidak boleh lebih dari 10 MB.');
            }
        } elseif ($file) {
            throw new \Exception('File yang diterima tidak valid.');
        }

        return null;
    }
}
