<?php
/***
* Reviews model
* Gerhard Brink
*
*/

class Review extends Eloquent {
 
	public function gym(){
		return $this->belongsTo('Gym', 'gym_id');
	} 

}


?>
