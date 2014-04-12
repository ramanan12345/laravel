@extends("layout")
@section("content")

 <div class="container add-top add-bottom"> 
 <h4>Your Tasks</h4>
  <div id="ajax-loading" class="alert alert-warning" style="display: none;">
    <strong>Loading...</strong>
</div>
<div id="tasks">
@include('tasks.viewtasks')
</div>
    </div>
    @stop