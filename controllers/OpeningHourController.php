<?php

class OpeningHourController extends \BaseController {

	protected $layout = "layouts.main";

	public function __construct() {
		$this->beforeFilter('auth', array('only'=>array('create')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the categories
		$openinghours = OpeningHour::all();

		$this->layout->content = View::make('openinghours.index')
                        ->with('openinghours', $openinghours);

		// load the view and pass the nerds
		//return View::make('categories.index')
		//	->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($gym_id)
	{
		//
		$gym = Gym::find($gym_id);

		$this->layout->content = View::make('openinghours.create')->with('gym', $gym);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'day'       => 'required',
			'start'       => 'required',
			'close'       => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('openinghours/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$openinghour = new OpeningHour;
			$openinghour->day      = Input::get('day');
			$openinghour->start      = Input::get('start');
			$openinghour->close      = Input::get('close');

			if(empty(Input::get('special'))){
				$openinghour->special      = 0;
			}else{
				$openinghour->special      = 1;

				$openinghour->special_name      = Input::get('special_name');

				$date = explode('-', Input::get('date'));

				$openinghour->date = $date[2].'-'.$date[0].'-'.$date[1];

			}

			
			$openinghour->gym_id    = Input::get('gym_id');

			$openinghour->save();

			// redirect
			Session::flash('message', 'Successfully created openinghour.');
			return Redirect::to('gyms/'.Input::get('gym_id'));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        // get the nerd
        $openinghour = OpeningHour::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('openinghours.show')
                ->with('openinghour', $openinghour);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$openinghour = OpeningHour::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('openinghours.edit')
                ->with('openinghour', $openinghour);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'openinghour'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('openinghours/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$openinghour = OpeningHour::find($id);
			$openinghour->openinghour       = Input::get('openinghour');
			$openinghour->type      = Input::get('type');
			$openinghour->gym_id    = Input::get('gym_id');

			$openinghour->save();

			// redirect
			Session::flash('message', 'Successfully edited openinghour.');
			return Redirect::to('gyms/'.Input::get('gym_id'));
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$openinghour = OpeningHour::find($id);

		$gym_id = $openinghour->gym_id;

		$openinghour->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('gyms/'.$gym_id);
	}

}
