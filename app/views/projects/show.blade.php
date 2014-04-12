@extends("layout")
@section("content")

 <div class="container">   
    @section("sidebar")
    @stop
	<div class="two-thirds column">
		<h3>{{ $project->project_name }}</h3>
		<label>Project Brief</label><p>{{ $project->project_brief }} </p>
		<label>Created on</label><p>{{ $project->created_at }} </p>
		
	</div>
    	<div class="two-thirds column">
		<h3>Related Tasks</h3>
		
		
	</div>
    </div>
    @stop