<?php

use Illuminate\Support\Facades\Route;
use App\Adapters\External\GoogleBooksAdapter;

Route::get('/', function () {
    return view('welcome');
});
