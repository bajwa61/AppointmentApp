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
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
            <!-- Header -->
            <?php include 'header.php' ?>
			
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://localhost/AppointmentApp/index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Search</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

					<div class="row">
						<div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">
						
							<!-- Search Filter -->
							<div class="card search-filter">
								<div class="card-header">
									<h4 class="card-title mb-0">Search Filter</h4>
								</div>
								<div class="card-body">
								<div class="filter-widget">
                                    <h4>Select Specialist</h4>
                                    
                                    <?php include 'connection.php' ?>
									                      <?php 
									                         $sql="SELECT * FROM serviceproviderscategory";
									                         $result=$conn->query($sql);
									                         while($row = $result->fetch_assoc())
			 						                      {?>
			    							               <div>
															  <input type="checkbox"  name="Search[]" value="<?php echo $row["CategoryId"] ; ?>">
															  <label class="custom_check">  <?php echo $row["name"] ?></label>
														  </div>
														   <?php } $conn->close(); ?>									
								</div>
									<div class="btn-search">
										<button type="button" class="btn btn-block">Search</button>
									</div>	
								</div>
							</div>
							<!-- /Search Filter -->
							
						</div>
						
						<div class="col-md-12 col-lg-8 col-xl-9">

                        <?php
						     include 'connection.php';  
					    ?>
					    <?php 

					           $sql="SELECT * FROM users INNER JOIN serviceproviders where serviceproviders.UserId=users.UserId";
					           $result=$conn->query($sql);

					           if ($result->num_rows > 0) {
						            while($row = $result->fetch_assoc()) 
						                {
					  ?>
                            <!-- Doctor Widget -->
                            <form action="booking.php" enctype="multipart/form-data" >
						            <input type="hidden" value="<?php echo $row["ServiceProviderId"]; ?>" name="ServiceProviderId" >
							<div class="card">
								<div class="card-body">
									<div class="doctor-widget">
										<div class="doc-info-left">
											<div class="doctor-img">
												<a href="doctor-profile.html">
                                                     <img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="User Image">
												</a>
											</div>
											<div class="doc-info-cont">
											
													<h4 class="doc-name"><?php echo $row["name"] ?></h4>
													
													<?php
														$CategoryId=$row["CategoryId"]; 
														$sql2="Select name from serviceproviderscategory where CategoryId=$CategoryId";
														$result2=$conn->query($sql2);
														if($result2->num_rows>0)
															{
																$row2 = $result2->fetch_assoc();
													?>
														<h4 class="doc-name">
															<?php echo $row2["name"] ?>
														</h4>
													<?php } ?>
														<p class="doc-speciality"><?php echo $row["aboutMe"] ;?></p>
											</div>
										</div>
										<div class="doc-info-right">
                                                    <div class="clini-infos">
														<ul>
														<li class="font-weight-bold">
															<i class="fas fa-map-marker-alt"></i>
															<?php  echo $row["city"] ; echo ',' ; echo $row["country"] ; echo'</li>'; ?>
														</ul>
													</div>
											<div class="clinic-booking">
                                                      <button type="submit"
															class="mt-50 btn btn-primary" >
																Book Appointment
													  </button>
											</div>
										</div>
									</div>
								</div>
                            </div>
                            </form>
                            <!-- /Doctor Widget -->
                          
                            <?php } ?>
                            <?php } else {
				                 echo "0 results";
			                  }
			                      $conn->close();

		                   ?>		
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<?php include 'footer.php' ?>
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
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js"></script>
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	</body>


</html>