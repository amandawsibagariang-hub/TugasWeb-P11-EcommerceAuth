<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('about', function () {
    $this->info('Tugas Rutin 11 - E-Commerce DB + Secure Auth');
})->purpose('Display application information');
