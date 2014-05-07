<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="../layout-styles.css">
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<link rel="shortcut icon" href="../favicon.ico" />

	</head>
	<body>
	<?php
		//need to check and get username/password from user
		//second to check against stored password hash to see if they're the same.
		
		$userName = $password = "";
		$userNameError = $passError = $databaseError = $successMessage = $passwordHash = "";
		$login = true;
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$connect = mysqli_connect("localhost", "jeremy", "Snakes12", "Users");
			
			if(!$connect){
				$databaseError = "Could not Connect.";
			}
			
			$userName = $_POST["userName"];
			$password = $_POST["password"];
			
			if(empty($userName)){
				$userNameError = "Username cannot be empty";
				$login = false;
			}
			if(empty($password)){
				$passError = "Password cannot be empty.";
				$login = false;
			}//*/
			
			//validate username
			
			$query = "SELECT userName FROM UsersTable WHERE userName = '$userName'";
			$userNameQuery = mysqli_query($connect, $query);
			
			if(!$userNameQuery){
				$userNameError = "Username not found";
				$login = false;
			}
			
			//password validate method
			//$passwordHash = password_hash($pass, PASSWORD_DEFAULT);
			
			$query1 = "SELECT pass FROM UsersTable WHERE userName = '$userName'";
			$passwordQuery = mysqli_query($connect, $query1);
			//if the query returns NOTHING, password was not found.
			
			/*if password is hashed
			if(password_verify($password, $passwordQuery)){
				$passError = "correct";
			}
			else{
				$passError = "incorrect";
			}//*/
			
			/*
			if($passwordQuery = $password){
				$passError = "correct";
			}
			else{
				$passError = "incorrect";
				$login = false;
			}*/
			
			if(!$passwordQuery){
				$passError = "Incorrect";
				$login = false;
			}
			
			
			
			if($login == false){
				$successMessage = "failed to login please check password or username.";
			}
			else{
				$successMessage = "Username and Password found.";
				header('Location: jeremyreynolds.us/loginPage.html');
			}
			
		}//end method post
	?>
		<div id="heading">
			<h1>Login</h1>
			<span><?php echo $databaseError; ?></span>
		</div>
		<div id="content">
			<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			User Name: <input type="text" name="userName"><span><?php echo $userNameError; ?></span><br>
			Password: <input type="password" name="password"><span><?php echo $passError; ?></span><br>
			<input type="submit" value="login">
			</form>
			<span><?php echo $successMessage; ?></span>
		</div>
	</body>
</html>