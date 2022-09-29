<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/sort_string',[AssignmentController::class,"sortString"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
