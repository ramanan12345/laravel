<script>
	$(function(){
    $( "#select_client" ).change(function(e) { // i.e. '/get_progects/{clientId}'
        e.preventDefault();
        var clients = $(this);
        $.getJson('itempus.dev/task/create/' + clients.val(), function(response){
            // id = 'projects' for projects combo.select
            var projects = $('#projects');
                projects.empty();
                $.each('response.projects', function(k, v){
                    var option = $('<option/>', {'id':v.id, 'text':v.projectName});
                    projects.append(option);
                });
        });
    });
});
	</script>