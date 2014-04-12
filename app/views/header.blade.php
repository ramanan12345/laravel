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
                    <li><a href="http://itempus.dev/project/create">Create</a></li>
                    <li><a href="http://itempus.dev/project/viewall">View</a></li>
                  </ul>
                </li>        
                <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Task <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="http://itempus.dev/task/create">Create</a></li>
            <li><a href="http://itempus.dev/task/viewall">View</a></li>
          </ul>
        </li>
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clients <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://itempus.dev/client/create">Create</a></li>
                    <li><a href="http://itempus.dev/client/viewall">View</a></li>
                  </ul>
                </li> 
        <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Teams <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://itempus.dev/team/create">Create</a></li>
                    <li><a href="http://itempus.dev/team/viewall">View</a></li>
                  </ul>
                </li>    
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user" id="usericon"></span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li class=""><a href="http://itempus.dev/profile" class="">Profile</a></li>
                <li class=""><a href="http://itempus.dev/logout" class="">Logout</a></li>             
        <li class=""><a href="/project/create">Login</a></li>
         </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    
    </div>

@show
