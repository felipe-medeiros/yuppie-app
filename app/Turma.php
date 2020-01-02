<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    /**
     * @var string
     */
    protected $fillable = ['nome'];

    /**
     * Definindo relacionamento com Alunos
     */
    public function alunos(){
        return $this->hasMany('App\Aluno');
    }

    /**
     * Relacionamento com Produtos
     */
    public function produtos(){
        return $this->belongsToMany('App\Produto', 'turmas_materiais');
    }

    /**
     * Relacionamento com Vendas através de Alunos
     */
    public function vendas(){
        return $this->hasManyThrough('App\Venda', 'App\Aluno');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;


}
