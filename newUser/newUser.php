<!DOCTYPE html>
<html>
	<head>
		<title>New User</title>
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
		//need to check database for existing username
		date_default_timezone_set("America/Chicago");
		$submitResult = "";
		$firstName = $lastName = $userName = $pass = "";
		$firstNameError = $lastNameError = $userNameError = $passwordError = $databaseError = $queryManager = "";
		$Submit = true;
		$submitSuccess = true;
		
		echo '<style type="text/css">
				#firstName {
					color: green;
				}
				#lastName{
					color: green;
				}
				#userName{
					color: green;
				}
				#pass{
					color: green;
				}
				</style>';
		
		$userNameNumber = 0;
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		
			//open connection
			$connect = mysqli_connect("localhost", "jeremy", "Snakes12", "Users");
			
			if(!$connect){
				$databaseError = "Could not connect";
			}//*/
		
			$firstName = $_POST["firstName"];
			$lastName = $_POST["lastName"];
			$userName = $_POST["userName"];
			$pass = $_POST["password"];
			
			//used to make sure the inputs are coming over correctly.
			/*$firstNameError = $firstName;
			$lastNameError = $lastName;
			$userNameError = $userName;
			$passwordError = $pass;//*/
			
			
					
			//need to check to see if firstName, lastName, and userName are valid.
		
			//checking each variable if it's empty, error is produced.
			if(empty($firstName)){
				$firstNameError = "First Name cannot be empty.";
				$Submit = false;
				echo '<style type="text/css">
				#firstName {
					color: #FF0000;
				}
				</style>';//*/
			}
			if(empty($lastName)){
				$lastNameError = "Last Name cannot be empty.";
				$Submit = false;
				echo '<style type="text/css">
				#lastName {
					color: #FF0000;
				}
				</style>';

			}
			if(empty($userName)){
				$userNameError = "User Name cannot be Empty.";
				$Submit = false;
				echo '<style type="text/css">
				#userName {
					color: #FF0000;
				}
				</style>';

			}
			if(empty($pass)){
				$passwordError = "Password cannot be empty.";
				$Submit = false;
				echo '<style type="text/css">
				#pass {
					color: #FF0000;
				}
				</style>';

			}
			/*checking each variable to see if only valid characters are present.
			testing conditions for each variable are as follows
			First Name: Letters a-z upper and lowercase
			Last Name: same as first name
			password: At least 1 capital letter, 1 number, and at least 6 characters.
			*/
			//preg_match("/^[a-zA-Z ]*$/", $lastName)
			
			if(!preg_match("/^[a-zA-Z ]*$/", $firstName)){
				$firstNameError = "Only Letters allowed";
				$Submit = false;

			}
			if(!preg_match("/^[a-zA-Z ]*$/", $lastName)){
				$lastNameError = "Only letters allowed";
				$Submit = false;
			}
			//password validation
			if(!preg_match("/^[a-zA-Z]\w{3,14}$/", $pass)){
				$passwordError = "Invalid Format";
				$Submit = false;
			}			
			
			//hashing password for later retreval.
			//$passHash = password_hash($pass, PASSWORD_DEFAULT);
		
			if($Submit == false){
				$submitResult = "Not Submitted, try again";
			}
			else{
				//push data to database for user account creation
				//insert into Users
				/*
				$userInsert = mysqli_query($connect, "INSERT INTO UsersTable (firstName, lastName, userName, pass) VALUES('$firstName', '$lastName', '$userName', '$passHash')");//*/
				
				$userInsert = mysqli_query($connect, "INSERT INTO UsersTable (firstName, lastName, userName, pass) VALUES('$firstName', '$lastName', '$userName', '$pass')");//*/
				if(!$userInsert){
					$databaseError = "duplicate";
					$submitSuccess = false;
				}
				
				if($submitSuccess == true){
				$submitResult = "success! You have created a new user!";
				//sending email to personal email for notification that new user was created
				$message = 'New User' . $firstName . ' ' . $lastName . ' ' . $userName . '.';
				$subject = "new user created on " . date('l jS \of F Y h:i:s A');
				mail('jreynolds323@gmail.com', $subject, $message);//
				}
				else{
					$submitResult = "failed try again";
				}
			}//
			//close connection
			mysqli_close($connect);
		}
		
		?>
		<header class="header">
			<div class="container">
				<div id="heading">
					<h1>New User Creation</h1>
					<span><?php echo $databaseError; ?></span>
				</div>
			</div>
		</header>
		<div class="container sections-wrapper">
			<section class="section">
				<div class="section-inner">
					<p>Using the form below, enter the following to create a new user:</p>
					<ul>
						<li>First Name</li>
						<li>Last Name</li>
						<li>Username</li>
						<li>Password</li>
					</ul>
					<hr>
					<!--used for various warnings-->
					<p class="bg-danger">
						<?php echo $firstNameError; ?>
					</p>
					<p class="bg-danger">
					<?php echo $lastNameError; ?>
					</p>
					<p class="bg-danger">
						<?php echo $passwordError; ?>
					</p>
					<p class="bg-danger">
						<?php echo $userNameError; ?>
					</p>
					<!--database error-->
					<p class="bg-warning">
						<?php echo $databaseError; ?>
					</p>
					<p class="bg-success">
						<?php echo $submitResult; ?>
					</p>
					<div class="center">
						<form class="form" method="post" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<div class="form-group">
								<label class="sr-only">First Name</label>
								<input type="text" class="form-control" name="firstName" placeholder="First Name">
							</div>
							<div class="form-group">
								<label class="sr-only">Last Name</label>
								<input type="text" class="form-control" name="lastName" placeholder="Last Name">
							</div>
							<div class="form-group">
								<label class="sr-only">Username</label>
								<input type="text" class="form-control" name="userName" placeholder="Desired Username">
							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</section>
		</div>
		<!--<div id="heading">
			<h1>New User Creation</h1>
			<span><?php echo $databaseError; ?></span>
		</div>
		<div id="content">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<span id="firstName">First Name:</span> <input type="text" name="firstName"><span><?php echo $firstNameError;?></span><br>
				<span id="lastName">Last Name:</span> <input type="text" name="lastName"><span><?php echo $lastNameError; ?></span><br>
				<span id="userName">Desired Username:</span> <input type="text" name="userName"><span><?php echo $userNameError; ?></span><br>
				<span id="pass">Password:<span> <input type="password" name="password"><span><?php echo $passwordError; ?></span><br>
				<input type="submit">
				<span><?php echo $submitResult;?></span>
			</form>
		</div>-->
	</body>
</html>