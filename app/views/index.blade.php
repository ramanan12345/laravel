@extends("layout")
@section("content")
   
    
	<div class="container">
        
		<div class="sixteen columns">
			<h3>Welcome to iTempus</h3>
            <p>Use iTempus to manage Projects you are working on.</p>
            <hr />
		</div>


        
		<div class="two-thirds column">
             <div id="loginform" class="userforms">
            <div id="loginWrapper">
            <h1><span class="log-in">Log in</span></h1>
                {{ Form::open([
        "route"        => "user/login",
        "autocomplete" => "off"
    ]) }}
<div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
          {{ Form::text("username", Input::get("username"), [
            "placeholder" => "Enter Username",
            "class" => "form-control"
        ]) }}
    </div>
    <div class="input-group">
  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
        {{ Form::password("password", [
            "placeholder" => "Enter Password",
            "class" => "form-control"
        ]) }}
    </div>
        @if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        {{ Form::submit("login") }}
    {{ Form::close() }}
        
		
            <div id="registerWrapper" class="userforms">
                <form id="registerForm" name="registerForm" method="POST" action="classes/class.RegisterUser.php">
                <h1><span class="log-in">Register</span></h1>
                        <p class="required"><span class="log-in">*Required Fields</span></p>
                        <div id="errorDiv"><?php 
                            if (isset($_SESSION['error']) & isset($_SESSION['formAttempt'])) {
                                    unset($_SESSION['formAttempt']);
                                    print "Errors encountered<br/>\n";
                                    foreach ($_SESSION['error'] as $error) {
                                    print $error . "<br />\n";
                                } //end foreach
                                } //end if 
                        ?></div>
        
                 <p class="float">
                <label for="password"><i class="icon-lock"></i>Name*</label>
                <input type="text" id="name" name="name" placeholder="Name" class="showpassword"/> 
                <span class="errorFeedback errorSpan" id="nameError">Name is required</span>
            </p>
            <p class="float">
                <label for="login"><i class="icon-user"></i>Username*</label>
                <input type="text" id="username" name="username" placeholder="Username"/>
                        <span class="errorFeedback errorSpan" id="usernameError">Username is required</span>
            </p>
            <p class="float">
                <label for="password"><i class="icon-lock"></i>Password*</label>
                <input type="password" id="password" name="password" placeholder="Password" class="showpassword"/> 
                        <span class="errorFeedback errorSpan" id="passwordError">Password is required</span>
            </p>
               <p class="float">
                <label for="password"><i class="icon-lock"></i>Verify Password*</label>
                <input type="password" id="password2" name="password2" placeholder="Verify Password" class="showpassword"/> 
                        <span class="errorFeedback errorSpan" id="password2Error">Passwords dont match</span>
            </p>
            
             <p class="float">
                <label for="password"><i class="icon-lock"></i>Email*</label>
                <input type="text" id="email" name="email" placeholder="Email" class="showpassword"/> 
                        <span class="errorFeedback errorSpan" id="emailError">Email is required or you have not entered a valid email address</span>
            </p>
            <p class="clearfix"> 
                <input type="submit" name="submitregister" value="Register"/>
            </p>   
                    </form>
                </div>
            
        </div>
        <div class="two-thirds column">
        
        </div>
        
	
	</div>
@stop