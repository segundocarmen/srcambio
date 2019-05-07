<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    use SoftDeletes;
	protected $table = 'paises';
    protected $fillable = [
        'nombre', 'codigo',
    ];
}
