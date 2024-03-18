<?php

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
Route::post('/create/user', [CreateController::class, 'createUser']);
Route::post('/create/quest', [CreateController::class, 'createQuest']);

Route::get('/make/task', [MakeController::class, 'makeTask']);

Route::get('/info/user', [InfoController::class, 'userInfo']);
