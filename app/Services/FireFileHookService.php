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

    public function sendId()
    {
        $titleData = FireFileHelper::parseTitle($this->fireFile);

        Log::debug(Http::baseUrl(config('services.hook.url'))
            ->post('/', [
                'lead_id' => $titleData[2] ?? null,
                'link' => 'https://share.fireflies.ai/embed/meetings/meetingId',
                'title' => $this->fireFile->title
            ]));
    }
}

