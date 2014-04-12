<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>iTempus</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oxygen:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
  <!-- Jquery -->
    {{ HTML::script('js/jquery-2.0.3.js'); }}
    {{ HTML::script('js/js.js'); }}
    {{ HTML::script('js/jquery.fn.gantt.js'); }}

    
    {{ HTML::style('stylesheets/base.css'); }}

    {{ HTML::style('stylesheets/skeleton.css'); }}
    {{ HTML::style('stylesheets/layout.css'); }}
  
    {{ HTML::style('stylesheets/custom.css'); }}

    <!-- Twitter Bootstrap -->
    {{ HTML::style('stylesheets/bootstrap.min.css'); }}
    {{ HTML::style('stylesheets/bootstrap.skeleton.css'); }}
    {{ HTML::style('stylesheets/bootstrap.glyphicon.css'); }}
    {{ HTML::style('stylesheets/bootstrap.base.css'); }}

    {{ HTML::script('js/bootstrap.min.js')}}


   

    <!-- Chosen -->
    {{ HTML::style('docsupport/prism.css'); }}
    {{ HTML::style('stylesheets/chosen.css'); }}

    {{ HTML::script('js/chosen.jquery.js'); }}
    {{ HTML::script('docsupport/prism.js'); }}


    <!--[if lt IE 9]>s
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/favicon.png">
	<link rel="apple-touch-icon" href="images/favicon.png">
	<link rel="apple-touch-icon" href="images/ifavicon.png">


 {{ HTML::style('stylesheets/jquery.timepicker.css'); }}
    {{ HTML::script('js/jquery.timepicker.js'); }}
    {{ HTML::script('js/datepair.js'); }}

 {{ HTML::style('stylesheets/basedate.css'); }}
    {{ HTML::script('js/base.js'); }}


</head>
<body>


 @include("header")
            <div class="fullwidthcontainer">
                @yield("content")
            </div>
