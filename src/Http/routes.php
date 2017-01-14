<?php
Route::group(['middleware' => ['web']], function() {
    Route::get('sitemap', 'SiteMapController@index');
    Route::get('sitemap/pages', 'SiteMapController@pages');
});

Route::group(['middleware' => ['admin']], function() {
    /* Sitemap Admin */
    Route::get('sitemapadmin', 'SiteMapController@list');
    Route::get('sitemapadmin/create', 'SiteMapController@create');
    Route::post('sitemapadmin', 'SiteMapController@store');
    Route::get('sitemapadmin/{id}/edit', 'SiteMapController@edit');
    Route::patch('sitemapadmin/{id}/edit', 'SiteMapController@update');
    Route::delete('sitemapadmin/{id}', 'SiteMapController@destroy');

    /* Sitemap Image Admin */
    Route::get('sitemapadmin/image/{page}/create', 'SiteMapController@addImage');
    Route::post('sitemapadmin/image/{page}', 'SiteMapController@storeImage');
    Route::get('sitemapadmin/image/{id}/edit', 'SiteMapController@editImage');
    Route::patch('sitemapadmin/image/{id}/edit', 'SiteMapController@updateImage');
    Route::delete('sitemapadmin/image/{id}', 'SiteMapController@destroyImage');

    /* Sitemap Subdomain Admin */
    Route::get('sitemapadmin/subdomain/create', 'SiteMapController@createSubdomain');
    Route::post('sitemapadmin/subdomain/create', 'SiteMapController@storeSubdomain');
    Route::post('sitemapadmin/subdomain/setdefault', 'SiteMapController@setDefault');
    Route::delete('sitemapadmin/subdomain/{id}', 'SiteMapController@destroySubdomain');
    Route::get('sitemapadmin/subdomain/{id}', 'SiteMapController@editSubdomain');
    Route::patch('sitemapadmin/subdomain/{id}', 'SiteMapController@updateSubdomain');
});