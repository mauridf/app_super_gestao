<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Sanctum;

class Produto extends Model
{
    protected $fillable = ['nome','site','descricao','peso','unidade_id', 'fornecedor_id'];

    public function produtoDetalhe(){
        return $this->hasOne('App\Models\ProdutoDetalhe');
    }

    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor');
    }

    public function pedidos(){
        return $this->belongsToMany('App\Models\Pedido','pedidos_produto','produto_id','pedido_id');
    }
}
