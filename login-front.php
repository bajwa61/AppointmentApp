<?php 
   session_start();
?>
<!DOCTYPE html> 
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<title>Gap Book</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<link href="assets/img/favicon.png" rel="icon">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
		<script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
	    </script>
	</head>
	<body class="account-page">

	  <?php 
         if( isset($_SESSION["UserTypeId"]) && isset($_SESSION["Id"])  )
		 {
			 if($_SESSION["UserTypeId"]=="1" && $_SESSION["Id"]>0)
			 {
				 echo  '<script>window.location.href="http://localhost/AppointmentApp/customer-dashboard.php"</script>';
				 
			 }
			 else if($_SESSION["UserTypeId"]=="2" && $_SESSION["Id"]>0)
			 {
				 echo '<script>window.location.href="http://localhost/AppointmentApp/service-dashboard.php"</script>';
			 }
		 }
	  ?>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php include 'header.php' ?>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>Gap Book</span></h3>
										</div>
										<form method="post" action="backend/login.php">
											<div class="form-group form-focus">
												<input type="email" class="form-control floating email" name="email">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating password" name="password">
												<label class="focus-label">Password</label>
											</div>
											<div class="form-group form-focus">
												<select type="account-type" name="account-type" class="form-control floating account-type">
													<option value="1">Customer</option>
													<option value="2">Service Provider</option>
												</select>
												<label class="focus-label">Choose Account Type</label>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
										
							
											<div class="text-center dont-have">Don’t have an account? <a href="register-front.php">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include 'footer.php' ?>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->

		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/script.js"></script>
		
	</body>

</html>