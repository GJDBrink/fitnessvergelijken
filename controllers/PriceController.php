<?php

class PriceController extends \BaseController {

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
		$prices = Price::all();

		$this->layout->content = View::make('prices.index')
                        ->with('prices', $prices);

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

		$this->layout->content = View::make('prices.create')->with('gym', $gym);
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
			'price'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('prices/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$price = new Price;
			$price->price       = Input::get('price');
			$price->type      = Input::get('type');
			$price->gym_id    = Input::get('gym_id');

			$price->save();

			// redirect
			Session::flash('message', 'Successfully created price.');
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
        $price = Price::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('prices.show')
                ->with('price', $price);

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
		$price = Price::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('prices.edit')
                ->with('price', $price);

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
			'price'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('prices/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$price = Price::find($id);
			$price->price       = Input::get('price');
			$price->type      = Input::get('type');
			$price->gym_id    = Input::get('gym_id');

			$price->save();

			// redirect
			Session::flash('message', 'Successfully edited price.');
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
		$price = Price::find($id);

		$gym_id = $price->gym_id;

		$price->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('gyms/'.$gym_id);
	}

}
