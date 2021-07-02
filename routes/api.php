<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FavoriteController;

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

// REGISTER
// LOGIN
// LOGOUT
Route::prefix('auth')->group(function() {
    //api/auth/register
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:api');
    Route::get('auth-failed', [AuthController::class, 'authFailed'])->name('auth-failed');
});

// API RESOURCES 
// Route::get('opportunities', [OpportunityController::class, 'index']);
// Route::get('opportunity', [OpportunityController::class, 'show']);

Route::group(['prefix' => 'lookups', 'middleware' => 'auth:api'], function () {
    
    Route::resource('category', 'CategoryController');    
    Route::resource('country', 'CountryController');    
});

Route::group(['middleware' => 'auth:api'], function() {
    
    // Opportunities
    Route::resource('opportunity', 'OpportunityController');

    // Questions
    Route::get('questions', 'QuestionController@index');
    Route::post('question', 'QuestionController@store');
    Route::put('question/{question}', 'QuestionController@update');

    // Questions
    Route::get('favorites', 'FavoriteController@index');
    Route::post('favorite', 'FavoriteController@store');
    Route::put('favorite/{favorite}', 'FavoriteController@update');


});