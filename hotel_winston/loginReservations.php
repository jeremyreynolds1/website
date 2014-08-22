<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../landing_page/assets/css/styles.css">
		<link rel="stylesheet" href="../layout-styles.css">
		<link rel="stylesheet" href="../bootstrap/css/signin.css">	
		<script type="text/javascript" src="../code/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<?php
			
			//if month is feb, and day > 28, warning message.
			$warningMessage = $beginDay = $beginMonth = $beginYear = $endMonth = $endDay = $endYear = "";
			//get all variables passed using POST method.
			$submit = true;
			if($_SERVER["REQUEST_METHOD"] == "POST"){
			
				$email = $_POST["email"];
				$beginMonth = $_POST["begin-month"];
				$beginDay = $_POST["begin-day"];
				$beginYear = $_POST["begin-year"];
				$endMonth = $_POST["end-month"];
				$endDay = $_POST["end-day"];
				$endYear = $_POST["end-year"];
				
				//validation cases
				if($beginMonth == "February"){
					$beginDayInt = intval($beginDay);
					if($beginDayInt > 28){
						$warningMessage = "Please select another day";
						$submit = false;
					}
				}//*/
				
				if($endMonth == "February"){
					$endDayInt = intval($endDay);
					if($endDayInt > 28){
						$warningMessage = "Please select another day";
						$submit = false;
					}
				}//*/
				
				if(empty($email)){
					$warningMessage = "Email cannot be empty";
					$submit = false;
				}
				if(($beginMonth == "default")|| ($beginDay == "default") || ($beginYear == "default")){
					$warningMessage = "You must select something other than the default.";
					$submit = false;
				}
				if(($endMonth == "default")|| ($endDay == "default") || ($endYear == "default")){
					$warningMessage = "You must select something other than the default.";
					$submit = false;
				}
				
				if($submit == true){
					//consolidate begin and end date.
					$newBeginDate = $beginMonth . " " . $beginDay . ", " . $beginYear;
					$newEndDate = $endMonth . " " . $endDay . ", " . $endYear;
					
					//fields in SQL email, beginDate, endDate
					
					$connect = mysqli_connect("localhost", "jeremy", "Snakes12", "reservations");
					if(!$connect){
						$warningMessage = "could not connect to database. please notify jreynolds3@me.com";
					}
					$query = "INSERT INTO reservationsTable (email, beginDate, endDate) VALUES ('$email', '$newBeginDate', '$newEndDate')";
					
					$result = mysqli_query($connect, $query);
					
					if(!$result){
						$warningMessage = "reservation not created";
					}
					$warningMessage = "reservation created";
				}
			}
			
			
			//echo "<script>alert('$email');</script>";
			
		?>
		<!--Header-->
		<header class="header">
	        <div class="container">                       
	            <div class="profile-content pull-left">
	                <h1 class="name">Hotel Winston Reservation System</h1>
	               
	            </div><!--//profile-->             
	        </div><!--//container-->
		</header><!--//header-->
		<div class="container sections-wrapper">
			<div class="row">
				<div class="primary col-md-8 col-sm-12 col-xs-12">
					<section class="section">
						<div class="section-inner">
							<h2 class="heading">Welcome</h2>
							<div class="content">
								<p>Make a new reservation below</p>
								<span><?php echo $warningMessage;?></span>
							</div>
						</div>
					</section><!-- /reservation section/ -->
					<section class="section">
						<div class="section-inner">
						
						<! have a form for people to fill out here store beginning/ending dates. -->
						<! email, beginning date (with selector), end date (with selector)-->
							<form class="form-signin" role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
								<h3>All fields are required</h3>
								<input name="email" placeholder="email" class="form-control email">
								<! begin-date-month, begin-date-day, begin-date-year -->
								<span>When would you like to begin your stay?</span>
								<select name="begin-month" id="begin-month">
									<option value="default">Month</option>
									<option value="January">January</option>
									<option value="February">February</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>
								<select name="begin-day" id="begin-day">
									<option value="default">Day</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<select name="begin-year" id="begin-year">
									<option value="default">Year</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
								</select>
								<br>
								<! end-date-month, end-date-day, end-date-year -->
								<span>When would you like to end your stay?</span>
								<select name="end-month" id="end-month">
									<option value="default">Month</option>
									<option value="January">January</option>
									<option value="February">February</option>
									<option value="March">March</option>
									<option value="April">April</option>
									<option value="May">May</option>
									<option value="June">June</option>
									<option value="July">July</option>
									<option value="August">August</option>
									<option value="September">September</option>
									<option value="October">October</option>
									<option value="November">November</option>
									<option value="December">December</option>
								</select>
								<select name="end-day" id="end-day">
									<option value="default">Day</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
								<select name="end-year" id="end-year">
									<option value="default">Year</option>
									<option value="2014">2014</option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
								</select>

								<button class="btn btn-lg btn-primary btn-block create" type="submit">Submit</button>
							</form>
						</div>
					</section>
				</div>
			</div>
		</div>
				
	</body>
</html>