<?php


namespace Chatty\Models;

use Illuminate\Database\Eloquent\Model;


class Likeable extends Model
{

    // define the table name
    protected $table = 'likeable';


    // provide a polymorphic relationship
    public function likeable(  ) {
    	return $this->morphTo();
    }


    // get user of a like (normal relationship)
    // this means the local 'user_id' field is the key (id) to the foreign table 'User'
    public function user()
    {
    	return $this->belongsTo('Chatty\Models\User', 'user_id');
    }

}