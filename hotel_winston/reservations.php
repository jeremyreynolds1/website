<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Reservations</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/signin.css" rel="stylesheet">
    <link href="layout-styles.css" rel="stylesheet">
    
    <script src="../code/jquery-1.11.1.min.js"></script>
    
  </head>

  <body>
  <?php
  
  //need to check if email and username exist in users table.
  
  		if($_SERVER["REQUEST_METHOD"] == "POST"){
  		
  			//clearing out any previous inputs.
  			$email = $password = $warningMessage = "";
  			$submit = true;
  			//getting value input from form.
  			$email = $_POST["email"];
  			$password = $_POST["password"];
  			
  			//validation checks for email and password.
  			if(empty($email)){
  				$warningMessage = "email cannot be empty";
  				$submit = false;
  			}
  			
  			if(empty($password)){
	  			$warningMessage = "password cannot be empty";
	  			$submit = false;
  			}
  			
  			if(!preg_match("/^([a-zA-Z0-9_\-\.]+)@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
			  	$warningMessage = "invalid email";
			  	$submit = false;
		  	}
		  	//regex check for password
		  	//basic check
		  	if(!preg_match("/^[a-zA-Z]\w{3,14}$/", $password)){
			  	$warningMessage = "invalid password. Must contain only letters and numbers and be between 3 and 14 characters.";
			  	$submit = false;
		  	}
  			
  			//connection to database
  			$connect = mysqli_connect("localhost", "jeremy", "Snakes12", "reservations");
		  	
		  	if(!$connect){
			  	$warningMessage = "could not connect. contact administrator at jreynolds3@me.com";
		  	}
  		
	  		//two queries one checking the Email and one checking the password, might do a pass hash.
	  		$emailQuery = "SELECT * FROM users WHERE email = '$email'";
	  		
	  		$passQuery = "SELECT * FROM users WHERE password = '$password'";
	  		
	  		if($submit == true){
	  		
		  		$emailResult = mysqli_query($connect, $emailQuery);
		  		
		  		$passQuery = mysqli_query($connect, $passQuery);
		  		
		  		if(!$emailQuery){
			  		$warningMessage = "email not found";
		  		}
		  		if(!$passQuery){
			  		$warningMessage = "password not found";
		  		}
		  		
		  		
	  		}
	  		
  		}
  
  
   ?>

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" role="form" autocomplete="on">
        <h2 class="form-signin-heading">Please sign in</h2>
        <span><?php echo $warningMessage; ?></span>
        <input name="email" type="email" class="form-control" placeholder="Email address" autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password" >
        <button class="btn btn-lg btn-primary btn-block login" type="submit">Sign in</button>
        
      </form>
      <button class="btn btn-lg btn-primary btn-block create">Create an Account</button>
	  
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>
    
    	//this is where the magic happens!
    	
		//on create button click; redirect to signin form.
		//need to remember to redirect back to THIS page if creation is successful.
    	$(".create").on("click", function(){
    		window.location.href = "create.html";
    	});
    	
    	
    </script>
  </body>
</html>
