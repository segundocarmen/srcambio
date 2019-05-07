<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{
	use SoftDeletes;
	protected $table = 'transacciones';
    protected $fillable = [
        'montoEnvia', 'montoRecibe', 'tipo_cambio_id', 'banco_id','cuenta_id','users_id','codigo_operacion'
    ];
}
