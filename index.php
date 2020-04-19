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
		
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Service, Make an Appointment</h1>
							<p>Discover the Best Service Provider.</p>
						</div>
						<div class="search-box" style="text-align: center;">
							
						<button type="submit" class="btn-lg" onclick="redirect()" style="padding-right:10vh;padding-left:10vh;background-color: #09e5ab;border: 1px solid #09e5ab;">
									<h1 style="color:white;">
										Book Appointment Now
									</h1>
								</button>
							
						</div>
					</div>
				</div>
			</section>
			

			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Services Offered</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
							
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-01.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Doctor</p>
								</div>	
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-02.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>Lawyer</p>	
								</div>							
								<!-- /Slider Item -->

								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-05.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>	
									<p>Property Dealer</p>
								</div>
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>	
									<p>Social Media Manager</p>	
								</div>							
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="assets/img/specialities/specialities-04.png" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>	
									<p>Business Consultant</p>	
								</div>							
								<!-- /Slider Item -->
								
								
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
		  
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-lg-12" style="text-align: center">
							<div class="section-header ">
								<h2>Book Our Service Provider</h2>
								<p>Lorem Ipsum is simply dummy text </p>
							</div>
							<div class="about-content">
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum.</p>
								<p>web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes</p>					
								<br>
								<button type="submit" class="btn"  style="padding-right:7vh;padding-left:7vh;background-color: #09e5ab;border: 1px solid #09e5ab;">
									<h1 style="color:white;">
										Read More
									</h1>
								</button>
								<script>
									function redirect()
									{
										window.location.href="http://localhost/AppointmentApp/search.php";
									}


								</script>
							</div>
						</div>
								
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->
		   	
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