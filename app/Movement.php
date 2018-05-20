<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    // Overrides table name
	protected $table = 'movements';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;
}
