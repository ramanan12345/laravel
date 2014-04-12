@extends("layout")
@section("content")
 <div class="container">   
    @section("sidebar")
    @stop
<h3>Edit {{ $project->project_name }}</h3>
<p>You are now editing your project.</p>
<hr>
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => URL::to('project/'.$project->id.'/update'), 'method' => 'PUT')) }}
{{ Form::model($project) }}

	<div class="form-group">
		{{ Form::label('project_name', 'Project Name') }}
		{{ Form::text('project_name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('Project Brief', 'Project Brief') }}
		{{ Form::textarea('project_brief', null, array('class' => 'form-control', 'cols' => '100')) }}
	</div>


	{{ Form::submit('Update the Project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

    </div>
    @stop