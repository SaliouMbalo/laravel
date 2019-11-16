<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Agences
    Route::apiResource('agences', 'AgenceApiController');

    // Affectations
    Route::apiResource('affectations', 'AffectationApiController');

    // Comptes
    Route::apiResource('comptes', 'CompteApiController');

    // Clients
    Route::apiResource('clients', 'ClientApiController');

    // Depots
    Route::apiResource('depots', 'DepotApiController');
});
