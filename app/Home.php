<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
   	// Overrides table name
	protected $table = 'users';
	//
	protected $fillable = [
        'name', 'email', 'password', 'phone', 'profile_photo',
    ];
	// Overrides primary key
	protected $primaryKey = 'product_code';
	// Disables auto timestamps
	public $timestamps = false;
}
