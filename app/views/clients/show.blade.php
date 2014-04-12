@extends("layout")
@section("content")
  
 <div class="container">   
    @section("sidebar")
    @stop
    <h3>Projects related to {{ $client->client_name }}</h3>
   
<?php $clients = $client->projects; ?>
 	@if (Auth::check())
        @if (count($clients) > 0)
       @foreach ($clients as $project)
        <div class="one-third column">
       <div class="projects">
       
       		 <ul class="data">
        <li><label>Project Name: </label><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $project->id.'/show' ) }}"> {{ $project->project_name }}</a></li>
        <li><label class="titletoggle">Project Brief <p>(click to toggle)</p></label><p class="brief">{{ $project->project_brief }}</p></li>
        </ul>
            <ul class="navbutton">
            <li> {{ HTML::image('images/1384110300_menu-alt.png', $alt="hidden_nav_button", $attributes = array("class" => "buttonsnav", "title" => "Toggle Sidebar Navigation")) }}</li>
            <ul class='buttonslist'>
            <li><a href="{{ URL::to('project/' . $project->id . '/edit') }}"><button>Edit Project</button></a></li>
			<li><a href="/task/create"><button>Create Task</button></a></li>
			<li><a href="/task/view/"><button>View Tasks</button></a></li>
			</ul>
            </ul>
            </div>
            </div>

       @endforeach 
       @else
    	<h3>You have no projects click <a href="/project/create">here to create a project</a></h3>
	@endif
    @endif
</div>
    </div>	
    @stop
    
   