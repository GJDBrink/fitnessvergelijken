<?php

class CategoryController extends \BaseController {

	protected $layout = "layouts.main";

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the categories
		$categories = Category::all();
		

		$this->layout->content = View::make('categories.index')
                        ->with('categories', $categories);

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
		$this->layout->content = View::make('categories.create');
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
			'description'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('categories/create')
				->withErrors($validator);
		} else {
			// store
			$category = new Category;
			$category->name       = Input::get('name');
			$category->description      = Input::get('description');
			$category->save();

			// redirect
			Session::flash('message', 'Successfully created category.');
			return Redirect::to('categories');
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
		$category = Category::find($id);

		// show the view and pass the nerd to it
		$this->layout->content = View::make('categories.show')
			->with('category', $category);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the nerd
		$category = Category::find($id);

		// show the edit form and pass the nerd
		$this->layout->content = View::make('categories.edit')
			->with('category', $category);
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
			'name'       => 'required',
			'description'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('categories/create')
				->withErrors($validator);
		} else {
			// store
			$category = Category::find($id);
			$category->name       = Input::get('name');
			$category->description      = Input::get('description');
			$category->save();

			// redirect
			Session::flash('message', 'Successfully edited category.');
			return Redirect::to('categories');
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
		$category = Category::find($id);
		$category->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the category!');
		return Redirect::to('categories');
	}


}
