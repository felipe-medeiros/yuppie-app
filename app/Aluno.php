<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /**
     * @var string
     */
    protected $attributes = [
        'nome','data_nascimento','cep' => 5800000,'endereco' => 'Rua projetada','bairro','cidade','uf' 
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
