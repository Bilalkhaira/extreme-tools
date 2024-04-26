<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CarApiController;
use App\Http\Controllers\API\BlogApiController;
use App\Http\Controllers\API\CarRequestController;
use App\Http\Controllers\API\AdminToolApiController;
use App\Http\Controllers\API\SellerRequestApiController;
use App\Http\Controllers\API\ContactRequestApiController;

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

// Route::middleware('auth:sanctum')->get('/carPost', function (Request $request) {
// return $request->user();
// });

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    if(empty(User::where('email', $request->email)->first())){
        $success['status'] =  400;
        $success['message'] =  'user not exist';
        return response()->json($success);
    }
    $status = Password::sendResetLink(
        $request->only('email')
    );
    $success['status'] =  200;
    $success['message'] =  'true';
    return response()->json($success);
})->middleware('guest');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed',
    ]);
    $updatePassword = PasswordReset::where([
                'email' => $request->email,
                'token' => $request->token
            ])
             ->first();
    
    if (!$updatePassword) {
        $success['status'] =  400;
        $success['message'] =  'invalid token';
        return response()->json($success);
    }
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    $success['status'] =  200;
    $success['message'] =  'Password Update Successfully';
    return response()->json($success);
})->middleware('guest');



Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/validate-token/{token?}/{user_id?}', [UserController::class, 'validateToken']);

// Route::post('forget-password', [UserController::class, 'submitForgetPasswordForm']);
// Route::post('reset-password', [UserController::class, 'submitResetPasswordForm']);

Route::get('/tool_list', [AdminToolApiController::class, 'index']);
Route::get('/tool_detail/{id}', [AdminToolApiController::class, 'show']);
Route::get('/blog_list', [BlogApiController::class, 'index']);
Route::get('/blog_detail/{id}', [BlogApiController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('update-user-profile', [UserController::class, 'updateUserProfile']);
    Route::post('update-user-photo', [UserController::class, 'updateUserPhoto']);
    Route::get('/get-user/{id}', [UserController::class, 'getUser']);
});
