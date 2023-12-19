<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\FormationController;
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


Route::post("register", [ApiController::class, "register"]);
Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function(){

    Route::get("profile", [ApiController::class, "profile"]);
    Route::get("refresh", [ApiController::class, "refreshToken"]);
    Route::get("logout", [ApiController::class, "logout"]);
});
//CRUD FORMATION
Route::post('/ajouterFormation', [FormationController::class, 'store']);
Route::get('/listerFormation', [FormationController::class, 'index']);
Route::get('/voirFormation/{formation}', [FormationController::class, 'show']);
Route::patch('/modifierFormation/{formation}', [FormationController::class, 'update']);
Route::patch('/supprimerFormation/{formation}', [FormationController::class, 'destroy']);
