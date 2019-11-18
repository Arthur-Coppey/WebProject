<?php

namespace App\Http\Controllers;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class ImageDownloadController extends Controller
{
    public function imageDownload () {
        $zip_file = 'pictures'.time().'.zip';
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        $path = public_path('img');
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file) {
            $filePath = $file->getRealPath();
            $relativePath = 'img/' . substr($filePath, strlen($path) + 1);
            if (file_exists($file) && is_file($file)) {
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }
}
