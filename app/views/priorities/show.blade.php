@extends("layout")
@section("content")

 <div class="container">   
    @section("sidebar")
    @stop
	<div class="two-thirds column">
		<h3>{{ $task->task_name }}</h3>
		<label>Project Brief</label><p>{{ $task->task_brief }} </p>		
	</div>
    	<div class="two-thirds column">
		<h3>Related Tasks</h3>
		
		
	</div>
    </div>
    @stop