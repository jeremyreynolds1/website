<!DOCTYPE html>
<html>
	<head>
		<title>User Management System</title>
		
		<!--Scripts-->
		<script src="/files/jQuery/jquery-1.11.1.min.js"></script>
		<script src="files/jQuery/jquery-ui.min.js"></script>
		
		<!--Meta-->
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no" />
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
		
		<!--Stylesheets-->
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="landing_page/assets/css/styles.css">
		<link rel="stylesheet" href="files/jQuery/jquery-ui-earth.theme.min.css"/>
		<link rel="stylesheet" href="files/jQuery/jquery-ui.min.css"/>
		<link rel="shortcut icon" href="favicon.ico" />
		
		

	</head>
	<body class="pattern">  
	<!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">                       
            <div class="profile-content">
                <h1 class="name">User Management System</h1>
                <h2 class="desc">Built in PHP</h2>   
            </div><!--//profile-->
        </div><!--//container-->
    </header><!--//header-->
    <br/>
    <div class="container-fluid">
	    <div class="row">
		    <div class="primary section">
			    <div class="section-inner">
				    <p>Here I have created a User Management System that will allow the user to create a new user and login with that information created.</p> 
				    
					<button id="newUserButton">Create New User</button>  
					<button id="loginButton">Login</button>
					<button id="goHome">Go Home</button> 
			    	        	
			    </div>
		    </div>
    	</div>
    </div><!--//primary-->
    
     	<script>
	     	//initialize new button for styling.
	     	$("#newUserButton").button();
	     	$("#loginButton").button();
	     	$("#goHome").button();
	     	
	     	//on click functions for redirect
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