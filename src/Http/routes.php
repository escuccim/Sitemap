<?php
Route::group(['middleware' => ['web']], function() {
    Route::get('sitemap/pages', 'MapController@pages');

    /* Sitemap Admin */
    Route::get('sitemapadmin', 'MapController@listPages');
    Route::get('sitemapadmin/create', 'MapController@create');
    Route::post('sitemapadmin', 'MapController@store');
    Route::get('sitemapadmin/{id}/edit', 'MapController@edit');
    Route::patch('sitemapadmin/{id}/edit', 'MapController@update');
    Route::delete('sitemapadmin/{id}', 'MapController@destroy');

    /* Sitemap Image Admin */
    Route::get('sitemapadmin/image/{page}/create', 'MapController@addImage');
    Route::post('sitemapadmin/image/{page}', 'MapController@storeImage');
    Route::get('sitemapadmin/image/{id}/edit', 'MapController@editImage');
    Route::patch('sitemapadmin/image/{id}/edit', 'MapController@updateImage');
    Route::delete('sitemapadmin/image/{id}', 'MapController@destroyImage');

    /* Sitemap Subdomain Admin */
    Route::get('sitemapadmin/subdomain/create', 'MapController@createSubdomain');
    Route::post('sitemapadmin/subdomain/create', 'MapController@storeSubdomain');
    Route::post('sitemapadmin/subdomain/setdefault', 'MapController@setDefault');
    Route::delete('sitemapadmin/subdomain/{id}', 'MapController@destroySubdomain');
    Route::get('sitemapadmin/subdomain/{id}', 'MapController@editSubdomain');
    Route::patch('sitemapadmin/subdomain/{id}', 'MapController@updateSubdomain');
});