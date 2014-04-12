
@if (Auth::check())
        @if (count($projects) > 0)
       @foreach ($projects as $project)
       <div class="one-third column">
			
       		 <ul class="data">
        <li><label>Project Name: </label><a class="btn btn-small btn-success" href="{{ URL::to('project/' . $project->id.'/show' ) }}"> {{ $project->project_name }}</a></li>
        <li><label class="titletoggle">Project Brief <p>(click to toggle)</p></label><p class="brief">{{ $project->project_brief }}</p></li>
       
		  <li><label>Start Day: </label>{{ date("d-m-Y", strtotime($project->start_day)) }}<?php echo "<sub class='sub'>".\Carbon\Carbon::createFromTimeStamp(strtotime($project->start_day))->diffForHumans()."</sub>" ?></li>
        <li><label>End Day: </label>{{ date("d-m-Y", strtotime($project->end_day)) }}<?php echo "<sub class='sub'>".\Carbon\Carbon::createFromTimeStamp(strtotime($project->end_day))->diffForHumans()."</sub>" ?></li>
        </ul> 	   
           
	
           
            <ul class='buttonslist buttonstyle'>
            <li><button><a href="{{ URL::to('project/' . $project->id . '/edit') }}">Edit Project</a></button></li>
			<li><button><a href="/task/create">Create Task</a></button></li>
			<li><button><a href="/task/view/">View Tasks</a></button></li>
			</ul>
       </div>
       @endforeach 
       @else
    	<h5 class="errorslist">You have no projects click <a class="errorslist" href="/project/create">here to create a project</a></h5>
	@endif
    @endif
    
      <div class="sixteen columns">
        {{ $projects->links() }}
        </div>
        
        
        <script>
		$(document).ready(function(){
			
   $('.titletoggle').on('click', function () {
         $(this).next('.brief').slideToggle();
    });
	
		
		
		$(".pagination a").click(function()
	{
		var myurl = $(this).attr('href');
		
		$.ajax(
		{
			url: myurl,
			type: "get",
			datatype: "html",
			beforeSend: function()
			{
				$('#ajax-loading').show();
			}
		})
		.done(function(data)
		{
			$('#ajax-loading').hide();
			$("#projects").empty().html(data.html);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
			  alert('No response from server');
		});
		return false;
	});
		});
		
		</script>