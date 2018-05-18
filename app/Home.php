<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
   	// Overrides table name
	protected $table = 'users';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;
}
