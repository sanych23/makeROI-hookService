<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingRequest;
use App\Jobs\MeetHandlerJob;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class HookHandlerController extends Controller
{
    public function meetDataHandler(MeetingRequest $request)
    {
        if($request->fails){
            return response(['message' => 'Invalid request'], 404)->header('Content-Type', 'application/json');
        }

        MeetHandlerJob::dispatch(Arr::get($request->validated(), 'meetingId'));

        return response(['message' => 'Success request'], 200)->header('Content-Type', 'application/json');
    }
}
