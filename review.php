<!DOCTYPE html>
<!--<html>
	<head>
		<title>Leave a review!</title>
		<link rel="stylesheet" type="text/css" href="layout-styles.css">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="shortcut icon" href="favicon.ico" />
	</head>
	<body>
	
	

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
		
</html>-->
<!--
	updated on May 31, 2014
 -->
<!DOCTYPE html>
<html>
	<head>
		<title>
			Jeremy's Website
		</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="layout-styles.css"/>
		<script src="/code/jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no" />
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
		<link href="http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Raleway:100" rel="stylesheet" type="text/css">

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
				echo '<script language="javascript">';
				echo 'alert("review sent")';
				echo '</script>';
				
				//additional information to send automated email to personal email indicating someone left a review.
				$message = $firstName . ' ' . $lastName . ' left a review!' . "\n" . "it says: " . $textComments;
				$subject = "new review on " . date('l jS \of F Y h:i:s A');
				mail('jreynolds323@gmail.com', $subject, $message);
				
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("review not sent. check fields")';
				echo '</script>';
			}
			
			mysqli_close($connect);
			
		}
			
		?>
		
	<div class="innerContainer">
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
	            <li><a href="home.html"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	            <li><a href="projects.html"><span class="glyphicon glyphicon-folder-open"></span> Portfolio</a></li>
	            <li><a href="resume.html"><span class="glyphicon glyphicon-info-sign"></span>   Resume</a></li>
	            <li class="active"><a href="#">Leave a Review</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
	
	    <div class="container">
	      <div class="starter-template">
			<h1>Review!</h1>
			<span><?php echo $databaseError; ?></span>
		
		
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
	    </div><!-- /.container -->
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="/code/jquery.backstretch.min.js"></script>    
	</body>
</html>