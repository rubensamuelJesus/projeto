<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associate_members extends Model
{
    // Overrides table name
	protected $table = 'associate_members';
	//
	// Overrides primary key
	protected $primaryKey = 'main_user_id';
	//protected $fillable = ['main_user_id'];
	// Disables auto timestamps
	public $timestamps = false;

	public function users(){
		return $this->hasMany('App\User');
	}
}
