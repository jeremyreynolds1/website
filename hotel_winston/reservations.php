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

    <div class="container">

      <form class="form-signin" role="form" autocomplete="on">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" autofocus>
        <input type="password" class="form-control" placeholder="Password" >
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
