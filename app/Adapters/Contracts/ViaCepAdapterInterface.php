<?php

namespace App\Adapters\Contracts;

interface ViaCepAdapterInterface
{
    public function getAllData(string $cep);
}
