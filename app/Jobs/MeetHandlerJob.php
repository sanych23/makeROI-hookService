<?php

namespace App\Jobs;

use App\libs\FireFileHelper;
use App\Services\FireFileHookService;
use App\Services\FirefileService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class MeetHandlerJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public $meetId,
    )
    {}

    public function handle(): void
    {
        $service = new FirefileService();

        (new FireFileHookService($service->get($this->meetId)))->sendId();

    }
}
