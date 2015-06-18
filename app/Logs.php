<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Logs extends Model {
	protected $table = 'logs';

	public function card()
	{
		return $this->belongsTo('\App\Cards', 'card_id');
	}

}
