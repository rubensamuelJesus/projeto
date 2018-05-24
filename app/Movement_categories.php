<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement_categories extends Model
{
    // Overrides table name
	protected $table = 'movement_categories';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;

	public function movements(){
		return $this->hasMany('App\Movement');
	}

}
