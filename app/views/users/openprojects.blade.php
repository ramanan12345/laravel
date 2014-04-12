
@if (Auth::check())
        @if (count($projects) > 0)
       @foreach ($projects as $project)
       <div class="row">
			
       		<label>Project Name: </label><a class="" href="{{ URL::to('project/' . $project->id.'/show' ) }}"> {{ $project->project_name }}</a>
  		<span class="label label-primary">{{ $project->status }}</span>
       </div>
       @endforeach 
       @else
    	<h5 class="errorslist">You have no projects click <a class="errorslist" href="/project/create">here to create a project</a></h5>
	@endif
    @endif
    
      <div class="row">
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