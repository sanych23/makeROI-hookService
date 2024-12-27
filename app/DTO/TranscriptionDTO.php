<?php

namespace App\DTO;

use Spatie\LaravelData\Data;

class TranscriptionDTO extends Data
{
    public function __construct(
        public string $id,
        public string $title
    ) {
    }

    public static function makeFromApi(array $raw): TranscriptionDTO
    {
        return new TranscriptionDTO(data_get($raw, 'data.transcript.id'), data_get($raw, 'data.transcript.title'));
    }

    function getLeadId(): ?int
    {
        $leadId = collect(explode('|', $this->title))
            ->map(fn($e) => trim($e))
            ->last();
        return is_numeric($leadId) ? $leadId : null;
    }
}


