<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




// Route::middleware('auth:sanctum')->group(function (){
//     Route::delete('/lost-items/{lostItem}/delete', [ApiController::class , "deleteLostItem"]);
// });

Route::delete('/lost-items/{lostItem}/delete', [ApiController::class , "deleteLostItem"]);
Route::delete('/found-items/{foundItem}/delete', [ApiController::class , "deleteFoundItem"]);
Route::delete('/admin-dashboard/{User}/delete', [ApiController::class , "destroyUser"]);