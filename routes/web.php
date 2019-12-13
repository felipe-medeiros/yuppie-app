<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('upload', 'UploadFileController')->name('upload');

Route::any('produtos/mass_store', 'ProdutoController@storeFromCSV')->name('produtos.mass_store');

Route::resources([
    'produtos' => 'ProdutoController',
    'alunos'   => 'AlunoController'
]);

