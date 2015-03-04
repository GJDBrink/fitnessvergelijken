<?php

class ReviewController extends \BaseController {

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
		$reviews = Review::all();

		$this->layout->content = View::make('reviews.index')
                        ->with('reviews', $reviews);

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

		$this->layout->content = View::make('reviews.create')->with('gym', $gym);
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
			'grade'       => 'required',
			'description' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('reviews/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$review = new Review;
			$review->grade       = Input::get('grade');
			$review->description      = Input::get('description');
			$review->gym_id    = Input::get('gym_id');

			$review->save();

			// redirect
			Session::flash('message', 'Successfully created review.');
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
        $review = Review::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('reviews.show')
                ->with('review', $review);

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
		$review = Review::find($id);

        // show the view and pass the nerd to it
        $this->layout->content = View::make('reviews.edit')
                ->with('review', $review);

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
			'review'       => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('reviews/create/'.Input::get('gym_id'))
				->withErrors($validator);
		} else {
			// store
			$review = Review::find($id);
			$review->review       = Input::get('review');
			$review->type      = Input::get('type');
			$review->gym_id    = Input::get('gym_id');

			$review->save();

			// redirect
			Session::flash('message', 'Successfully edited review.');
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
		$review = Review::find($id);

		$gym_id = $review->gym_id;

		$review->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('gyms/'.$gym_id);
	}

}
