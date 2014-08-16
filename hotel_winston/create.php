<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.ico">

    <title>Reservations</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/signin.css" rel="stylesheet">
    <!<link href="layout-styles.css" rel="stylesheet">
    
    <script src="../code/jquery-1.11.1.min.js"></script>
    
  </head>

  <body>
  	<?php
	  	
	  	//use warning banners from bootstrap for warnings (deciding to make dismissable or not)
	  	$warningMessage = "";
	  	
	  	$firstName = $lastName = $email = $password = "";
	  		  	
	  	$firstName = $_POST["firstName"];
	  	echo $firstName;
	  	
  	?>

    <div class="container">

      <form class="form-signin" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <h2 class="form-signin-heading">Create an Account</h2>
        <h3 class="required">All fields are required</h3>
        <input name="firstName" type="text" class="form-control firstName" placeholder="First Name" value="<?php echo $firstName;?>">
        <input name="lastName" type="text" class="form-control lastName" value="<?php echo $lastName;?>" placeholder="Last Name">
        <input name="email" type="text" class="form-control email" placeholder="Email address" value="<?php echo $email; ?>">
        <input name="password" type="text" class="form-control password" placeholder="Password" >
        <button class="btn btn-lg btn-primary btn-block create" type="submit">Create</button>
        
      </form>
 	  
    </div> <!-- /container -->
        
     </body>
</html>
