@extends("layout")
@section("content")

 <div class="container">   
    @section("sidebar")
    @stop
<div class="one-third column">
<h3>Your Projects</h3>
<?php $projects = Auth::user()->projects; ?>
 	@if (Auth::check())
        @if (count($projects) > 0)
       @foreach ($projects as $project)
       <div class="projects">
   		 <h5>Project Name:<p class="inlinetitle"> {{ $project->project_name }}</p></h5>
         <h5 class='titletoggle'>Project Brief
				<p>(click to toggle)</p>
			</h5>
            <p class="ptoggle">{{ $project->project_brief }}</p></h5>
            <h5>Created:<p class="inlinetitle"> {{ $project->created_at }}</p></h5>
            </div>
            <ul class='buttonslist'>
            <li><button><a href="{{ URL::to('project/' . $project->id . '/edit') }}">Edit Project</a></button></li>
			<li><button><a href="/task/create">Create Task</a></button></li>
			<li><button><a href="/task/view/">View Tasks</a></button></li>
			</ul>
       @endforeach 
       @else
    	<h3>You have no projects click <a href="/project/create">here to create a project</a></h3>
	@endif
    @endif
</div>
	<div class="one-third column">
    <h3>Projects Nav</h3>
    <h5><a href="/project/create">Create New Project</a></h5>
   
    </div>
    </div>
    @stop
    
