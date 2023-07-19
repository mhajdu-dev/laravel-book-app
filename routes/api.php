<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::resource('recipes', RecipeController::class);

//Public routes
Route::get('/recipes', [RecipeController::class, 'index']);
Route::get('/recipe/{id}', [RecipeController::class, 'show']);
Route::get('/recipe/search/{name}', [RecipeController::class, 'search']);


//Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/recipe', [RecipeController::class, 'store']);
    Route::put('/recipe/{id}', [RecipeController::class, 'update']);
    Route::delete('/recipe/{id}', [RecipeController::class, 'destroy']);
});
