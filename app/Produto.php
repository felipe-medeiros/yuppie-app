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
    protected $fillable = [
        'nome','estoque','preco'
    ];

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
        return $this->belongsToMany('App\Venda', 'produto_turma');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
