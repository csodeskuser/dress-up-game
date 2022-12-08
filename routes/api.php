<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('add-cloth', [ ClothController::class, 'store' ])->name('add_cloth');
Route::post('dress-up', [ ClothController::class, 'dressUp' ])->name('dress_up');
Route::post('dress-remove', [ ClothController::class, 'dressRemove' ])->name('dress_remove');
