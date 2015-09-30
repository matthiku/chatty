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
			// (but filter out the replies - see Status model!)
			$statuses = 
				Status::notReply()
					->where( 
						function($query) {
							return $query->where('user_id', Auth::user()->id)
								->orWhereIn('user_id', Auth::user()->friends()->lists('id'));
						})
				->orderBy('created_at', 'desc')
				->paginate(10);

			// provide statuses and replies to the view
			return view('timeline.index')
				->with('statuses', $statuses);

		}

		// for guests, simply show the home page
		return view('home');
	}

}