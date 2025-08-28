<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Helpers\ImageResizeHelper;

class ResizeImages extends Command
{
    protected $signature = 'images:resize';
    protected $description = 'Resize images and move them to the destination folder';

    // public function handle()
    // {
    //     ini_set('memory_limit', '-1');

    //     $sourceDir = public_path('storage/gambar/*');
    //     $destinationDir = public_path('storage/photos/shares');

    //     if (!File::exists($sourceDir)) {
    //         $this->error("❌ Folder sumber tidak ditemukan di: $sourceDir");
    //         return;
    //     }

    //     $this->info("📂 Memeriksa folder sumber: $sourceDir");

    //     if (!File::exists($destinationDir)) {
    //         $this->info("📂 Folder tujuan tidak ada, membuat folder baru: $destinationDir");
    //         File::makeDirectory($destinationDir, 0777, true);
    //     }

    //     $allFiles = array_diff(scandir($sourceDir), array('.', '..'));
    //     $imagePaths = [];

    //     foreach ($allFiles as $file) {
    //         if (preg_match('/\.(jpg|jpeg|png)$/i', $file)) {
    //             $imagePaths[] = $file;
    //         }
    //     }

    //     $this->info("🔍 Jumlah file ditemukan: " . count($imagePaths));

    //     if (empty($imagePaths)) {
    //         $this->info("❌ Tidak ada file gambar di folder sumber.");
    //         return;
    //     }

    //     $batchSize = 500;
    //     $chunks = array_chunk($imagePaths, $batchSize);

    //     foreach ($chunks as $batch) {
    //         foreach ($batch as $file) {
    //             $imagePath = $sourceDir . '/' . $file;
    //             $filename = basename($file);

    //             if (preg_match('/-\d+x\d+\.(jpg|jpeg|png)$/i', $filename)) {
    //                 $this->line("<fg=yellow>⏩ Melewati file duplikat: $filename</>");
    //                 continue;
    //             }

    //             if (File::exists($destinationDir . '/' . $filename)) {
    //                 $this->line("<fg=yellow>File sudah ada: $filename, melewati file ini.</>");
    //                 continue;
    //             }

    //             $this->info("🔄 Memulai proses resize untuk: $filename");

    //             $resizeResult = ImageResizeHelper::MigrasiResize($imagePath, $filename, $filename);

    //             if (!isset($resizeResult['resized_path']) || isset($resizeResult['error'])) {
    //                 $this->error("❌ Error resizing image: $filename");
    //                 continue;
    //             }

    //             $destinationPath = $destinationDir . '/' . $filename;

    //             if (File::move($resizeResult['resized_path'], $destinationPath)) {
    //                 $this->info("✅ Berhasil memindahkan gambar ke folder tujuan: $destinationPath");
    //             } else {
    //                 $this->error("❌ Gagal memindahkan gambar ke folder tujuan: $destinationPath");
    //             }

    //             gc_collect_cycles();
    //             sleep(1);
    //         }
    //     }

    //     $this->info('📦 Proses resize gambar selesai.');
    // }

    // public function handle()
    // {
    //     ini_set('memory_limit', '-1');

    //     $sourceDir = public_path('storage/gambar');
    //     $destinationDir = public_path('storage/photos/shares');

    //     if (!File::exists($sourceDir)) {
    //         $this->error("❌ Folder sumber tidak ditemukan di: $sourceDir");
    //         return;
    //     }

    //     $this->info("📂 Memeriksa folder sumber: $sourceDir");

    //     if (!File::exists($destinationDir)) {
    //         $this->info("📂 Folder tujuan tidak ada, membuat folder baru: $destinationDir");
    //         File::makeDirectory($destinationDir, 0777, true);
    //     }

    //     $allFiles = File::allFiles($sourceDir);
    //     $imagePaths = [];

    //     foreach ($allFiles as $file) {
    //         $filename = $file->getFilename();
    //         if (preg_match('/\.(jpg|jpeg|png)$/i', $filename)) {
    //             $imagePaths[] = $file;
    //         }
    //     }

    //     $this->info("🔍 Jumlah file ditemukan: " . count($imagePaths));

    //     if (empty($imagePaths)) {
    //         $this->info("❌ Tidak ada file gambar di folder sumber.");
    //         return;
    //     }

    //     $batchSize = 500;
    //     $chunks = array_chunk($imagePaths, $batchSize);

    //     foreach ($chunks as $batch) {
    //         foreach ($batch as $file) {
    //             $imagePath = $file->getRealPath();
    //             $filename = $file->getFilename();

    //             if (preg_match('/-\d+x\d+\.(jpg|jpeg|png)$/i', $filename)) {
    //                 $this->line("<fg=yellow>⏩ Melewati file duplikat: $filename</>");
    //                 continue;
    //             }

    //             if (File::exists($destinationDir . '/' . $filename)) {
    //                 $this->line("<fg=yellow>File sudah ada: $filename, melewati file ini.</>");
    //                 continue;
    //             }

    //             $this->info("🔄 Memulai proses resize untuk: $filename");

    //             $resizeResult = ImageResizeHelper::MigrasiResize($imagePath, $filename, $filename);

    //             if (!isset($resizeResult['resized_path']) || isset($resizeResult['error'])) {
    //                 $this->error("❌ Error resizing image: $filename");
    //                 continue;
    //             }

    //             $destinationPath = $destinationDir . '/' . $filename;

    //             if (File::move($resizeResult['resized_path'], $destinationPath)) {
    //                 $this->info("✅ Berhasil memindahkan gambar ke folder tujuan: $destinationPath");
    //             } else {
    //                 $this->error("❌ Gagal memindahkan gambar ke folder tujuan: $destinationPath");
    //             }

    //             gc_collect_cycles();
    //             sleep(1);
    //         }
    //     }

    //     $this->info('📦 Proses resize gambar selesai.');
    // }
    
        public function handle()
    {
        ini_set('memory_limit', '-1');

        $srcList = [
            'storage/old_image/2022/01',
            'storage/old_image/2022/02',
            'storage/old_image/2022/03',
            'storage/old_image/2022/04',
            'storage/old_image/2022/05',
            'storage/old_image/2022/06',
            'storage/old_image/2022/07',
            'storage/old_image/2022/08',
            'storage/old_image/2022/09',
            'storage/old_image/2022/10',
            'storage/old_image/2022/11',
            'storage/old_image/2022/12',
            'storage/old_image/2023/01',
            'storage/old_image/2023/02',
            'storage/old_image/2023/03',
            'storage/old_image/2023/04',
            'storage/old_image/2023/05',
            'storage/old_image/2023/06',
            'storage/old_image/2023/07',
            'storage/old_image/2023/08',
            'storage/old_image/2023/09',
            'storage/old_image/2023/10',
            'storage/old_image/2023/11',
            'storage/old_image/2023/12',
            'storage/old_image/2024/01',
            'storage/old_image/2024/02',
            'storage/old_image/2024/03',
            'storage/old_image/2024/04',
            'storage/old_image/2024/05',
            'storage/old_image/2024/06',
            'storage/old_image/2024/07',
            'storage/old_image/2024/08',
            'storage/old_image/2024/09',
            'storage/old_image/2024/10',
            'storage/old_image/images',
        ];

        $destinationDir = public_path('storage/comp');
        $thumbDir = public_path('storage/photos/shares');

        if (!File::exists($destinationDir)) {
            $this->info("📂 Membuat folder tujuan gambar: $destinationDir");
            File::makeDirectory($destinationDir, 0777, true);
        }

        if (!File::exists($thumbDir)) {
            $this->info("📂 Membuat folder tujuan thumbnail: $thumbDir");
            File::makeDirectory($thumbDir, 0777, true);
        }

        foreach ($srcList as $src) {
            $sourceDir = public_path($src);

            if (!File::exists($sourceDir)) {
                $this->error("❌ Folder sumber tidak ditemukan di: $sourceDir");
                continue;
            }

            $this->info("📂 Memeriksa folder sumber: $sourceDir");

            $allFiles = File::allFiles($sourceDir);
            $imagePaths = [];

            foreach ($allFiles as $file) {
                if (preg_match('/\.(jpg|jpeg|png|webp)$/i', $file->getFilename())) {
                    $imagePaths[] = $file->getRealPath();
                }
            }

            $this->info("🔍 Jumlah file ditemukan di [$src]: " . count($imagePaths));

            if (empty($imagePaths)) {
                $this->info("❌ Tidak ada file gambar di folder sumber [$src].");
                continue;
            }

            foreach ($imagePaths as $imagePath) {
                $filename = basename($imagePath);

                $destImagePath = $destinationDir . '/' . $filename;
                $destThumbPath = $thumbDir . '/' . $filename;

                $this->info("🔄 Resize ke 651x360 → $destImagePath");
                $resizeMain = $this->resizeImage($imagePath, $destImagePath, 651, 360);

                if ($resizeMain) {
                    $this->info("✅ Berhasil simpan gambar di: $destImagePath");
                } else {
                    $this->error("❌ Gagal resize ke gambar: $filename");
                }

                $this->info("🔄 Resize thumbnail 123x123 → $destThumbPath");
                $resizeThumb = $this->resizeImage($imagePath, $destThumbPath, 123, 123);

                if ($resizeThumb) {
                    $this->info("✅ Berhasil simpan thumbnail di: $destThumbPath");
                } else {
                    $this->error("❌ Gagal resize thumbnail: $filename");
                }
            }

            $this->info("✅ Selesai memproses folder: $src");
        }

        $this->info('📦 Semua proses resize selesai.');
    }

    private function resizeImage($srcPath, $destPath, $newWidth, $newHeight)
    {
        $info = @getimagesize($srcPath); // suppress warning
        if (!$info) {
            $this->error("❌ Tidak bisa membaca informasi gambar: $srcPath (mungkin corrupt)");
            return false;
        }
    
        [$width, $height] = $info;
        $mime = $info['mime'];
    
        if (!in_array($mime, ['image/jpeg', 'image/png', 'image/webp'])) {
            $this->error("❌ Format tidak didukung: $mime ($srcPath)");
            return false;
        }
    
        $aspectRatio = $width / $height;
    
        if ($width > $height) {
            $newWidth = $newWidth;
            $newHeight = round($newWidth / $aspectRatio);
        } else {
            $newHeight = $newHeight;
            $newWidth = round($newHeight * $aspectRatio);
        }
    
        switch ($mime) {
            case 'image/jpeg':
                $srcImage = @imagecreatefromjpeg($srcPath);
                break;
            case 'image/png':
                $srcImage = @imagecreatefrompng($srcPath);
                break;
            case 'image/webp':
                $srcImage = @imagecreatefromwebp($srcPath);
                break;
            default:
                $this->error("❌ Tidak bisa buat resource gambar dari: $srcPath");
                return false;
        }
    
        if (!$srcImage) {
            $this->error("❌ Gagal membaca resource gambar: $srcPath");
            return false;
        }
    
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    
        if ($mime === 'image/png' || $mime === 'image/webp') {
            imagealphablending($resizedImage, false);
            imagesavealpha($resizedImage, true);
        }
    
        imagecopyresampled(
            $resizedImage, $srcImage,
            0, 0, 0, 0,
            $newWidth, $newHeight,
            $width, $height
        );
    
        $success = false;
        switch ($mime) {
            case 'image/jpeg':
                $success = imagejpeg($resizedImage, $destPath, 90);
                break;
            case 'image/png':
                $success = imagepng($resizedImage, $destPath, 9);
                break;
            case 'image/webp':
                $success = imagewebp($resizedImage, $destPath, 80);
                break;
        }
    
        imagedestroy($srcImage);
        imagedestroy($resizedImage);
    
        return $success;
    }
    
}