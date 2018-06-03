<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_types extends Model
{
    // Overrides table name
	protected $table = 'account_types';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;

	protected $fillable = ['name','id'];

	public function accounts(){
		return $this->hasMany('App\Account');
	}
}
