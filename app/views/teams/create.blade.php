@extends("layout")
@section("content")
 <div class="container">   
    @section("sidebar")
    @stop
		<div class="sixteen columns">
			<h3>Create a Team Member</h3>
            <p>Fill out a few details below to create a task.</p>
            <hr />
		</div>
        	<div class="sixteen columns">
           
            {{ HTML::ul($errors->all() )}}

	{{ Form::open(array('action' => 'TeamController@store', 'id' => 'createuser')) }}
	<div class="form-group">
		{{ Form::label('client_name', 'Company Name') }}
		{{ Form::text('client_name', Input::old('client_name'), array('class' => 'form-control')) }}
	</div>
    
    	<div class="form-group">
			{{ Form::label('team_type', 'Team Memember Type e.g. Internal or Extneral', array('class' => 'awesome'));	}}
       {{ Form::select('team_type', array('Internal' => 'Internal', 'External' => 'External'), 'S');	}}
        
	</div>

		<div class="form-group">
		{{ Form::label('team_member_name', 'Team Member Name') }}
		{{ Form::text('team_member_name', Input::old('team_member_name'), array('class' => 'form-control')) }}
        
	</div>
    
    		<div class="form-group">
		{{ Form::label('team_member_category', 'Assign a Team Member Category') }}
		{{ Form::text('team_member_category', Input::old('team_member_category'), array('class' => 'form-control')) }}
        
	</div>
    
	{{ Form::submit('Create team member!', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
            
		</div>
	
    <div class="two-thirds column">
        
        </div>
   </div>     
	
@stop
