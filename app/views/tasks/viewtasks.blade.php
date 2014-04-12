
@if (Auth::check())
        @if (count($tasks) > 0)
       @foreach ($tasks as $task)
		<div class="panel panel-primary one-third column">
			<div class="panel-heading">
				<h3 class="panel-title"><span class="glyphicon glyphicon-search"></span>Project Name: <a href="{{ URL::to('task/' . $task->id.'/show' ) }}"> {{ $task->task_name }}</a></h3>
			</div>
			<div class="panel-body">
				<label class="titletoggle">Project Brief <p>(click to toggle)</p></label><p class="brief">{{ $task->task_brief }}</p>

			</div>
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