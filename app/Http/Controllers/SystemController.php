<?php

namespace App\Http\Controllers;
use App\Models\Paises;
use App\Models\TipoCambio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SystemController extends Controller
{
	public function ShowSystem()
	{
		return view('aplication');
	}
	public function GetCambio()
	{
		$pais = Paises::where('codigo','=','PE')->get();
		$tipoCambio=TipoCambio::where('paises_id','=',$pais[0]->id)->get();
		return $tipoCambio[0];
	}
	public function IsLoged()
	{
		if (Auth::check()){
            return 1;
        }else{
            return 0; 
        }
	}
}
