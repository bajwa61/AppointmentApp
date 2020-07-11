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
	<body>

		<div class="main-wrapper">
			<?php  include 'header.php' ?>
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-8 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="http://localhost/AppointmentApp/index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						<?php include 'connection.php' ?>
						<?php 
							$ShowId=$_GET["ServiceProviderId"];
							$sql="Select UserId from serviceproviders where ServiceProviderId='$ShowId'";
							$result = $conn->query($sql);
							$row = $result->fetch_assoc();

							$UserId=$row["UserId"];
							
							$sql2="SELECT name,country,city FROM users where UserId=$UserId";
							$result2 = $conn->query($sql2);
							$row2 = $result2->fetch_assoc();
						?>
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
										  <img src="assets/img/specialities/specialities-03.png" class="img-fluid" alt="User Image">
										</a>
										<div class="booking-info">
											<h4>
											       <a href="doctor-profile.html" id="name"><?php echo $row2["name"] ?></a>
											</h4>
											<p class="text-muted mb-0">
												<i class="fas fa-map-marker-alt"></i> 
											       <span id="location">
												        <?php  echo $row2["city"] ; echo ',' ; echo $row2["country"] ; echo'</li>'; ?>
												   </span>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="card booking-schedule schedule-widget">
								<div class="schedule-header">
									<div class="row">
										<div class="col-md-12">
										       <h3>Slots</h3>
										</div>
									</div>
								</div>
								<div class="schedule-cont">
								   <div class="row">
									   <div class="col-md-3">Date</div>
									   <div class="col-md-3">Time</div>
									   <div class="col-md-3">Duration</div>
									   <div class="col-md-3">Proceed</div>
								   </div> 
								  <?php 
								       include 'connection.php';
									   $sql3="Select * from slots where ServiceProviderId='$ShowId'";
                                       $result3=$conn->query($sql3);
                                       if ($result3->num_rows > 0) {
										   while($row3 = $result3->fetch_assoc()){ ?>
										   <form method="POST" action="checkout.php" >
										      <input type="hidden" value="<?php echo $row3["SlotId"] ?>" name="SlotId">
										   <div class="row" style="margin-top:5vh;font-size:1.3rem;">
										      
														<div class="col-md-3"><?php echo $row3["date"] ?></div>
														<div class="col-md-3"><?php echo $row3["time"] ?></div>
														<div class="col-md-3"><?php echo $row3["duration"] ?> Mins</div>
														<div class="col-md-3">
															<button class="btn btn-primary" type="submit">Confirm Appointment</button>
														</div>
											 </div>
											 </form>
										   <?php } } else{?>
											   <div class="row" style="margin-top:5vh;font-size:1.3rem;margin-left:2vh;">
                                                    No Slots Found
											   </div>
										   <?php } 
												$conn->close(); 
										   ?>	 
								</div>			
							</div>
						
						</div>
					</div>
				</div>
			</div>		
			<?php include 'footer.php' ?>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/script.js"></script>
		
		
	</body>

</html>