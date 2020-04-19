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

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="http://localhost/AppointmentApp/index.php" class="navbar-brand logo">
							<span style="font-size:1.6rem;color: #09dca4;">GAP BOOK</span>
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="http://localhost/AppointmentApp/index.php" class="menu-logo">
								<span style="font-size:1.6rem;color: #09dca4;">GAP BOOK</span>
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li>
								<a href="http://localhost/AppointmentApp/index.php">Home</a>
							</li>
							<?php
								if( isset($_SESSION["UserTypeId"]) && isset($_SESSION["Id"])  )
								{
									if($_SESSION["UserTypeId"]=="1" && $_SESSION["Id"]>0)
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/customer-dashboard.php">Dashboard</a>
									     </li>';
									}
									else if($_SESSION["UserTypeId"]=="2" && $_SESSION["Id"]>0)
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/service-dashboard.php">Dashboard</a>
									     </li>';
									}
									else
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/login-front.php">Login / Signup</a>
									     </li>';
									}
								}
								else
								{
									echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/login-front.php">Login / Signup</a>
									     </li>';
								}
							?>
							
						</ul>
					</div>		 
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>							
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +92 310 525 9270</p>
							</div>
						</li>
						<li class="nav-item">
						<?php
								if( isset($_SESSION["UserTypeId"]) && isset($_SESSION["Id"])  )
								{
									if($_SESSION["UserTypeId"]=="1" && $_SESSION["Id"]>0)
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/customer-dashboard.php">Dashboard</a>
									     </li>';
									}
									else if($_SESSION["UserTypeId"]=="2" && $_SESSION["Id"]>0)
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/service-dashboard.php">Dashboard</a>
									     </li>';
									}
									else
									{
										echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/login-front.php">Login / Signup</a>
									     </li>';
									}
								}
								else
								{
									echo 
										'<li class="login-link">
										     <a href="http://localhost/AppointmentApp/login-front.php">Login / Signup</a>
									     </li>';
								}
							?>
							</li>
					</ul>
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Register Now </h3>
										</div>
										
										<!-- Register Form -->
										<form method="POST" id="form">
											<div class="form-group form-focus">
												<input type="text" class="form-control floating name1" name="name1" required>
												<label class="focus-label">Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating email" name="email" required>
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating password" name="password" required>
												<label class="focus-label">Create Password</label>
											</div>
											<div class="form-group form-focus">
												<select class="form-control floating account-type" name="account-type" required>
													<option value="1">Customer</option>
													<option value="2">Service Provider</option>
												</select>
												<label class="focus-label">Choose Account Type</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="http://localhost/AppointmentApp/login-front.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" onclick="loadDoc()" type="submit">Signup</button>
										</form>
										<!-- /Register Form -->
										<script>
											function loadDoc() {
													var name=document.querySelector(".name1").value;
													var email= document.querySelector(".email").value;
													var password = document.querySelector(".password").value;
													var accountType= document.querySelector(".account-type").value;
													if(name.length>0 && email.length>0 && password.length>0)
													{
														var formData="name="+name+"&email="+email+"&password="+password+"&accountType="+accountType;
														var xhttp = new XMLHttpRequest();
														xhttp.open("POST", "http://localhost/AppointmentApp/backend/register.php",false);
														xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

														xhttp.onreadystatechange = function() {
															if (this.readyState == 4 && this.status == 200) {
																console.log(this.responseText);
																if(this.responseText=="1")
																{
																	alert("Registered Sucessfully");
																    redirect("http://localhost/AppointmentApp/login-front.php");
																}
																else if(this.responseText=="-1")
																{
																	alert("Registration Failed");
																}
																
															}
															else {
																
															}
														};
														xhttp.send(formData);
													}
													else
													{
														alert("Inputs Should have length Greater Then 0");
													}
										}
										function redirect(url)
										{
                                               window.location.href=url;
										}
										</script>
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<span style="font-size:1.6rem;color:white;">GAP BOOK</span>
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, Bahria Town,<br> Islamabad,Pakistan </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+92 310 525 9270
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											edge29861@gmail.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
	

		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

</html>