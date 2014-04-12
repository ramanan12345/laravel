<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Auth::user()->projects()->paginate(3);
		 // Routing to view 	
        View::addLocation(app('path').'/views/projects');
        View::addNamespace('views', app('path').'/views/projects');
        echo View::make('views::index', array('projects' => $projects));

				
	}
	
	public function viewall()
	
	{
		
			  $data["projects"] = $projects = Auth::user()->projects()->paginate(3);
			
	        //Comments pagination
	        $data["projects_pages"] = $projects->links();

				
			 if(Request::ajax())
				{
					
				$html = View::make('projects.viewprojects', $data)->render();
				return Response::json(array('html' => $html));
	        }
	
			echo View::make('projects.viewall')->with('projects', $projects);
	}
	
	public function viewallgantt()
	
	{
	
	
	$projects = Auth::user()->projects();
return Response::json($projects->to_array());

    $gantt = array();

  foreach ($projects as $project) {
	           while ($row) {
				   
		$row = $project->fetch(PDO::FETCH_ASSOC);
        $data[] = array(
            'name' => $row['project_name'],
            'desc' => $row['project_brief'],
            'values' => array(
                array(
                    'from' => '/Date(' . $row['start_day'] . ')/',
                    'to' => '/Date(' . $row['end_day'] . ')/',
                    'desc' => $row['project_brief'],
                    'label' => $row['client_name'],
                    'customClass' => 'ganttRed',
                ),
            )
        );

        $gantt[] = $data;
    }}
    echo json_encode($gantt); 
					echo View::make('projects.viewall')->with('projects', $projects);

	}
	
		
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		 $clients = Auth::user()->clients;
    	$client_options = DB::table('clients')->orderBy('client_name', 'asc')->lists('client_name','id');

        	// load the create form (app/views/projects/create.blade.php)
		return View::make('projects.create', array('client_options' => $client_options));
		
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
			'project_name'       => 'required',
			'project_brief'      => 'required'
        );
        
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('project/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			$start_day_old = Input::get('start_day');
			$start_day = date("Y-m-d", strtotime($start_day_old));

			// store
			$project = new Project;
			$project->user_id = Auth::user()->id;
			$project->client_id = Input::get('client');
			$project->project_name = Input::get('project_name');
			$project->project_brief  = Input::get('project_brief');
			$project->start_day  = $start_day;
			$project->end_day  =Input::get('end_day');
			$project->save();

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
	
	// get the Project
		$project = Project::find($id);

		// show the view and pass the nerd to it
		return View::make('projects.show')
			->with('project', $project);
	
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
    $project = Project::find($id);

		// show the edit form and pass the project
		return View::make('projects.edit')
			->with('project', $project);
			
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
			'project_name'       => 'required',
			'project_brief'      => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('projects/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$project = Project::find($id);
			$project->project_name = Input::get('project_name');
			$project->project_brief = Input::get('project_brief');
			$project->save();

			// redirect
			Session::flash('message', 'Successfully updated!');
			return Redirect::to('profile');
		}
	}

}