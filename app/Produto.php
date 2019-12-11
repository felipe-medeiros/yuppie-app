<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
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
     * Relacionamento com Turmas
     */
    public function turmas(){
        return $this->belongsToMany('App\Turma');
    }

    /**
     * Relacionamento com Vendas
     */
    public function vendas(){
        return $this->belongsToMany('App\Venda');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
