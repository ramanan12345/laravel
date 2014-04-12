<?php

class TeamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		 $data["teams"] = $teams = Auth::user()->teams()->paginate(1);
			
	        //Comments pagination
	        $data["teams_pages"] = $teams->links();

				
			 if(Request::ajax())
				{
					
				$html = View::make('teams.teams', $data)->render();
				return Response::json(array('html' => $html));
	        }
	
			echo View::make('teams.index')->with('teams', $teams);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        
        	// load the create form (app/views/teams/create.blade.php)
		return View::make('teams.create');
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
			'client_name'       => 'required',
			'team_member_name'      => 'required'
        );
        
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('team/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$team = new team;
			$team->user_id = Auth::user()->id;
			$team->company_name  = Input::get('client_name');
			$team->team_type = Input::get('team_type');
			$team->team_member_category = Input::get('team_member_category');
			$team->team_member_name  = Input::get('team_member_name');
			$team->save();
			// redirect
			Session::flash('message', 'Successfully created User!');
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
		//
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
	}

}