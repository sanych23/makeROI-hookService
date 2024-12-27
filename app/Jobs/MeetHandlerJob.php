<?php

namespace App\Jobs;

use App\Services\HookService;
use App\Services\FirefileService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class MeetHandlerJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $meetId)
    {}

    public function handle(FirefileService $firefileService): void
    {
        (new HookService($firefileService->transcribe($this->meetId)))->send();
    }
}
