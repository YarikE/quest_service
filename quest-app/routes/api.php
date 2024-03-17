<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Info\InfoController;
use App\Http\Controllers\Make\MakeController;
use App\Http\Controllers\Create\CreateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/create/user', [CreateController::class, 'createUser']);
Route::post('/create/quest', [CreateController::class, 'createQuest']);

Route::get('/make/make-task', [MakeController::class, 'makeTask']);

Route::get('/info/user-info', [InfoController::class, 'userInfo']);
