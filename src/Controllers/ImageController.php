<?php

namespace App\Controllers;

use App\Models\Image;

class ImageController {
    public function index($url): void
    {
        $images = Image::fetchImages($url);
        $totalSize = Image::calculateTotalSize($images);
        require 'src/Views/images.php';
    }
}

