
<?php
/***
* Price
* Gerhard Brink
*
*/

class Price extends Eloquent {
	
	public function gym(){
		return $this->belongsTo('Gym', 'gym_id');
	} 
	
}


?>