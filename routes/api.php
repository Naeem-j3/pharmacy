<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('password/email',  [AuthController::class, 'userForgetPassword']);
Route::post('password/code/check', [AuthController::class, 'userCheckCode']);
Route::post('password/reset', [AuthController::class, 'userResetPassword']);
// Route::get('admin', [AuthController::class,'test'])->middleware(['auth:api','isAdmin']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');