<?php

use Illuminate\Support\Facades\Route;

    // //Price List
    // Route::get('/admin/price-lists', 'PriceListController@index')->name('priceLists.index');
    // Route::get('/admin/price-lists/create', 'PriceListController@create')->name('priceLists.create');
    // Route::get('/admin/price-lists/edit/{id}', 'PriceListController@edit')->name('priceLists.edit');
    // Route::patch('/admin/price-lists/update/{id}', 'PriceListController@update')->name('priceLists.update');
    // Route::post('/admin/price-lists/store', 'PriceListController@store')->name('priceLists.store');
    // Route::get('/admin/price-lists/get', 'PriceListController@getPriceLists')->name('get.priceLists');



    //Price List
    Route::controller('PriceListController')->prefix('/admin/price-lists')->name('price-lists.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/update/{id}', 'update')->name('update');
        Route::post('/store', 'store')->name('store');
        Route::delete('/destroy{id}', 'destroy')->name('destroy');
        Route::get('/get', 'priceListsGet')->name('get');
        Route::get('/import', 'priceListsImport')->name('import');
        Route::post('/upload', 'priceListsUpload')->name('upload');
        Route::get('/download', 'priceListsDownload')->name('download');
    });
