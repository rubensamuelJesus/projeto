<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    // Overrides table name
	protected $table = 'accounts';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;

	public function account_type(){
		return $this->belongsTo('App\Account_types');
	}
}
