<?php

namespace App\Adapters\External;

use App\Adapters\Contracts\GoogleBooksAdapterInterface;
use Illuminate\Support\Facades\Http;

class GoogleBooksAdapter implements GoogleBooksAdapterInterface
{
    private string $baseUri;
    public function __construct()
    {
        $this->baseUri = env('GOOGLE_BOOKS');
    }

    public function searchByname(string $name)
    {
        return Http::get($this->baseUri . 'title:' . $name)->json();
    }

    public function searchByISBN(string $ISBN)
    {
        return Http::get($this->baseUri . 'ISBN:' . $ISBN)->json();
    }
}
