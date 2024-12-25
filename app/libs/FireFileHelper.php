<?php

namespace App\libs;


use App\DTO\FireFileDTO;
use Illuminate\Support\Facades\Log;

class FireFileHelper
{
    static function parseTitle(FireFileDTO $fireFileData): array
    {
        $dataTitle = array_map(function ($item){
            return trim($item);
        }, explode("|", $fireFileData->title));

        return $dataTitle;
    }
}
