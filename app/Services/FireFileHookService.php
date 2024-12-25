<?php

namespace App\Services;

use App\DTO\FireFileDTO;
use App\libs\FireFileHelper;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FireFileHookService
{

    public function __construct(
        protected FireFileDTO $fireFile
    ){}

    protected function request($data)
    {

    }

    public function sendId(): bool
    {
        $titleData = FireFileHelper::parseTitle($this->fireFile);

        if(count($titleData) < 3){
            Log::debug('Lead Id not found');
            return false;
        }

        Log::debug(Http::baseUrl(config('services.hook.url'))
            ->post(config('services.hook.uri'), [
                'lead_id' => $titleData[2],
                'link' => 'https://share.fireflies.ai/embed/meetings/meetingId'
            ]));

        return true;
    }
}

