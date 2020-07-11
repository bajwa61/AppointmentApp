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
			<?php include 'service-header.php' ?>
			<!-- /Header -->
			
			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
							<?php include 'service-sidebar.php' ?>
							<!-- /Profile Sidebar -->
							
						</div>
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Appointments</h4>
									<div class="appointment-tab">
									
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="table-responsive">
															<table class="table table-hover table-center mb-0">
																<thead>
																	<tr>
																		<th>Customer Name</th>
																		<th>Customer Phone</th>
																		<th>Appointment Date</th>
																		<th>Appointment Time</th>
																	</tr>
																</thead>
																<tbody>
                        <?php 
                              include 'connection.php';
                              $id=$_SESSION["Id"];
                              $sql="Select SlotId from slots where ServiceProviderId='$id' ";
                              $result = $conn->query($sql);
							  if ($result->num_rows > 0) {
								    while($row = $result->fetch_assoc()){ 	    
                                        $slotID=$row["SlotId"];
										$sql2="SELECT * FROM slots INNER JOIN bookings where bookings.SlotId='$slotID'";
												$result2 = $conn->query($sql2);
													if ($result2->num_rows > 0) {
															while($row2 = $result2->fetch_assoc()){                           
                                                                            $custID=$row2["CustomerId"];
																			$sql3="SELECT UserId from customers where CustomerId='$custID' LIMIT 1 ";
                                                                            $result3 = $conn->query($sql3);
                                                                            $row3 = $result3->fetch_assoc();
                                                                            $userID=$row3["UserId"];
                                                                            $sql4="Select * from users where UserId='$userID' LIMIT 1 ";
                                                                            $result4 = $conn->query($sql4);
                                                                            while($row4 = $result4->fetch_assoc()){ ?>
                                                                                 <tr>
                                                                                    <td><?php echo $row4["name"] ?></td>
                                                                                    <td><?php echo $row4["mobileNumber"]; ?></td>
                                                                                    <td><?php echo $row2["date"]  ; ?></td>
                                                                                    <td><?php echo $row2["time"]  ; ?></td>
                                                                                </tr>
                                                                           <?php }                                                            
                                                            }
                                                        }
                                    }
                                } 
                        ?>
																
																
															</tbody>
															</table>
		
														</div>
													</div>
												</div>
											</div>
								
									   
				
										</div>
									</div>
								</div>
							</div>

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
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Circle Progress JS -->
		<script src="assets/js/circle-progress.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	</body>
</html>