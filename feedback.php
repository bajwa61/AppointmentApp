<?php
  session_start();
?>
<!DOCTYPE html> 
<html lang="en">
	
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>Gap Book</title>
		<link type="image/x-icon" href="assets/img/favicon.png" rel="icon">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
		<div class="main-wrapper">
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
							<li class="active">
								<a href="http://localhost/AppointmentApp/index.php">Home</a>
							</li>

							<li class="login-link">
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

			<div style="text-align:center;" class="mt-4">
				<h1>Feedback</h1>
			</div>
			<div style="padding-lefT:15vh;margin-bottom:10vh;">
				<form method="post">
						<div class="form-group">
							<label for="exampleFormControlInput1">Email address</label>
							<input type="email" class="form-control" id="exampleFormControlInput1 " name="email" placeholder="name@example.com">
						</div>
						<div class="form-group">
							<label for="exampleFormControlSelect1">Enter Name</label>
							<input type="text" class="form-control" id="exampleFormControlInput2" name="name" placeholder="Enter Name">
						</div>
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Enter Feedback Here</label>
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="text1"></textarea>
						</div>
						<button class="btn-lg btn-primary" onclick="submitFeedback()">Submit Now</button>
				</form>
			</div>
			<script>
				function submitFeedback()
				{
					var email=document.getElementsByName("email")[0].value;
					var name=document.getElementsByName("name")[0].value;
					var text1=document.getElementsByName("text1")[0].value;
					if(email.length>5 && name.length>0 && text1.length>0){
						alert("Feedback Send");
					}else{
						alert("Invalid Inputs");
					}
					/*var formData="name="+name+"&email="+email+"&text1="+text1;					    
					/*var xhttp = new XMLHttpRequest();
					xhttp.open("POST", "http://localhost/AppointmentApp/backend/sendEmail.php",true);
					xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
									   alert(this.responseText);
							        }
                                };		
					        xhttp.send(formData);*/
				}
			</script>
		 
		   	
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
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slick JS -->
		<script src="assets/js/slick.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>