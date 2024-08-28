<?php

use Illuminate\Support\Facades\Route;
use App\Adapters\External\GoogleBooksAdapter;
use App\Livewire\{BookCrud, AuthorCrud};

Route::get('/', function () {
    return view('welcome');
});
Route::get('/books', BookCrud::class);

Route::get('/authors', AuthorCrud::class);
