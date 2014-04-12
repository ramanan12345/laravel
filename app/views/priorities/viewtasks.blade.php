
@if (Auth::check())
        @if (count($tasks) > 0)
       @foreach ($tasks as $task)
       <div class="one-third column">
			
       <ul class="data">
        <li><label>Project Name: </label><a href="{{ URL::to('task/' . $task->id.'/show' ) }}"> {{ $task->task_name }}</a></li>
        <li><label class="titletoggle">Project Brief <p>(click to toggle)</p></label><p class="brief">{{ $task->task_brief }}</p></li>
       
        </ul> 	   
           
	
           
         			</ul>
       </div>
       @endforeach 
       @else
    	<h5 class="errorslist">You have no tasks click <a class="errorslist" href="/task/create">here to create a task</a></h5>
	@endif
    @endif
    
      <div class="sixteen columns">
        {{ $tasks->links() }}
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
			$("#tasks").empty().html(data.html);
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
			  alert('No response from server');
		});
		return false;
	});
		});
		
		</script>