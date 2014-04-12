@extends("layout")

        @section("content")
 <div class="container">   
    @section("sidebar")
    @stop
		<div class="sixteen columns">
			<h3>Create a Project</h3>
            <p>Fill out a few details.</p>
            <hr />
		</div>
        	<div class="sixteen columns">
           
            {{ HTML::ul($errors->all() )}}

		{{ Form::open(array('action' => 'ProjectController@store', 'id' => 'createproject')) }}
		   <div class="form-group">
		@if(count($client_options)>0)
		     
		    {{ Form::label('select_client', 'Select Client', array('class' => 'awesome'));	}}
			{{ Form::select('client', $client_options , Input::old('client'), array('class' => 'tempus_select')) }}

		@endif 


	</div>
	<div class="form-group">
		{{ Form::label('project_name', 'Project Name') }}
		{{ Form::text('project_name', Input::old('project_name'), array('class' => 'form-control')) }}
        
	</div>

	<div class="form-group">
		{{ Form::label('project_brief', 'Project Brief') }}
		{{ Form::textarea('project_brief', Input::old('project_brief'), array('class' => 'form-control', 'cols' => '60')) }}
	</div>
 
 	<div class="form-group">
			{{ Form::label('estimated_duration_time', 'Start Date', array('class' => 'awesome'));	}}
		<ul class="datepair" data-language="javascript">
			<li>{{ Form::text('start_day', Input::old('start_day'), array('class' => 'date start')) }}</li>
            {{ Form::label('estimated_duration_time', 'End Date', array('class' => 'awesome'));	}}            
			<li>{{ Form::text('end_day', Input::old('end_day'), array('class' => 'date end')) }}</li>
		</ul>

	</div>
 
	{{ Form::submit('Create the Project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
       
		</div>

        
		
        <div class="two-thirds column">
        
        </div>
      </div>  
	
@stop
