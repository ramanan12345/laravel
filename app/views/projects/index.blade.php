@extends("layout")
@section("content")

 <div class="container"> 
 <h4>Your Projects</h4>
  
    @section("sidebar")
    @stop
    @if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<?php  ?>
 	@if (Auth::check())
        @if (count($projects) > 0)
       @foreach ($projects as $project)
       <div class="one-third column">
			
       		 <ul class="data">
        <li><label>Project Name: </label><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $project->id.'/show' ) }}"> {{ $project->project_name }}</a></li>
        <li><label class="titletoggle">Project Brief <p>(click to toggle)</p></label><p class="brief">{{ $project->project_brief }}</p></li>
       
		  <li><label>Start Day: </label>{{ date("d-m-Y", strtotime($project->start_day)) }}</li>
        <li><label>Started: </label><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($project->start_day))->diffForHumans() ?></li>
        <label>Created: </label><li></li>
        </ul>
            <ul class='buttonslist'>
            <li><button><a href="{{ URL::to('project/' . $project->id . '/edit') }}">Edit Project</a></button></li>
			<li><button><a href="/task/create">Create Task</a></button></li>
			<li><button><a href="/task/view/">View Tasks</a></button></li>
			</ul>
       </div>
       @endforeach 
       @else
    	<h5 class="errorslist">You have no projects click <a class="errorslist" href="/project/create">here to create a project</a></h5>
	@endif
    @endif
    <div class="sixteen columns">
{{ $projects->links() }}
</div>

    </div>
    @stop

