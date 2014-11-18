<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="../layout-styles.css"/>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../landing_page/assets/css/styles.css"/>
		<!--scripts-->
		<script src="../files/jQuery/jquery-1.11.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<!--meta-->
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<link rel="shortcut icon" href="../favicon.ico" />
	</head>
	<body class="pattern">
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
				print "<script>document.location.href='loginPage.html';</script>";
			}
			
		}//end method post
	?>
		<header class="header">
			<div class="container">
				<div id="heading">
					<h1>Login</h1>
					<p class="bg-warning"><?php echo $databaseError;?></p>
				</div>
			</div>
		</header>
		<div class="container sections-wrapper">
			<section class="section">
				<div class="section-inner">
					<div class="center">
						<p>Login below with your username and password.</p>
						<p class="bg-danger"><?php echo $userNameError;?></p>
						<p class="bg-danger"><?php echo $passError;?></p>
						<form class="form" method="post" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label class="sr-only">Username</label>
								<input type="text" class="form-control" name="userName" placeholder="Username">
							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
						</form>
					</div>
				</div>
			</section>
		</div>
		<!--<div id="heading">
			<h1>Login</h1>
			<span><?php echo $databaseError; ?></span>
		</div>
		<div id="content">
			<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			User Name: <input type="text" name="userName" required><span><?php echo $userNameError; ?></span><br>
			Password: <input type="password" name="password" required><span><?php echo $passError; ?></span><br>
			<input type="submit" value="login">
			</form>
			<span><?php echo $successMessage; ?></span>
		</div><!---->
	</body>
</html>