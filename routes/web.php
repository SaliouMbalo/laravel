<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

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
    Route::resource('users', 'UsersController');

    // Agences
    Route::delete('agences/destroy', 'AgenceController@massDestroy')->name('agences.massDestroy');
    Route::resource('agences', 'AgenceController');

    // Affectations
    Route::delete('affectations/destroy', 'AffectationController@massDestroy')->name('affectations.massDestroy');
    Route::resource('affectations', 'AffectationController');

    // Comptes
    Route::delete('comptes/destroy', 'CompteController@massDestroy')->name('comptes.massDestroy');
    Route::resource('comptes', 'CompteController');

    // Clients
    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');
    Route::resource('clients', 'ClientController');

    // Depots
    Route::delete('depots/destroy', 'DepotController@massDestroy')->name('depots.massDestroy');
    Route::resource('depots', 'DepotController');
});
