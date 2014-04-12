@extends("layout")
@section("content")
 
   
    <div class="container">
        <div class="panel panel-primary one-third column ">
            <div class="panel-heading">
                        <h4>Open Projects</h4>
            </div>
              <div id="ajax-loading" class="alert alert-warning" style="display: none;">
                <strong>Loading...</strong>
            </div>
            <div id="projects" class="panel-body">
            @include('users.openprojects')
            </div>
    </div> 

    <div class="panel panel-primary one-third column ">
            <div class="panel-heading">
                        <h4>Open Tasks</h4>
            </div>
              <div id="ajax-loading" class="alert alert-warning" style="display: none;">
                <strong>Loading...</strong>
            </div>
            <div id="projects">
            </div>
    </div> 
    
    </div>
@stop
