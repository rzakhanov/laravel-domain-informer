<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => '\\Rzakhanov\\DomainInformer\\Http\Controllers'
], function () {

    /*
     *  Show view
     * */
    Route::get('/info', 'DomainCheckController@show')->name('domainInformer.view');

    /*
     * Analyze domain
     * */
    Route::post('/info', 'DomainCheckController@check')->name('domainInformer.check');

});
