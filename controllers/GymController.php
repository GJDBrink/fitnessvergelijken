<?php

class GymController extends \BaseController {

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
		$gyms = Gym::all();

		$this->layout->content = View::make('gyms.index')
                        ->with('gyms', $gyms);

		// load the view and pass the nerds
		//return View::make('categories.index')
		//	->with('categories', $categories);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$categories = Category::all();

		$categories_select;

		foreach ($categories as $key => $value) {
			# code...
			$categories_select[$value['id']] = $value['name'];
		}

		$this->layout->content = View::make('gyms.create')->with('categories', $categories_select);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'place'      => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('categories/create')
				->withErrors($validator);
		} else {
			// store
			$gym = new Gym;
			$gym->name       = Input::get('name');
			$gym->place      = Input::get('place');
			$gym->address    = Input::get('address');
			$gym->postal     = Input::get('postal');
			$gym->house_nr   = Input::get('house_nr');

			$gym->user_id    = Auth::id();
			$gym->save();

			$categories = Input::get('categories');

			foreach ($categories as $key => $value) {
				# code...
				$gym->categories()->attach($value);
			}

			// redirect
			Session::flash('message', 'Successfully created gym.');
			return Redirect::to('gyms');
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
                $gym = Gym::find($id);

                // show the view and pass the nerd to it
                $this->layout->content = View::make('gyms.show')
                        ->with('gym', $gym);

	}

	public function place($place){
		$this->layout = View::make('layouts.default');

		$gyms = Gym::where('place','=',$place)->get();

		$this->layout->content = View::make('gyms.index')->with('gyms',$gyms);
	}

	/**
	* public search(query)
	*
	* searches through columns defined in model
	*/
	public function search($query){
		$this->layout = View::make('layouts.default');

		$gyms = Gym::search($query)->get(); 

		$this->layout->content = View::make('gyms.results')->with('gyms', $gyms);
	}


	/**
	* public view Gym (client)
	*
	* retrieves the gym and adds the client template
	*/
	public function view($id){
		$this->layout = View::make('layouts.default');
		
		$gym = Gym::find($id);

		// show the view and pass the gym to it
        $this->layout->content = View::make('gyms.view')
                ->with('gym', $gym);				
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
		$gym = Gym::find($id);

                // show the view and pass the nerd to it
                $this->layout->content = View::make('gyms.edit')
                        ->with('gym', $gym);

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'place'      => 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('gyms/create')
				->withErrors($validator);
		} else {
			// store
			$gym = Gym::find($id);
			$gym->name       = Input::get('name');
			$gym->place      = Input::get('place');
			$gym->address    = Input::get('address');
			$gym->postal     = Input::get('postal');
			$gym->house_nr   = Input::get('house_nr');
			$gym->user_id    = Auth::id();
			$gym->save();

			// redirect
			Session::flash('message', 'Successfully created gym.');
			return Redirect::to('gyms');
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
		/// delete
		$gym = Gym::find($id);
		$gym->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the gym!');
		return Redirect::to('gyms');
	}

}
