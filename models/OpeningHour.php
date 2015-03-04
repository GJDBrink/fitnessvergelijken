
<?php
/***
* OpeningHour
* Gerhard Brink
*
*/

class OpeningHour extends Eloquent {
	
	public function gym(){
		return $this->belongsTo('Gym', 'gym_id');
	} 
	
}


?>
