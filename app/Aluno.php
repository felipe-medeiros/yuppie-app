<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /**
     * Sobrescrevendo o nome da tabela
     * 
     * @var string
     */
    protected $table = 'Alunos';

    /**
     * @var string
     */
    protected $attributes = [
        'nome','data_nascimento','cep' => 5800000,'endereco' => 'Rua projetada','bairro','cidade','uf' 
    ];

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
