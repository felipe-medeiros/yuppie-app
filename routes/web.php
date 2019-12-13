<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('upload', 'UploadFileController')->name('upload');

Route::any('produtos/mass_store', 'ProdutoController@storeFromCSV')->name('produtos.mass_store');

Route::get('vendas', 'VendaController@index')->name('vendas');

Route::prefix('vendas')->group(function(){
    Route::get('nova', 'VendaController@create')->name('nova');
    Route::post('efetua', 'VendaController@efetuaVenda')->name('efetua');
});

Route::resources([
    'produtos' => 'ProdutoController',
    'alunos'   => 'AlunoController'
]);

