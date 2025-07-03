<?php

namespace App\Services\Owner;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageService
{
    public static function upload($imageFile, $folderName)
    {
        if (is_array($imageFile)) {
            $file = $imageFile['image'];
        } else {
            $file = $imageFile;
        }
        $fileName = uniqid(rand() . '_');
        $extension = $file->extension();
        $fileNameToStore = $fileName . '.' . $extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($file);
        $resizedImage = $image->resize(1920, 1080)->encode();

        Storage::put('public/' . $folderName . '/' . $fileNameToStore, (string)$resizedImage);
        return $fileNameToStore;
    }
}
