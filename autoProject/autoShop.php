<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			Auto Shop Project
		</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../layout-styles.css"/>
		<link rel="stylesheet" type="text/css" href="../landing_page/assets/css/styles.css"/>
		<script src="../files/jQuery/jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no"/>
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>

	</head>
	
	<body class="pattern">
		<!-- ******HEADER****** --> 
    <header class="header">
        <div class="container">                       
            <div class="profile-content pull-left">
                <h1 class="name">Jeremy's Auto Shop</h1>
                <h2 class="desc">For all your automotive needs</h2>   
            </div><!--//profile-->
        </div><!--//container-->
    </header><!--//header-->
    <br/>
    <div class="primary col-md-12">
	    <section class="section">
	        <div class="section-inner">
	            <div class="content">
	            	<p>Please select what you would like to do</p>
					<p>You must have an account to schedule services</p>
					<p>If you already have an account with us, please select login. If not and you are new here, please create a new user</p>
					<!--LOGIN-->
					<button id="login">Login</button>
					<!--Create new User-->
					<button id="createNew">Create New User</button>	
					<!-- Staff Login -->
					<button id="staff">Staff Login</button>		
	            </div><!--//content-->
	        </div><!--//section-inner-->                 
	     </section><!--//section-->
    </div>
    
    <script>
	   	$("#login").on("click", function(){
		   	window.location.href = "login.php";
	   	});
	   	$("#createNew").on("click", function(){
		   	window.location.href = "createNewUser.php";
	   	});
	   	$("#staff").on("click", function(){
		   	window.location.href = "staffLogin.php";
	   	});
	</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    
	</body>

</html>