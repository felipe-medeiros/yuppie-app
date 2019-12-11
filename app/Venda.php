<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    /**
     * Sobrescrevendo o nome da tabela
     * 
     * @var string
     */
    protected $table = 'Vendas';

    /**
     * @var array
     */
    protected $fillable = [
        'data', 'finalizada'
    ];

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
