<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Logearse(Request $request)
    {
    	$correo = $request->input('correo');
		$password = $request->input('password');
		$userdata = array(
			'email'	 => $correo,
			'password'  => $password
		);

		if (Auth::attempt($userdata)) {
			return Redirect::to('cambiar');
		}else{
			return Redirect::to('login');
		}
    }
    public function Logout()
    {
    	Auth::logout();
		Session::flush();
		return  Redirect::to('/');
    }
}
