<?php

class StatusController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
      $statuses = DB::table('statuses')->get();
       
       
        foreach ($statuses as $status)
        {
            echo ("<div class='registeredusers'><label>Status: ".$status->status_name."</label><br/></div>");
        }
        echo "</div></div>";    
	}

	/**
	** View logged in tasks
	*/
    
	public function viewall() {


			  $data["tasks"] = $tasks = Auth::user()->tasks()->paginate(3);
			
	        //Comments pagination
	        $data["tasks_pages"] = $tasks->links();

				
			 if(Request::ajax())
				{
					
				$html = View::make('tasks.viewtasks', $data)->render();
				return Response::json(array('html' => $html));
	        }
	
			echo View::make('tasks.viewall')->with('tasks', $tasks);
	}

        

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		 $tasks = Auth::user()->tasks;	

			$client_options = DB::table('clients')->orderBy('client_name', 'asc')->lists('client_name','id');
    				

    	$project_options = DB::table('projects')->orderBy('project_name', 'asc')->lists('project_name','id');

    	$team_options = DB::table('teams')->orderBy('team_member_name', 'asc')->lists('team_member_name','id', 'team_member_category');

		return View::make('tasks.create', array('project_options' => $project_options, 'team_options' => $team_options, 'client_options' => $client_options));
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
			'task_name'       => 'required',
			'task_brief'      => 'required'
        );
        
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('task/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$task = new Task;
			$task->user_id = Auth::user()->id;
			$task->task_name = Input::get('task_name');
			$task->task_brief  = Input::get('task_brief');
			$task->save();

			// redirect
			Session::flash('message', 'Successfully created Task!');
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
		// get the Task
		$task = Task::find($id);

		// show the view and pass the nerd to it
		return View::make('tasks.show')
			->with('task', $task);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
				// get the project
    $task = Task::find($id);

		// show the edit form and pass the project
		return View::make('tasks.edit')
			->with('task', $task);
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