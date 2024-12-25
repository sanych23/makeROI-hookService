<?php

namespace App\DTO;
use Spatie\LaravelData\Data;

class FireFileDTO extends Data
{
    public function __construct(
        public string $id,
        public string $title,
    )
    {}
}


