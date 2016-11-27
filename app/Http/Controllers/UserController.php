<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class UserController extends Controller
{
    //
	public function postLogin(Request $request) {
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required'
			]);

		if (Auth::attempt(['username' => $request['username'], 'password' => $request['password']])) {
			return redirect()->route('dashboard');
		}
		$message = "Invalid username or password.";
		return redirect()->route('home')->with($message);
	}

	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('home');
	}
}
