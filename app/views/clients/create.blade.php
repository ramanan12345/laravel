<div class="container"> 
<div class="page-header">

<h2>Create a Client</h2>
</div>

<div class="">

  {{ HTML::ul($errors->all(), array('class' => 'errorslist') )}}

{{ Form::open(array('action' => 'ClientController@store', 'class' => '')) }}

 <div class="form-group">
{{ Form::label('client_name', 'Company Name') }}
{{ Form::text('client_name', Input::old('client_name'), array('class' => 'form-control')) }}
  </div>

 <div class="form-group">

{{ Form::label('client_code', 'Client Code') }}
{{ Form::text('client_code', Input::old('client_code'), array('class' => 'form-control')) }}
</div>


 <div class="form-group">
{{ Form::label('client_firstname', 'Client Firstname') }}
{{ Form::text('client_firstname', Input::old('client_firstname'), array('class' => 'form-control')) }}
</div>

 <div class="form-group">
{{ Form::label('client_surname', 'Client Surname') }}
{{ Form::text('client_surname', Input::old('client_surname'), array('class' => 'form-control')) }}

</div>

 <div class="form-group">
{{ Form::label('client_email', 'Client Email') }}</li>
{{ Form::email('client_email', Input::old('client_email'), array('class' => 'form-control')) }}

</div>

 <div class="form-group">
{{ Form::label('client_brief', 'Client Brief') }}
{{ Form::textarea('client_brief', Input::old('client_breif'), array('class' => 'form-control', 'cols' => '50')) }}

</div>

 <div class="form-group">
{{ Form::label('client_website', 'Client Website') }}
{{ Form::text('client_website', Input::old('client_website'), array('class' => 'form-control')) }}
</div>

  {{ Form::submit('Create the client!', array('class' => 'btn btn-primary')) }}
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

  {{ Form::close() }}

</div>


</div>