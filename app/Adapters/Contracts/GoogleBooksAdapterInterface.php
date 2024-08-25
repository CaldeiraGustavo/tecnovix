<?php

namespace App\Adapters\Contracts;

interface GoogleBooksAdapterInterface
{
    public function searchByname(string $name);
    public function searchByISBN(string $isbn);
}
