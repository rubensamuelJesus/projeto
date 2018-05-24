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

	protected $fillable = ['name','owner_id','account_type_id','date','code','description','start_balance','created_at','current_balance'];

	public function account_type(){
		return $this->belongsTo('App\Account_types','account_type_id','id');
	}

	public function movements(){
		return $this->hasMany('App\Movement','account_id','id');
	}

	
}
