<?php
// File: api/index.php

// Pastikan autoloader Composer dimuat
require __DIR__ . '/../vendor/autoload.php';

// Atur variabel environment (penting untuk APP_URL)
$app_url = $_ENV['APP_URL'] ?? 'http://localhost';
$_SERVER['APP_URL'] = $app_url;
$_SERVER['SERVER_NAME'] = parse_url($app_url, PHP_URL_HOST);

// Hapus prefix '/api' dari URI agar Laravel Routing bekerja
$_SERVER['REQUEST_URI'] = str_replace('/api', '', $_SERVER['REQUEST_URI']);

// Jika URI kosong setelah penghapusan, gunakan root path
if (empty($_SERVER['REQUEST_URI'])) {
    $_SERVER['REQUEST_URI'] = '/';
}

// Lakukan bootstrapping Laravel dan handle request
$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
)->send();

$kernel->terminate($request, $response);