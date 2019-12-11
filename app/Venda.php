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
     * Relacionamento com Produtos
     */
    public function produtos(){
        return $this->belongsToMany('App\Produto');
    }

    /**
     * Dispensando o uso de timestamps
     * 
     * @var bool
     */
    public $timestamps = false;
}
