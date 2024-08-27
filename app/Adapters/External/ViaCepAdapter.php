<?php

namespace App\Adapters\External;

use App\Adapters\Contracts\ViaCepAdapterInterface;
use Illuminate\Support\Facades\Http;

class ViaCepAdapter implements ViaCepAdapterInterface
{
    private string $baseUri;
    public function __construct()
    {
        $this->baseUri = env('VIACEP');
    }

    public function getAllData(string $cep)
    {
        return Http::get($this->baseUri . $cep .'/json');
    }
}
