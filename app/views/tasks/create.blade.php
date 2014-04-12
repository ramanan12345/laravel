@extends("layout")
@section("content")
 <div class="container add-top add-bottom">   
    @section("sidebar")
    @stop

		<div class="sixteen columns">
			<h3>Create a task</h3>
            <p>Fill out a few details below to create a task.</p>
            <hr />
		</div>
           
            {{ HTML::ul($errors->all() )}}


	{{ Form::open(array('action' => 'TaskController@store', 'class' => 'chosen-show')) }}
	<div class="form-group">
		<div class="four columns">
	 {{ Form::label('select_client', 'Select Client', array('class' => 'form-label'));	}}
		</div>
		<div class="two-thirds column">
	@if(count($client_options)>0)
	     
		{{ Form::select('client', $client_options , Input::old('client'), array('data-placeholder' => 'Choose a Client...', 'id' => 'select_client', 'class' => 'chosen-select tempus_select', 'tabindex' => '2', )) }}

	@endif 
			</div>
		</div>

	<div class="form-group">
	     <div class="four columns">
	    {{ Form::label('project_select', 'Select Project', array('class' => 'form-label'));	}}
	</div>
		<div class="two-thirds column">
		{{ Form::select('project', array_merge(array('default' => 'Select client first')), 'default', array('class' => 'tempus_select', 'id' => 'project_select')) }}
	</div>
</div>

	 <div class="form-group">
	 	<div class="four columns">
	 		    {{ Form::label('select_status', 'Status', array('class' => 'form-label'));	}}
	 		</div>
	 		<div class="two-thirds column">
	@if(count($status)>0)
	     
		{{ Form::select('status', $status , Input::old('client'), array('class' => 'tempus_select ', 'id' => 'select_status')) }}

	@endif 
		</div>
					
			</div>
		 <div class="form-group">

		 	<div class="four columns">
		 			    {{ Form::label('select_type', 'Type', array('class' => 'form-label'));	}}
		 	</div>
		 	<div class="two-thirds column">
	@if(count($tasktypes)>0)
	     
		{{ Form::select('type', $tasktypes , Input::old('client'), array('class' => 'tempus_select ', 'id' => 'select_type')) }}

	@endif 
			</div>
	</div>

	<div class="form-group">
		<div class="four columns">
	   {{ Form::label('select_priority', 'Priority', array('class' => 'form-label'));	}}

	</div>
	<div class="two-thirds column">
			{{ Form::select('priority', $priority , Input::old('client'), array('class' => 'tempus_select ', 'id' => 'select_priority')) }}
	</div>
	</div>


	<div class="form-group">
		<div class="four columns">
		{{ Form::label('task_name', 'Task Name') }}
		</div>
		<div class="two-thirds column">
		{{ Form::text('task_name', Input::old('task_name'), array('class' => 'form-control')) }}
        </div>
	</div>

	<div class="form-group">
		<div class="four columns">
		{{ Form::label('task_brief', 'Task Brief') }}
	</div>
	<div class="two-thirds column">
		{{ Form::textarea('task_brief', Input::old('Task Brief'), array('class' => 'form-control', 'cols' => '100')) }}
	</div>
	</div>
    
		<div class="form-group">
			<div class="four columns">
			{{ Form::label('estimated_duration_time', 'Estimated Duration', array('class' => 'form-label'));	}}
		</div>
		<div class="two-thirds column">
		<ul class="datepair" data-language="javascript">
			<li>{{ Form::text('estimate_start_date', Input::old('duration_time'), array('class' => 'form-control date')) }}</li>
            <li>to</li>
            
			<li>{{ Form::text('estimate_end_date', Input::old('duration_time'), array('class' => 'form-control date')) }}</li>
		</ul>
	</div>
        <script>
		 
			$('.timepick').timepicker({ 'minTime': '09:00am', 'maxTime': '05:30pm', 'step':15, 'showDuration': true });


		</script>
	</div>

		<div class="form-group">
			<div class="four columns">
	    {{ Form::label('select_team_member', 'Assign task to Team Member', array('class' => 'form-label'));	}}

</div>
<div class="two-thirds column">
		@if(count($team_options)>0)
		{{ Form::select('team', $team_options , Input::old('client'), array('class' => 'tempus_select')) }}

		@endif 
	</div>
	</div>

<div class="btn-group">
		{{ Form::submit('Create task', array('class' => 'btn btn-success')) }}
</div>


{{ Form::close() }}
            
	

</div> 
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
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





 @include("footer")
@stop

