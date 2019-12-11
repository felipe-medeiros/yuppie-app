<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    /**
     * Sobrescrevendo o nome da tabela
     * 
     * @var string
     */
    protected $table = 'Produtos';

    /**
     * Definindo atributos
     * 
     * @var array
     */
    protected $attributes = [
        'nome','estoque' => 0
    ];

    /**
     * Atributo crítico, protegido contra ataques com SQL via HTTP
     * 
     * @var float
     */
    protected $preco;

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
