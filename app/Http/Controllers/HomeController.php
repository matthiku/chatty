<?php

namespace Chatty\Http\Controllers;

class HomeController extends Controller
{
	public function index() {
		return view('timeline.index');
	}
}