
@if (Auth::check())
        @if (count($teams) > 0)
       @foreach ($teams as $team)
       <div class="one-third column">
			
       		 <ul class="data">
        <li><label>Company Name: </label><a href="{{ URL::to('team/' . $team->id.'/show' ) }}"> {{ $team->company_name }}</a></li>
        <li><label>Name: </label>{{ $team->team_member_name}}</li>
        <li><label>Category: </label>{{ $team->team_member_category }}</li>
       
       
        </ul> 	   
           
	
           
            <ul class='buttonslist buttonstyle'>
            <li><button><a href="{{ URL::to('team/' . $team->id . '/edit') }}">Edit team</a></button></li>
			<li><button><a href="/task/create">Assign Task</a></button></li>
			<li><button><a href="/task/view/">View Tasks</a></button></li>
			</ul>
       </div>
       @endforeach 
       @else
    	<h5 class="errorslist">You have no teams click <a class="errorslist" href="/team/create">here to create a team</a></h5>
	@endif
    @endif
    
      <div class="sixteen columns">
        {{ $teams->links() }}
        </div>
       <script>
		$(document).ready(function(){

		
		
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
			$("#teams").empty().html(data.html).fadeIn();
		})
		.fail(function(jqXHR, ajaxOptions, thrownError)
		{
			  alert('No response from server');
		});
		return false;
	});
		});
		
		</script>