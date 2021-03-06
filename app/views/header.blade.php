@section("header")
<div class="fullwidthcontainer headerbg">
         
        <header class="container header">

         <h1>Manage</h1>
			 
		  	
		 </header>
          


    </div>
    <nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
     <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Project <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://laravel4.dev/project/create">Create</a></li>
                    <li><a href="http://laravel4.dev/project/viewall">View</a></li>
                  </ul>
                </li>        
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Task <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="http://laravel4.dev/task/create">Create</a></li>
            <li><a href="http://laravel4.dev/task/viewall">View</a></li>
          </ul>
        </li>
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://laravel4.dev/client/create">Create</a></li>
                    <li><a href="http://laravel4.dev/client/viewall">View</a></li>
                  </ul>
                </li> 
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://laravel4.dev/team/create">Create</a></li>
                    <li><a href="http://laravel4.dev/team/viewall">View</a></li>
                  </ul>
                </li>    
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">@if (Auth::check())<span class="glyphicon glyphicon-user" id="usericon"></span> {{ Auth::user()->username }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class=""><a href="http://laravel4.dev/profile" class="">Profile</a></li>
                <li class=""><a href="http://laravel4.dev/logout" class="">Logout</a></li>             
          @else
        <li class=""><a href="/project/create">Login</a></li>
    @endif
         </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    </div>

@show
