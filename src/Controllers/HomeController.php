<?php

namespace App\Controllers;

class HomeController {
    public function index(): void
    {
        require 'src/Views/home.php';
    }
}

