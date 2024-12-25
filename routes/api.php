<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HookHandlerController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::controller(HookHandlerController::class)->group(function (){
    Route::prefix('handlers')->group(function (){
       Route::post('/meeting', [HookHandlerController::class, 'meetDataHandler']);
    });
});


