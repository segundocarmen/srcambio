<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Srcambio extends Model
{
    use SoftDeletes;
	protected $table = 'srcambio_datos';
    protected $fillable = [
        'nombre', 'ruc', 'banco_id', 'tipo_cuenta', 'nro_cuenta',
    ];
}
