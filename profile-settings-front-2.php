<?php
   session_start();
?>


<!DOCTYPE html> 
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<title>Gap Book</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<script
			src="https://code.jquery.com/jquery-3.4.1.min.js"
			integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			crossorigin="anonymous">
	    </script>
	
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<?php include ('service-header.php') ?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://localhost/AppointmentApp/index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Dashboard</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">
							
							<!-- Profile Sidebar -->
							<div class="profile-sidebar">
								<div class="widget-profile pro-widget-content">
									<div class="profile-info-widget">
										<a href="#" class="booking-doc-img">
											<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image">
										</a>
										<div class="profile-det-info">
											<h3></h3>
											
											<div class="patient-details">
												<h5 class="mb-0"></h5>
											</div>
										</div>
									</div>
								</div>
								<div class="dashboard-widget">
									<nav class="dashboard-menu">
										<ul>
											<li class="active">
												<a href="service-dashboard.php">
													<i class="fas fa-columns"></i>
													<span>Dashboard</span>
												</a>
											</li>
											<li>
												<a href="appointment.php">
												<i class="fas fa-calendar-check"></i>
													<span>Appointments</span>
												</a>
											</li>
											<li>
												<a href="schedule-timings.php">
													<i class="fas fa-hourglass-start"></i>
													<span>Schedule Timings</span>
												</a>
											</li>
											<li>
											<li>
												<a href="profile-settings-front-2.php">
													<i class="fas fa-user-cog"></i>
													<span>Profile Settings</span>
												</a>
											</li>
											<li>
												<a href="change-password-2.html">
													<i class="fas fa-lock"></i>
													<span>Change Password</span>
												</a>
											</li>
											<li>
												<a href="logout.php">
													<i class="fas fa-sign-out-alt"></i>
													<span>Logout</span>
												</a>
											</li>
										</ul>
									</nav>
								</div>
                            </div>
						</div>
							<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									
									<?php
											include './connection.php';
											$Id=$_SESSION['Id'];
											
											if($_SESSION["UserTypeId"]=="2")
											{
												$sql = "Select * from serviceproviders where ServiceproviderId='$Id'";
	
												$result = $conn->query($sql);
												$row = $result->fetch_assoc();
												$UserId=$row["UserId"];
												$des=$row["aboutMe"];
												
											
											
											
												$sql2="Select * from users where UserId='$UserId'";
												$result2 = $conn->query($sql2);
												if($result2->num_rows>0){

							
												While($row2 = $result2->fetch_assoc())
												{?>
													<form method="POST" enctype="multipart/form-data" action="backend/profile-settings-updateData.php">
													   <input value="<?php echo $Id ; ?>" type="hidden" name="ServiceId" >
													   <input value="<?php echo $UserId ; ?>" type="hidden" name="UserId" >
														<div class="row form-row">
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Name</label>
																	<input type="text" value="<?php echo  $row2["name"]; ?>" class="form-control" name="name">
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Category</label>
																	<select type="text"  class="form-control" name="category">
																		<option class="myText"></option>
																		<option value="1" name="medical"  <?php echo ($row["CategoryId"] == '1')?'selected':''; ?>>Medical</option>
																		<option value="2" name="computer" <?php echo ($row["CategoryId"] == '2')?'selected':''; ?>>Computer Science</option>
																		<option value="3" name="marketing" <?php echo ($row["CategoryId"] == '3')?'selected':''; ?>>Marketing</option>
																		<option value="4" name="mana">Management <?php echo ($row["CategoryId"] == '4')?'selected':''; ?></option>
																		<option value="5" name="lawyer" <?php echo ($row["CategoryId"] == '5')?'selected':''; ?>>Lawyer</option>
																	</select>
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Gender</label>
																	<select name="gender" class="form-control" type="text">
					
																		<option value="Male"
																		        <?php echo ($row2["gender"] == 'Male')?'selected':''; ?>>Male</option>
																		<option value="Female"
																		        <?php echo ($row2["gender"] == 'Female')?'selected':''; ?>>Female</option>
																		<option value="Other"
																		        <?php echo ($row2["gender"] == 'Other')?'selected':''; ?>>Other</option>
																	</select>
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Email ID</label>
																	<input type="email" value="<?php echo $row2["email"] ; ?>" class="form-control" name="email" disabled>
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Mobile</label>
																	<input type="text" value="<?php echo $row2["mobileNumber"] ; ?>" class="form-control" name="mobileNumber">
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																	<label>Description</label>
																	<textarea  rows="10" name="aboutMe" class="form-control">
																				 
																	</textarea>
																	<script>
																		document.getElementsByName("aboutMe")[0].value="<?php echo $des; ?>";
																	</script>
																</div>
															</div>
															<div class="col-12">
																<div class="form-group">
																<label>Country</label>
																	<input type="text" value="<?php echo $row2["country"] ; ?>" class="form-control"  name="country">
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>City</label>
																	<input type="text" class="form-control" value="<?php echo $row2["city"] ; ?>" name="city">
																</div>
															</div>
															<div class="col-12 col-md-6">
																<div class="form-group">
																	<label>Postal Code</label>
																	<input type="text" class="form-control" value="<?php echo $row2["postalCode"] ; ?>" name="postalCode">
																</div>
															</div>
														</div>
														<div class="submit-section">
															<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
														</div>
													</form>
									<!-- /Profile Settings Form -->
									<?php } }
											}
                                     ?>

															
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
							
                        <!-- Footer -->
			<?php include 'footer.php'?>
			<!-- /Footer -->
		   
        </div>
           
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
	
		
	</body>
</html>