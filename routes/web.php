<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'produtos' => 'ProdutoController',
    'alunos'   => 'AlunoController'
]);
