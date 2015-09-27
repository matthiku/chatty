<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

	public function getSignup() 
	{
		return view('auth.signup');
	}


	public function postSignup(Request $request) 
	{
		$this->validate($request, [
			'email'    => 'required!unique:users|email|max:255',
			'username' => 'required!unique:users|alpha_dash|max:20',
			'password' => 'required!unique:users|min:6',
		]);

		dd('all good');
	}



}