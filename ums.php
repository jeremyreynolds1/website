<!DOCTYPE html>
<html>
	<head>
		<title>User Management System</title>
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
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
		<div id="heading">
			<h1>User Management System</h1>
		</div>
		<div id="content">
			<p>
				Here I have created a User Management System that will allow you, the user, to create a new user and login with that information created.
			</p>
			<input type="submit" name="button" value="Create New User" id="newUserButton" onclick="myFunction();"/>
			<input type="submit" name="button" value="login" onclick="myFunction2();"/>
			
		</div>
	</body>
</html>