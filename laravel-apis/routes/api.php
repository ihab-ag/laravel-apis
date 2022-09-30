<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssignmentController;

Route::get("/test",function (){
    return "Hello World";
});

Route::get('/sort_string/{str?}',[AssignmentController::class,'sortString']);

Route::get('/separate_number/{num?}',[AssignmentController::class,'separateNumber']);

Route::get('/number_to_binary/{str?}',[AssignmentController::class,'numToBinary']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
