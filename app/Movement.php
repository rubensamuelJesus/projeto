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

	protected $fillable = [
        'date', 'type', 'category', 'description', 'value','account_id','movement_category_id','start_balance'
    ];

	public function account(){
		return $this->belongsTo('App\Account');
	}

	public function movement_categorie(){
		return $this->belongsTo('App\Movement_categories','movement_category_id','id');
	}

}
