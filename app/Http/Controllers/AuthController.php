<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;

use Chatty\Models\User;

use Auth;

class AuthController extends Controller
{


	/**
	 *
	 *   SIGN UP   methods
	 *
	 */
	// GET request (show form)
	public function getSignup() 
	{
		return view('auth.signup');
	}
	// POST request (process form submit)
	public function postSignup(Request $request) 
	{
		// Validate the input
		// (excpetions will immediately trigger a redirect to the getSignup() method)
		$this->validate($request, [
			'email'    => 'required|unique:users|email|max:255',
			'username' => 'required|unique:users|alpha_dash|max:20',
			'password' => 'required|min:6'
		]);

		// now create a new user record using the User Model
		User::create([
			'email' => $request->input('email'),
			'username' => $request->input('username'),
			'password' => bcrypt($request->input('password')),
		]);

		// redirect the user to the home page
		return redirect()
			->route('home')
			->with('info', 'Your account has been created and you can now sign in.'
				);
	}




	/**
	 *
	 *   SIGN IN  methods
	 *
	 */
	// GET request (show form)
	public function getSignin() 
	{
		return view('auth.signin');
	}
	// POST request (process form submit)
	public function postSignin(Request $request) 
	{
		// Validate the input
		// (excpetions will immediately trigger a redirect to the getSignup() method)
		$this->validate($request, [
			'email'    => 'required_without:username|email|max:255',
			'username' => 'required_without:email|alpha_dash|max:20',
			'password' => 'required|min:6'
		]);

		// check which field was filled out as users can sign in with either email or username
		if ($request->get('username')==='') {
			// attempt to sign in with email
			Auth::attempt( $request->only(['email', 'password']), $request->has('remember') );

		} else {
			// attempt to sign in with username
			Auth::attempt( $request->only(['username', 'password']), $request->has('remember') );
		}
		// was it successful?
		if ( ! Auth::check() ) {
			return redirect()->back()->with('info', 'Could not sign you in with those details!');
		}
		return redirect()->route('home')->with('info', 'You are now signed in');
	}





	/**
	 *
	 *   SIGN OUT   method
	 *
	 */
	// GET request (show form)
	public function getSignout() 
	{
		Auth::logout();
		return redirect()->route('home')->with('info', 'You have been signed out.');
	}



}