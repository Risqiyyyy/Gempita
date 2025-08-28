<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DeleteDuplicateImages extends Command
{
    protected $signature = 'images:delete-duplicates';
    protected $description = 'Delete duplicate images with similar names in large folders';

    public function handle()
    {
        // Gunakan path absolut
        $path = 'public/storage/photos/shares';
        $this->info("Checking directory: $path");

        if (!is_dir($path)) {
            $this->error("Directory not found: $path");
            return 1;
        }

        $this->info("Starting to scan files...");

        $rii = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS)
        );

        $grouped = [];
        $deletedCount = 0;
        $processed = 0;

        foreach ($rii as $file) {
            if (!$file->isFile()) continue;

            $processed++;
            if ($processed % 1000 === 0) {
                $this->info("Processed $processed files...");
            }

            $filename = $file->getFilename();
            $basename = strtolower($filename);
            $basename = preg_replace('/[-_ ]?(copy|\(\d+\)|\d+x\d+|_\d+)+/i', '', $basename);
            $basename = preg_replace('/\.(jpg|jpeg|png|webp)$/i', '', $basename);

            $grouped[$basename][] = $file;

            // Proses dan bersihkan grup bila terlalu banyak
            if (count($grouped) > 1000) {
                $deletedCount += $this->cleanDuplicates($grouped);
                $grouped = [];
            }
        }

        // Proses sisa grup terakhir
        $deletedCount += $this->cleanDuplicates($grouped);

        $this->info("Finished. Total files processed: $processed");
        $this->info("Total duplicates deleted: $deletedCount");

        return 0;
    }

    private function cleanDuplicates(array $grouped): int
    {
        $deleted = 0;

        foreach ($grouped as $files) {
            if (count($files) <= 1) continue;

            // Keep satu file, hapus sisanya
            array_shift($files);
            foreach ($files as $dup) {
                $path = $dup->getPathname();
                if (file_exists($path)) {
                    unlink($path);
                    $deleted++;
                }
            }
        }

        return $deleted;
    }
}
