<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    // Overrides table name
	protected $table = 'documents';
	//
	// Overrides primary key
	protected $primaryKey = 'id';
	// Disables auto timestamps
	public $timestamps = false;

	protected $fillable = ['id','original_name','description','created_at','type'];

	/*public function accounts(){
		return $this->hasMany('App\Account');
	}*/
}
