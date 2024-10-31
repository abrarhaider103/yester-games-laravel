<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();
Route::get('invitation/{invitation_code}', 'InvitationController@show')->name('invitation');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Profile
    Route::delete('profiles/destroy', 'ProfileController@massDestroy')->name('profiles.massDestroy');
    Route::resource('profiles', 'ProfileController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // News
    Route::delete('newss/destroy', 'NewsController@massDestroy')->name('newss.massDestroy');
    Route::post('newss/media', 'NewsController@storeMedia')->name('newss.storeMedia');
    Route::post('newss/ckmedia', 'NewsController@storeCKEditorImages')->name('newss.storeCKEditorImages');
    Route::resource('newss', 'NewsController');

    // Custom Data
    Route::delete('custom-datas/destroy', 'CustomDataController@massDestroy')->name('custom-datas.massDestroy');
    Route::post('custom-datas/media', 'CustomDataController@storeMedia')->name('custom-datas.storeMedia');
    Route::post('custom-datas/ckmedia', 'CustomDataController@storeCKEditorImages')->name('custom-datas.storeCKEditorImages');
    Route::resource('custom-datas', 'CustomDataController');

    // Feedback
    Route::delete('feedbacks/destroy', 'FeedbackController@massDestroy')->name('feedbacks.massDestroy');
    Route::resource('feedbacks', 'FeedbackController');

    // Games
    Route::delete('games/destroy', 'GamesController@massDestroy')->name('games.massDestroy');
    Route::post('games/media', 'GamesController@storeMedia')->name('games.storeMedia');
    Route::post('games/ckmedia', 'GamesController@storeCKEditorImages')->name('games.storeCKEditorImages');
    Route::resource('games', 'GamesController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Game Session
    Route::delete('game-sessions/destroy', 'GameSessionController@massDestroy')->name('game-sessions.massDestroy');
    Route::resource('game-sessions', 'GameSessionController');

    // Session Members
    Route::delete('session-members/destroy', 'SessionMembersController@massDestroy')->name('session-members.massDestroy');
    Route::resource('session-members', 'SessionMembersController');

    // Colors
    Route::delete('colors/destroy', 'ColorsController@massDestroy')->name('colors.massDestroy');
    Route::resource('colors', 'ColorsController');

    // Chat
    Route::delete('chats/destroy', 'ChatController@massDestroy')->name('chats.massDestroy');
    Route::post('chats/media', 'ChatController@storeMedia')->name('chats.storeMedia');
    Route::post('chats/ckmedia', 'ChatController@storeCKEditorImages')->name('chats.storeCKEditorImages');
    Route::resource('chats', 'ChatController');

    // Avatars
    Route::delete('avatars/destroy', 'AvatarsController@massDestroy')->name('avatars.massDestroy');
    Route::post('avatars/media', 'AvatarsController@storeMedia')->name('avatars.storeMedia');
    Route::post('avatars/ckmedia', 'AvatarsController@storeCKEditorImages')->name('avatars.storeCKEditorImages');
    Route::resource('avatars', 'AvatarsController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
