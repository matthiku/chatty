<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Chatty\Models\Status;
use Illuminate\Http\Request;

use Auth;


class StatusController extends Controller
{


	// Add a new status

	public function postStatus(Request $request) {

		$this->validate($request, [
			'status' => 'required|max:1000'
		]);

		Auth::user()->statuses()->create([
			'body' => $request->input('status'),
		]);

		return redirect()->back()
			->with('info', 'Your status has been updated.');
	}



	// Add a new reply to a status

	public function postReply(Request $request, $statusId) {

		$this->validate( $request, [
			'reply-'.$statusId => 'required|max:1000',
		], [
			'required' => 'Enter your reply here',
			'max' => 'Limit of 1000 chars applies!',
		]);

		// find the status to which this reply belongs 
		$status = Status::notReply()->find($statusId);

		// fail if the status doesn't exist
		if ( ! $status ) {
			return redirect()->back()->with('info', 'Invalid status, reply cancelled'); 
		}

		// check if the currently authenticated user is friends with the owner of this status and not his own status
		if ( ! Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user_id ) {
			return redirect()->back()->with('info', 'Please establish friendship first! Reply cancelled.'); 
		}

		// get the reply text from the HTTP request
		$reply = $request->input('reply-'.$statusId);

		// create the reply record in the STATUSES table
		Auth::user()->statuses()->create([
			'body' => $reply,
			'parent_id' => $statusId,
		]);

		return redirect()->back()
			->with('info', 'Your reply has been posted.');	

		// An alternate way to create a reply is via the 'replies' method of the STATUS model:
		$reply = Status::create([
				'body' => $reply,
			])->user()->associate(Auth::user());

		// Now save it using the REPLIES method and thereby joining it via the parent_id (= status id)
		$status->replies()->save($reply);

	}	



	public function getLike($statusId)
	{

		$status = Status::find($statusId);

		// fail if the status doesn't exist
		if ( ! $status ) {
			return redirect()->back()->with('info', 'Invalid status, LIKE cancelled.'); 
		}


	}

}

