<?php

Route::group(['prefix' => 'v1'], function () {
    Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::get('/profile', [\App\Http\Controllers\Api\AuthController::class, 'profile'])->middleware('auth:sanctum');
    Route::post('/update-profile', [\App\Http\Controllers\Api\AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
    Route::post('/update-image', [\App\Http\Controllers\Api\AuthController::class, 'updateImage'])->middleware('auth:sanctum');
    Route::post('/forgot-password', [\App\Http\Controllers\Api\AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [\App\Http\Controllers\Api\AuthController::class, 'resetPassword']);
    Route::post('/resend-verification-email', [\App\Http\Controllers\Api\AuthController::class, 'resendVerificationEmail'])->middleware('auth:sanctum');

    Route::get('custom-datas/get/{custom_data}', [\App\Http\Controllers\Api\V1\Admin\CustomDataApiController::class, 'content']);


    Route::get('get-avatars', [\App\Http\Controllers\Api\V1\Admin\AvatarsApiController::class, 'index']);
    Route::get('get-colors', [\App\Http\Controllers\Api\V1\Admin\ColorsApiController::class, 'index']);
    Route::get('game-sessions/invitaition/{invitation_code}', [\App\Http\Controllers\Api\V1\Admin\GameSessionApiController::class, 'invitation']);


    Route::post('session-members/add-guest', [\App\Http\Controllers\Api\V1\Admin\SessionMembersApiController::class, 'addGuest']);

});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Profile
    Route::apiResource('profiles', 'ProfileApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // News
    Route::post('newss/media', 'NewsApiController@storeMedia')->name('newss.storeMedia');
    Route::apiResource('newss', 'NewsApiController');

    // Custom Data
    Route::post('custom-datas/media', 'CustomDataApiController@storeMedia')->name('custom-datas.storeMedia');
    Route::apiResource('custom-datas', 'CustomDataApiController');

    // Feedback
    Route::apiResource('feedbacks', 'FeedbackApiController');

    // Games
    Route::post('games/media', 'GamesApiController@storeMedia')->name('games.storeMedia');
    Route::apiResource('games', 'GamesApiController');

    // Game Session
    Route::apiResource('game-sessions', 'GameSessionApiController');

    // Session Members
    Route::apiResource('session-members', 'SessionMembersApiController');
    Route::post('session-members/check-already-in-session', 'SessionMembersApiController@checkAlreadyInSession');

    // Colors
    Route::apiResource('colors', 'ColorsApiController');

    // Chat
    Route::post('chats/media', 'ChatApiController@storeMedia')->name('chats.storeMedia');
    Route::apiResource('chats', 'ChatApiController');

    // Avatars
    Route::post('avatars/media', 'AvatarsApiController@storeMedia')->name('avatars.storeMedia');
    Route::apiResource('avatars', 'AvatarsApiController');
});
