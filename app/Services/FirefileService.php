<?php

namespace App\Services;

use App\DTO\FireFileDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FirefileService
{
    const BASE_URL = 'https://api.fireflies.ai';
    private PendingRequest $client;

    public function __construct()
    {
        $this->client = Http::baseUrl(self::BASE_URL)
            ->withToken(config('services.firefile.token'));
    }

    public function get(string $meetId): FireFileDTO
    {
        $response = $this->client->asJson()->acceptJson()->post("graphql", [
            "query" => 'query Transcript($transcriptId: String!) { transcript(id: $transcriptId) { id title } }',
            "variables" => ["transcriptId" => $meetId]
        ]);


        $data = $response->json();

        return new FireFileDTO(
            Arr::get($data, 'data.transcript.id'),
            Arr::get($data, 'data.transcript.title'),
            $meetId
        );
    }
}
