<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Jobs\MeetHandlerJob;
use Illuminate\Support\Facades\Log;

class HookHandlerController extends Controller
{
    public function __invoke(MeetingRequest $request)
    {
        MeetHandlerJob::dispatch($request->meetingId);
        return response()->json(['message' => 'Success request']);
    }
}
