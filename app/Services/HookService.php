<?php

namespace App\Services;

use App\DTO\TranscriptionDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HookService
{
    private PendingRequest $request;

    public function __construct(protected TranscriptionDTO $fireFile) {
        $this->request = Http::baseUrl(config('services.hook.url'));
    }

    public function send(): void
    {
        Log::info($this->request->post('/', [
            'lead_id' => $this->fireFile->getLeadId(),
            'link' => "https://share.fireflies.ai/embed/meetings/{$this->fireFile->id}",
            'title' => $this->fireFile->title
        ]));
    }
}

