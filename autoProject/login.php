<html>
	<head>
		<title>
			Create New User
		</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../layout-styles.css"/>
		<link rel="stylesheet" type="text/css" href="../landing_page/assets/css/styles.css"/>
		<script src="../files/jQuery/jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no"/>
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
		<?php
			//warnings to be used later
			$warning = $passwordError = $emailError = $databaseError = "";
			$email = $password = "";
			$login = true;
			//connect to database
			$connection = mysqli_connect("localhost", "jeremy", "Tetapuleli^jurtyza", "auto");
			if(!$connection){
				$databaseError = "Could not connect";
			}
			//post method
			if($_SERVER[REQUEST_METHOD] == "POST"){
				
				$email = $_POST["email"];
				$password = $_POST["password"];
				
				if(empty($email)){
					$emailError = "Email cannot be empty";
					$login = false;
				}
				if(empty($password)){
					$passwordError = "Password cannot be empty";
					$login = false;
				}
				//hash password check against password in database
				$hash = password_hash($password, PASSWORD_DEFAULT);
				//query to get passHash from customerInfo table
				$query = "SELECT passHash FROM customerInfo WHERE email = '$email'";
				$queryResult = mysqli_query($connection, $query);//*/
				if(!$queryResult){
					$warning = "please check email and password";
					$login = false;
				}
				$result = password_verify($password, $hash);
				if(!$result){
					$warning = "please check email and password";
					$login = false;
				}
				if($login){
					echo "<script>window.location.href='customerPortal.php';</script>";
				}
				
			}
		?>
	</head>
	<body class="pattern">
		<header class="header">
			<div class="container">
				<div class="profile-content pull-left">
					<h1 class="name">Login</h1>
					<h2 class="desc">Please fill out the following fields</h2>
					<p><?php echo $warning; ?></p>
					<p><?php echo $passwordError;?></p>
					<p><?php echo $emailError;?></p>
					<p><?php echo $databaseError;?></p>
				</div>
			</div>
		</header>
		<br/>
		<div class="primary col-md-12">
			<section class="section">
				<div class="section-inner">
					<div class="center">
						<form class="form" method="post" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label class="sr-only">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<!--<button class="back btn btn-default">Go Back</button>-->
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</section>
		</div>

	</body>
</html>