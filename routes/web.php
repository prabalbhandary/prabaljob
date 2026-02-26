<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'app' => 'Job Finder API + Filament Admin',
        'admin' => '/admin',
    ]);
});
