<?php
/***
* Gyms
* Gerhard Brink
*
*/

use Nicolaslopezj\Searchable\SearchableTrait;

class Gym extends Eloquent {
 
	use SearchableTrait;

	protected $searchable = [
				'columns' => [
					'place' => 10,
					'name' => 10],
					];
					
	public function user(){
		return $this->belongsTo('User', 'user_id');
	} 

	public function categories(){
		return $this->belongsToMany('Category', 'gyms_categories', 'gym_id', 'category_id');
	}

	public function prices(){
		return $this->hasMany('Price');
	}

	public function openinghours(){
		return $this->hasMany('OpeningHour');
	}

	public function reviews(){
		return $this->hasMany('Review');
	}
	
}


?>