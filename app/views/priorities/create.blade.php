@extends("layout")
@section("content")
 <div class="container">   
    @section("sidebar")
    @stop
		<div class="sixteen columns">
			<h3>Create a task</h3>
            <p>Fill out a few details below to create a task.</p>
            <hr />
		</div>
        	<div class="sixteen columns formborder">
           
            {{ HTML::ul($errors->all() )}}

	{{ Form::open(array('action' => 'TaskController@store', 'id' => 'createuser')) }}
	<div class="form-group">
	@if(count($client_options)>0)
	     
	    {{ Form::label('select_client', 'Assign to Client', array('class' => 'awesome client_option'));	}}
		{{ Form::select('client', $client_options , Input::old('client'), array('class' => 'tempus_select client_option', 'id' => 'select_client')) }}

	@endif 
		</div>

	<div class="form-group deletegates">
	     
	    {{ Form::label('project_select', 'Assign to Project', array('class' => 'awesome'));	}}
		{{ Form::select('project', array_merge(array('default' => 'Please Select')), 'default', array('class' => 'tempus_select', 'id' => 'project_select')) }}



		</div>


	<div class="form-group">
		{{ Form::label('task_name', 'Task Name') }}
		{{ Form::text('task_name', Input::old('task_name'), array('class' => 'form-control')) }}
        
	</div>

	<div class="form-group">
		{{ Form::label('task_brief', 'Task Brief') }}
		{{ Form::textarea('task_brief', Input::old('Task Brief'), array('class' => 'form-control', 'cols' => '100')) }}
	</div>
    
		<div class="form-group">
			{{ Form::label('estimated_duration_time', 'Estimated Duration', array('class' => 'awesome'));	}}
		<ul class="datepair" data-language="javascript">
			<li>{{ Form::text('duration_time', Input::old('duration_time'), array('class' => 'date start')) }}</li>
            <li>{{ Form::text('duration_time', Input::old('duration_time'), array('class' => 'time start timepick')) }}</li>
            <li>to</li>
			<li>{{ Form::text('duration_time', Input::old('duration_time'), array('class' => 'time end timepick')) }}</li>
            
			<li>{{ Form::text('duration_time', Input::old('duration_time'), array('class' => 'date end')) }}</li>
		</ul>
		<style>.datepair li {display:inline-block;} </style>
        <script>
		  $(function() {
			$('.timepick').timepicker({ 'minTime': '09:00am', 'maxTime': '05:30pm', 'step':15, 'showDuration': true });

		  });
		</script>
	</div>

	<div class="form-group">
		@if(count($team_options)>0)
	    {{ Form::label('select_team_member', 'Assign task to Team Member', array('class' => 'awesome'));	}}
		{{ Form::select('client', $team_options , Input::old('client'), array('class' => 'tempus_select')) }}

		@endif 
	</div>

	 <div class="form-group">
			{{ Form::label('select_client', 'Priority', array('class' => 'awesome'));	}}
       {{ Form::select('priority', array('3' => 'Low', '2' => 'Medium', '1' => 'High'), 'S');	}}
	</div>

	<div class="form-group">
	   {{ Form::label('select_status', 'Status', array('class' => 'awesome'));	}}
       {{ Form::select('status', array('Scope' => 'Scope', 'Dev' => 'Dev', 'Testing' => 'Testing', 'Closed' => 'Closed'), 'S');	}}
	</div>


	{{ Form::submit('Create the task!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
            
		</div>
	
    <div class="two-thirds column">
        
        </div>
       </div> 
<script>
$(document).ready(function($){ 
	$('#select_client').change(function(){ 
		$.get("http://itempus.dev/task/clientsprojects",{ 
			option: $(this).val() 
			}, function(data) { 
			console.log(data); 
			var model = $('#project_select'); 
			model.empty(); 
			$.each(data, function(key, value) { 
$('#project_select').append("<option value='"+key+"'>"+value+"</option>'");
			});
			$("#project_select").trigger("change");
		}); 
	});
});
</script>


@stop