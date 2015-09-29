<?php

namespace Chatty\Http\Controllers;

use Auth;

use Chatty\Models\Status;

class HomeController extends Controller
{
	public function index() {

		// show timeline if user is authenticated
		if (Auth::check()) {
			// get the statuses (own and from friends)
			$statuses = Status::where( function($query) {
				return $query->where('user_id', Auth::user()->id)
					->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
			})
			->orderBy('created_at', 'desc')
			->paginate(10);
			// provide the statuses to the view
			return view('timeline.index')
				->with('statuses', $statuses);
		}
		return view('home');
	}
}