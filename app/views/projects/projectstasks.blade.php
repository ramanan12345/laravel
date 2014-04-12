<div class="one-third column">
    <h4>Associated Tasks</h4>
   <? $projects = Auth::user()->tasks; ?>
   @if (Auth::check())
        @if (count($projects) > 0)
       @foreach ($projects as $task)
       <div class="projects">
		 <ul class="data">
        <li><label>Task Name: </label><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $task->id.'/show' ) }}"> {{ $task->task_name }}</a></li>
        <li><label class="titletoggle">Task Brief <p>(click to toggle)</p></label><p class="brief">{{ $task->task_brief }}</p></li>
        <li><label>Created: </label>{{ $task->created_at }}</li>
        </ul>
        
       @endforeach 
       @else
    	<h3>You have no projects click <a href="/project/create">here to create a project</a></h3>
	@endif
    @endif
    </div>