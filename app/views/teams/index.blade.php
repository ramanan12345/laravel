@extends("layout")
@section("content")

 <div class="container"> 
 <h4>Your Projects</h4>
  <div id="ajax-loading" class="alert alert-warning" style="display: none;">
    <strong>Loading...</strong>
</div>
<div id="teams">
@include('teams.teams')
</div>
<div class="container">
@include('teams.assigntask')

</div>
    </div>
    @stop