<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;

use Auth;

class StatusController extends Controller
{
	public function postStatus(Request $request) {

		$this->validate($request, [
			'status' => 'required|max:1000'
		]);

		$status = $request->input('status');

		Auth::user()->statuses()->create([
			'body' => $status,
		]);

		return redirect()
			->route('home')
			->with('info', 'Your status has been updated.');
	}


	public function postReply(Request $request, $statusId) {

		$this->validate($request, [
			'status' => 'required|max:1000'
		]);
		
	}	
}