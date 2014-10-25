<!DOCTYPE html>
<html>
	<head>
		<title>User Management System</title>
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="/code/jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no" />
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
		<link rel="stylesheet" type="text/css" href="landing_page/assets/css/styles.css">
		<link rel="shortcut icon" href="favicon.ico" />
		<meta name="viewport" content="width=device-width, user-scalable=no" />

	</head>
	<body>  
		<!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">                       
            <div class="profile-content pull-left">
                <h1 class="name">User Management System</h1>
                <h2 class="desc">Built in PHP</h2>   
            </div><!--//profile-->
        </div><!--//container-->
    </header><!--//header-->
    
    <section class=" section">
         <div class="section-inner">
             <div class="content">
             	<p>Here I have created a User Management System that will allow the user to create a new user and login with that information created.</p> 
             	
                <input type="submit" name="button" value="create new user" id="newUserButton"/>   
				<input type="submit" name="button" value="Login" id="loginButton"/>
				<input type="submit" name="button" value="Go Home" id="goHome"/>
				
				
              </div><!--//content-->
             </div><!--//section-inner-->                 
     </section><!--//section-->
     
     	<script>
     		$("#newUserButton").on("click", function(){
	     		window.location.href = "/newUser/newUser.php";
		 	});
		 	$("#loginButton").on("click", function(){
			 	window.location.href = "/newUser/login.php";
		 	});
		 	$("#goHome").on("click", function(){
			 	window.location.href = "/landing_page/index.html";
		 	});
     	
     </script>
	</body>
</html>