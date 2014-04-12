<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 // Routing to view 	
        View::addLocation(app('path').'/views/clients');
        View::addNamespace('views', app('path').'/views/clients');
        echo View::make('views::index');


				
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        
        	// load the create form (app/views/clients/create.blade.php)
		return View::make('clients.create');
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
			'client_name' => 'required',
			'client_code' => 'required',
			'client_firstname' => 'required',
			'client_brief' => 'required',
			'client_website' => 'required'
        );
        
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('client/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$client = new Client;
			$client->user_id = Auth::user()->id;
			$client->client_name  = Input::get('client_name');
			$client->client_code = Input::get('client_code');
			$client->client_firstname  = Input::get('client_firstname');
			$client->client_surname  = Input::get('client_surname');
			$client->client_email  = Input::get('client_email');
			$client->client_brief = Input::get('client_brief');
			$client->client_website  = Input::get('client_website');		
			$client->active = "1";
			$client->save();
			// redirect
			Session::flash('message', 'Successfully created Client!');
			return Redirect::to('profile/');
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
				
				// load Clients with projects users "eager loading"
				$client = Client::with('projects.users')->find($id);
					// Create an empty array
					$associated = array();
					// Loop through clients projects
					foreach($client->projects as $project){
           		 // add the $project to the $associated array
           		 array_push($associated, $project);
		}	
			
		// show the view
			return View::make('clients.show')
				->with('client', $client);
		
		}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// get the client
    	$client = Client::find($id);

		// show the edit form and pass the client
		return View::make('clients.edit')
			->with('client', $client);
			
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
			'client_name'       => 'required',
			'client_brief'      => 'required'
		);
		
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('clients/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$client = Client::find($id);
			$client->client_name = Input::get('client_name');
			$client->client_brief = Input::get('client_brief');
			$client->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('profile');
		}
	}

}