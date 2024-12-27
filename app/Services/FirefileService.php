<?php

namespace App\Services;

use App\DTO\TranscriptionDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class FirefileService
{
    const BASE_URL = 'https://api.fireflies.ai';
    private PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(self::BASE_URL)
            ->withToken(config('services.firefile.token'));
    }

    public function transcribe(string $meetId): TranscriptionDTO
    {
        $response = $this->client->asJson()->acceptJson()->post("graphql", [
            "query" => 'query Transcript($transcriptId: String!) { transcript(id: $transcriptId) { id title } }',
            "variables" => ["transcriptId" => $meetId]
        ]);

        return TranscriptionDTO::makeFromApi($response->json());
    }
}
