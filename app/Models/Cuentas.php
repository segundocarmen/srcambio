<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
	use SoftDeletes;
	protected $table = 'cuenta';
    protected $fillable = [
        'nombre', 'nro_cuenta', 'banco_id', 'users_id',
    ];
}
