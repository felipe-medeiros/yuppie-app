<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    /**
     * Sobrescrevendo o nome da tabela
     * 
     * @var string
     */
    protected $table = 'Turmas'

    /**
     * @var string
     */
    protected $nome;

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;


}
