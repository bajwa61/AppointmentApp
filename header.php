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