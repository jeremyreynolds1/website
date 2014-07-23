<!DOCTYPE html>
<html>
	<head>
		<title>User Management System</title>
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="jquery-1.11.1.min.js"></script>
		<script src="click.js"></script>
		<script src="animate.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no" />
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
		<link href="http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">

		<script>
			function myFunction(){
				window.location.href = "newUser/newUser.php";
			}
			function myFunction2(){
				window.location.href = "newUser/login.php";
			}
			
		</script>
		<link rel="shortcut icon" href="favicon.ico" />
		<meta name="viewport" content="width=device-width, user-scalable=no" />

	</head>
	<body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <li><a href="projects.html"> <span class="glyphicon glyphicon-folder-open"></span>   Portfolio</a></li>
            <li class="active"><a href="#">Cluster Computing</a></li>
            <li><a href="../newUser/newUser.php">CMS</a><li>
            <li><a href="/albumCatalog/catalog.html">Album Catalog</a></li>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    

		<div class="container">
			
		<div class="starter-template">
			<h1>User Management System</h1>
			<p>
				Here I have created a User Management System that will allow you, the user, to create a new user and login with that information created.
				</p>
			<input type="submit" name="button" value="Create New User" id="newUserButton" onclick="myFunction();"/>
			<input type="submit" name="button" value="login" onclick="myFunction2();"/>
		</div>
		</div>
	</body>
</html>