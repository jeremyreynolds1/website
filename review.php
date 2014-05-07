<!DOCTYPE html>
<html>
	<head>
		<title>Leave a review!</title>
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<body>
	
	<!-- PHP script to submit to SQL database. -->
	<?php
		//simple PHP script to take review data and put it into database.
		
		date_default_timezone_set("America/Chicago");
		$firstName = $lastName = $email = $textComments = "";
		$firstNameError = $lastNameError = $emailError = $textCommentsError = $databaseError = $submitResult = "";
		$dontSubmit = false;
		
		
		
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			
			$firstName = $_POST["firstName"];
			
			if(empty($firstName)){
				$firstNameError = "first name is required";
				$dontSubmit = true;
				//exit;
			}
			if(!preg_match("/^[a-zA-Z ]*$/", $firstName)){
				$firstNameError = "Only letters allowed.";
				$dontSubmit = true;
				//exit;
			}
			
			$lastName = $_POST["lastName"];
			
			if(empty($lastName)){
				$lastNameError = "Last name is required";
				$dontSubmit = true;
				//exit;
			}
			if(!preg_match("/^[a-zA-Z ]*$/", $lastName)){
				$lastNameError = "Only letters allowed.";
				$dontSubmit = true;
				//exit;
			}
			
			$email = $_POST["email"];
			
			if(empty($email)){
				$emailError = "Email is Required";
				$dontSubmit = true;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailError = "email is invalid";
				$dontSubmit = true;
			}
			
			$textComments = $_POST["textComments"];
			//echo "success";
			
			$connect = mysqli_connect("localhost", "jeremy", "Snakes12", "WebsiteReviews");
			
			if(mysqli_connect_errno()){
				$databaseError = "Could not connect";
				//exit;
			}
			
			if($dontSubmit == false){
				mysqli_query($connect, "INSERT INTO Reviews (FirstName, LastName, email, review)
				VALUES ('$firstName', '$lastName', '$email', '$textComments')");
				$submitResult = "success";
				
				//additional information to send automated email to personal email indicating someone left a review.
				$message = $firstName . ' ' . $lastName . ' left a review!' . "\n" . "it says: " . $textComments;
				$subject = "new review on " . date('l jS \of F Y h:i:s A');
				mail('jreynolds323@gmail.com', $subject, $message);
				
			}
			else{
				$submitResult = "failed";
			}
			
			mysqli_close($connect);
			
		}
			
		?>

		<div id="heading">
			<h1>Review!</h1>
			<span><?php echo $databaseError; ?></span>
		</div>
		
		<div id="content">
			<p>
				Please note that First Name, Last Name, and Email is required.
			</p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				First Name: <input type="text" name="firstName"><span> <?php echo $firstNameError; ?> </span><br>
				Last Name: <input type="text" name="lastName"><span><?php echo $lastNameError; ?></span><br>
				Email: <input type="text" name="email"><span> <? echo $emailError; ?></span><br>
				Thoughts or Comments<br>
				<textarea rows="10" cols="30" name="textComments">
				</textarea>
				<br>
				<input type="submit">
				<span><?php echo $submitResult; ?></span>
			</form>
			<a href="..">Back to home</a>
		</div>
		
</html>