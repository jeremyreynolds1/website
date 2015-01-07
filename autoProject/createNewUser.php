<!DOCTYPE html>
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
			//connect to sql database
			$connection = mysqli_connect("localhost", "jeremy", "Tetapuleli^jurtyza", "auto");
			//errors to be present
			$firstNameError = $lastNameError = $emailError = $passwordError = $phoneNumberError = $databaseError = $warning = "";
			//variables for use in validation
			$firstName = $lastName = $email = $password = $phoneNumber = "";
			$submit = true;
			if(!$connection){
				$databaseError = "could not connect to Database";
				
			}
			//if form submit method is post execute new user creation
			if($_SERVER["REQUEST_METHOD"] == "POST"){
			//get values from form
				$firstName = $_POST["firstName"];
				$lastName = $_POST["lastName"];
				$email = $_POST["email"];
				$password = $_POST["password"];
				$phoneNumber = $_POST["phoneNumber"];
				
			//hash password for security
			$passHash = password_hash($password, PASSWORD_DEFAULT);
			//will use hash later for user login
			//validation cases
			
			//empty cases
			//first name
			if(empty($firstName)){
				$firstNameError = "first name cannot be empty";
				$submit = false;
			}
			//last name
			if(empty($lastName)){
				$lastNameError = "last name cannot be empty";
				$submit = false;
			}
			//email
			if(empty($email)){
				$emailError = "email cannot be empty";
				$submit = false;
			}
			//password
			if(empty($password)){
				$passwordError = "password cannot be empty";
				$submit = false;
			}
			//phone number
			if(empty($phoneNumber)){
				$phoneNumberError = "phone number cannot be empty";
				$submit = false;
			}
			//valid entry
			//email
			//^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$
			/*if(!preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email){
				$emailError = "email invalid";
				$submit = false;
			}//
			//password
			if(!preg_match("/^[a-zA-Z0-9]\w{3,14}$/", $password)){
				$passwordError = "password invalid";
				$submit = false;
			}
			//phoneNumber
			//([0-9][0-9][0-9])-([0-9][0-9][0-9])-([0-9][0-9][0-9][0-9])
			if(!preg_match("/([0-9][0-9][0-9])-([0-9][0-9][0-9])-([0-9][0-9][0-9][0-9])/", $phoneNumber)){
				$phoneNumberError = "phone number invalid";
				$submit = false;
			}//*/
			//if everything passes, submit to customerInfo table
			if($submit){
				$query = mysqli_query($connection, "INSERT INTO customerInfo (firstName, lastName, email, phoneNumber, passHash) VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$passHash')");
			}
			else{
				$warning = "could not submit";
			}
			//close connection 
			mysqli_close($connection);
			}
		?>
	</head>
	<body class="pattern">
				<!-- Header -->
		<header class="header">
			<div class="container">
				<div class="profile-content pull-left">
					<h1 class="name">Create New User</h1>
					<h2 class="desc">Please fill out the following fields</h2>
					<p><?php echo $warning; ?></p>
					<p><?php echo $firstNameError; ?></p>
					<p><?php echo $lastNameError; ?></p>
					<p><?php echo $passwordError;?></p>
					<p><?php echo $emailError;?></p>
					<p><?php echo $phoneNumberError;?></p>
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
								<label class="sr-only">First Name</label>
								<input type="text" class="form-control" name="firstName" placeholder="First Name">
							</div>
							<div class="form-group">
								<label class="sr-only">Last Name</label>
								<input type="text" class="form-control" name="lastName" placeholder="Last Name">
							</div>
							<div class="form-group">
								<label class="sr-only">Email</label>
								<input type="text" class="form-control" name="email" placeholder="Desired Username">
							</div>
							<div class="form-group">
								<label class="sr-only">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password must contain 3 - 14 letters and numbers.">
							</div>
							<div class="form-group">
								<label class="sr-only">Phone Number</label>
								<input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number ex. 555-555-5555">
							</div>
							<button class="back btn btn-default">Go Back</button>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
				</div>
			</section>
		</div>
		<script>
			$(".back").on("click", function(){
				window.location.href = "autoshop.php";
			});
		</script>
	</body>
</html>