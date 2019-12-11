<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /**
     * @var string
     */
    protected $fillable = [
        'nome','data_nascimento','cep','endereco','bairro','cidade','uf' 
    ];

    /**
     * Definindo relacionamento com Turmas
     */
    public function turma(){
        return $this->belongsTo('App\Turma');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
