<?php
Route::group(['middleware' => ['web']], function() {
    Route::get('sitemap/pages', 'MapController@pages');

    /* Sitemap Page Admin */
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

    /* Sitemap Index Admin */
    Route::get('sitemapadmin/index/create', 'MapController@createSitemap');
    Route::post('sitemapadmin/index', 'MapController@storeSitemap');
    Route::delete('sitemapadmin/index/{id}', 'MapController@destroySitemap');
    Route::get('sitemapadmin/index/{id}', 'MapController@editSitemap');
    Route::patch('sitemapadmin/index/{id}', 'MapController@updateSitemap');

    Route::get('sitemap', 'MapController@sitemapIndex');
});