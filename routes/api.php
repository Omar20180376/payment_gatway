<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

$isAPi = true;
require __DIR__.'/client_api.php';
Route::get('/user', function (Request $request) {
    /** @var \App\Models\User $user */
    $user = Auth::user();

    return response()->json([
        'isLoggedIn' => $user !== null,
        'user' => $user !== null ? [
            'Username' => $user->name,
            'name' => $user->name,
            'email' => $user->email,

        ] : null,
    ]);
})->middleware('auth:api');
