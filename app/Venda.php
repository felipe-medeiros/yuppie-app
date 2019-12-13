<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'data', 'finalizada'
    ];

    /**
     * Relacionamento com Alunos
     */
    public function aluno(){
        return $this->belongsTo('App\Aluno');
    }

    /**
     * Relacionamento com Produtos
     */
    public function produtos(){
        return $this->belongsToMany('App\Produto', 'vendas_itens')->withPivot('preco','quantidade');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
