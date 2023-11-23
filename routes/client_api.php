<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
//use App\Http\Controllers\Auth\NewPasswordController;
//use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterUserController;
//use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as  Request;
use Illuminate\Support\Facades\Route;

$authMiddleware = ($isAPi ?? false) ? 'auth:api' : 'auth';

if (! ($isAPi ?? false)) {
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
    });

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware($authMiddleware);

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest.api');
}
Route::post('/register', [RegisterUserController::class, 'store'])
    ->middleware('guest.api');


