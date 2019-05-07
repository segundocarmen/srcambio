<?php

namespace App\Http\Controllers;
use App\Models\Srcambio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SrcambioController extends Controller
{
    public function getDatosEmpresa()
    {
    	$datos = Srcambio::all();
    	return $datos;
    }
}
