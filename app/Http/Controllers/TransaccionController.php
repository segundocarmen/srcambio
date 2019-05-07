<?php

namespace App\Http\Controllers;
use App\Models\Srcambio;
use App\Models\Bancos;
use App\Models\Cuentas;
use App\Models\Transacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransaccionController extends Controller
{
    public function GetDatosCambiar()
    {
    	$bancos = Bancos::all();
    	$userdata =  Auth::user();
    	$id = $userdata->id;
    	$cuentas = Cuentas::where('users_id','=',$id)->get();
    	$datos = array(
			'bancos'	 => $bancos,
			'cuentas'  => $cuentas
		);
    	return $datos;
    }
    public function GetDatosTransferencia(Request $request)
    {
        $banco = Bancos::find($request->banco_id);
        $cuenta = Cuentas::find($request->cuenta_id);
        $data = DB::table('srcambio_datos AS s')
            ->join('banco AS b', 's.banco_id', '=', 'b.id')
            ->select('s.nombre','s.ruc','s.tipo_cuenta','s.nro_cuenta','b.nombre AS banco')
            ->get();

        $datos = array(
            'banco'     => $banco,
            'cuenta'  => $cuenta,
            'datos'     => $data
        );
        return $datos;
    }
    public function SaveTransferenciaStep1(Request $request)
    {
        $userdata =  Auth::user();
        $id = $userdata->id;
        $insert = array(
            'montoEnvia'     => $request->montoEnvia,
            'montoRecibe'  => $request->montoRecibe,
            'tipo_cambio_id'  => $request->idcambio,
            'banco_id'  => $request->lstBankOrigen,
            'cuenta_id'  => $request->lstCuentaDestino,
            'users_id'  => $id,
        );
        $nuevo = new Transacciones();
        $nuevo = $nuevo->create($insert);

        $result = array(
            'status'     => 'ok',
            'id'  => $nuevo->id,
        );
        return $result;
    }
    public function CancelarOperacion(Request $request)
    {
        $idTransaccion = $request->idTransaccion;
        $transaccion = Transacciones::findOrFail($idTransaccion);
        $transaccion->delete();
        $result = array(
            'status'     => 'ok'
        );
        return $result;
    }
    public function SaveCodigoVerificacion(Request $request)
    {
        $idTransaccion = $request->idTransaccion;
        $codigo = $request->codigo;
        $update = array(
            'codigo_operacion'  => $codigo
        );
        Transacciones::where('id', '=', $idTransaccion)->update($update);
        $result = array(
            'status'     => 'ok'
        );
        return $result;
    }
}
