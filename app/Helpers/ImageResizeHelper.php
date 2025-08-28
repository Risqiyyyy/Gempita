<?php

namespace App\Helpers;

use App\Models\ImageMetadata;
use Illuminate\Support\Facades\Storage;

class ImageResizeHelper
{
    public static function md5sum(string $filePath)
    {
        return md5_file($filePath);
    }

    public static function isDuplicateFile($filePath, $directory)
    {
        $hash = self::md5sum($filePath);

        $existingFiles = Storage::files($directory);

        foreach ($existingFiles as $file) {
            $existingFilePath = storage_path('app/' . $file);
            $existingFileHash = self::md5sum($existingFilePath);

            if ($existingFileHash === $hash) {
                return true;
            }
        }

        return false;
    }

    public static function resizeImage($image, $filename, $thumbFilename, $compFilename)
    {
        $extension = $image->getClientOriginalExtension();
        
        $path = $image->storeAs('public/gambar', $filename);
        $filePath = $image->getRealPath();
    
        list($width, $height) = getimagesize($image);
    
        $newWidth = 123;
        $newHeight = 123;
        
        $compWidth = 651;
        $compHeight = 360;
    
        $aspectRatio = $width / $height;
    
        if ($width > $height) {
            $newWidth = 123;
            $newHeight = round($newWidth / $aspectRatio);
        } else {
            $newHeight = 123;
            $newWidth = round($newHeight * $aspectRatio);
        }
    
        if ($width > $height) {
            $compWidth = 651;
            $compHeight = round($compWidth / $aspectRatio);
        } else {
            $compHeight = 360;
            $compWidth = round($compHeight * $aspectRatio);
        }
    
        $thumb = imagecreatetruecolor($newWidth, $newHeight);
        $compImage = imagecreatetruecolor($compWidth, $compHeight);
    
        if ($extension == 'jpeg' || $extension == 'jpg') {
            $source = imagecreatefromjpeg($image);
        } elseif ($extension == 'png') {
            $source = imagecreatefrompng($image);
        } elseif ($extension == 'gif') {
            $source = imagecreatefromgif($image);
        } elseif ($extension == 'webp') {
            $source = imagecreatefromwebp($image);
        } else {
            return ['error' => 'Tipe file tidak valid.'];
        }
    
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagecopyresampled($compImage, $source, 0, 0, 0, 0, $compWidth, $compHeight, $width, $height);
    
        $thumbPath = storage_path('app/public/photos/shares/' . $thumbFilename);
        $compPath = storage_path('app/public/comp/' . $compFilename);
    
        if ($extension == 'jpeg' || $extension == 'jpg') {
            imagejpeg($thumb, $thumbPath, 60);
            imagejpeg($compImage, $compPath, 90);
        } elseif ($extension == 'png') {
            imagepng($thumb, $thumbPath, 6);
            imagepng($compImage, $compPath, 6);
        }
    
        imagedestroy($thumb);
        imagedestroy($compImage);
        imagedestroy($source);

        $url = env('APP_URL');
        $ori = $url . '/storage/gambar/' . $filename;
        $thumburl = $url . '/storage/photos/shares/' . $thumbFilename;
        $comp_url = $url . '/storage/comp/' . $compFilename;

        ImageMetadata::create([
            'original_name'     => $thumbFilename,
            'url'     => $ori,
            'filename'     => $thumbFilename,
            'thumb_url'     => $thumburl,
            'comp_url'      => $comp_url,
        ]);
    
        return [
            'path' => 'gambar/' . $filename,
            'thumb_path' => 'photos/shares/' . $thumbFilename,
            'comp_path' => 'comp/' . $compFilename,
            'error' => 'File sudah ada di sistem.',
            'success' => 'Success'
        ];
    }
    
    

    public static function MigrasiResize($image, $filename, $thumbFilename)
    {
        $extension = pathinfo($image, PATHINFO_EXTENSION);

        $sourcePath = $image;

        $path = public_path('storage/gambar/' . $filename);
        copy($sourcePath, $path);

        list($width, $height) = getimagesize($sourcePath);

        $newWidth = 123;
        $newHeight = 123;

        $thumb = imagecreatetruecolor($newWidth, $newHeight);

        if ($extension == 'jpeg' || $extension == 'jpg') {
            $source = imagecreatefromjpeg($sourcePath);
        } elseif ($extension == 'png') {
            $source = imagecreatefrompng($sourcePath);
        } elseif ($extension == 'gif') {
            $source = imagecreatefromgif($sourcePath);
        } else {
            return ['error' => 'Tipe file tidak valid.'];
        }

        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $thumbPath = public_path('storage/photos/shares/' . $thumbFilename);

        if ($extension == 'jpeg' || $extension == 'jpg') {
            imagejpeg($thumb, $thumbPath, 60);
        } elseif ($extension == 'png') {
            imagepng($thumb, $thumbPath, 6);
        }

        imagedestroy($thumb);
        imagedestroy($source);

        return [
            'path' => 'gambar/' . $filename,
            'thumb_path' => 'photos/shares/' . $thumbFilename,
            'resized_path' => public_path('storage/photos/shares/' . $thumbFilename),
            'error' => 'File sudah ada di sistem.',
            'success' => 'Success'
        ];
    }

}

