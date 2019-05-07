<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
	use SoftDeletes;
	protected $table = 'banco';
    protected $fillable = [
        'nombre', 'nombreCorto',
    ];
}
