<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HookHandlerController;

Route::post('webhooks/meeting', HookHandlerController::class)->name('webhooks.meeting');


