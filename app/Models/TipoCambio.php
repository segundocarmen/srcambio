<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TipoCambio extends Model
{
	use SoftDeletes;
	protected $table = 'tipo_cambio';
    protected $fillable = [
        'paises_id','de', 'a', 'compra','venta',
    ];
}
