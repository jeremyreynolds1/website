<html>
	<head>
		<title>
			customer portal
		</title>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../layout-styles.css"/>
		<link rel="stylesheet" type="text/css" href="../landing_page/assets/css/styles.css"/>
		<script src="../files/jQuery/jquery-1.11.1.min.js"></script>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, user-scalable = no"/>
		<link rel="icon" href="http://jeremyreynolds.us/favicon.ico"/>
	</head>
	<body class="center">
		<!--
			customer portal
			customer's can add their own cars and services
		-->
		<header class="header">
			<div class="container">
				<div class="profile-content pull-left">
					<h1 class="name">Customer Portal</h1>
					<h2 class="desc">Please select what you would like to do.</h2>
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
						<p>Please click a button below to add Services</p>
						<button class="newCar">Add New Car</button>
						<button class="newServices">Add New Services</button>
					</div>
				</div>
			</section>
		</div>
		<script>
			$(".newCar").on("click", function(){
				window.location.href = "customerNewCar.php";
			});
			
			$(".newServices").on("click", function(){
				window.location.href = "customerNewServices.php";
			});
		</script>
	</body>
</html>