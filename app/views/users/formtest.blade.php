
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>iProject</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oxygen:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
    {{ HTML::style('stylesheets/base.css'); }}
    {{ HTML::style('stylesheets/skeleton.css'); }}
    {{ HTML::style('stylesheets/layout.css'); }}
    {{ HTML::style('stylesheets/custom.css'); }}
    {{ HTML::script('js/jquery-2.0.3.js'); }}
    {{ HTML::script('js/js.js'); }}

    <!--[if lt IE 9]>s
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
   
     <div class="fullwidthcontainer header">
         <h1>iProject</h1>
                <ul class="main_nav">
                    <li><a href="index">Home</a></li>
                    <li><a href="projects">Projects</a></li>
                    <li><a href="settings">Settings</a></li>
                     <li><a href="register">Register</a></li>      
                </ul>    
    </div>
    <style>
    .projectupload li {
            display:inline-block;
            
        
        }
    </style>
	<div class="container">
        
		<div class="sixteen columns">
			<h3>Create a Project</h3>
            <p>Fill out a few details below to start creating your project.</p>
            <hr />
		</div>
        	<div class="two-thirds column">
          <?php 
            echo Form::open(array('action' => 'UserController@formtest'));
            echo Form::label('email', 'Select Client', array('class' => 'awesome'));
            echo Form::select('client', array('sjp' => 'St. Jamess Place', 'immortal' => 'Immortal Fitness'), 'S');

          
 echo Form::label('email', 'Project Name', array('class' => 'awesome'));
            echo Form::text('project_name'); echo "<br/>";
            
                echo Form::label('email', 'Project Brief', array('class' => 'awesome'));
            echo Form::textarea('project_brief', null, array('cols' => '105', 'rows' => '15')); echo "<br/>";
            
            echo Form::label('email', 'Select Start Date', array('class' => 'awesome'));
            echo "<ul class='projectupload'>";
            echo "<li>".Form::selectRange('day', 1, 31)."</li>";
            echo "<li>".Form::selectMonth('month')."</li>";
            echo "<li>".Form::selectRange('day', 2013, 2015); echo "</ul></li>";
            
            echo Form::label('email', 'Select End Date', array('class' => 'awesome'));
            echo "<ul class='projectupload'>";
            echo "<li>".Form::selectRange('day', 1, 31)."</li>";
            echo "<li>".Form::selectMonth('month')."<li>";
            echo "<li>".Form::selectYear('year', 1992, 2020); echo "</ul></li>";
            
            
            echo Form::checkbox('name', 'value');echo "<br/>";
            
            echo Form::radio('name', 'value');echo "<br/>";
            echo Form::close();
            echo Form::submit('Create Project');echo "<br/>";
            
            
?>
		</div>

        
		
        <div class="two-thirds column">
        
        </div>
        
	
	</div>
    <!-- container -->


<!-- End Document
================================================== -->
</body>
</html>