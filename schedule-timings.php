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
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		
	
	</head>
	<body>

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
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
											<form method="POST">
												<div class="row">

													<div class="col-lg-4">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<input placeholder="Time in Minutes" type="text" class="select form-control" name="duration">
														</div>
													</div>
												</div>  
												<div class="row">
													<div class="col-lg-4">
															<div class="form-group">               
																<label>Choose Date</label>
																<input type="date" class="form-control" name="date">
															</div>
													</div>
												</div>    
												<div class="row">
													<div class="col-lg-4">
															<div class="form-group">               
																<label>Choose Time</label>
																<input type="time" class="form-control" name="time">
															</div>
													</div>
												</div>  
												<div class="row">
													<div class="col-lg-4">
															<button class="btn btn-primary" onclick="addSlot()">Add Slot Now</button>
													</div>
												</div>
											</form>
									<script>
											function addSlot() {
													var duration=document.getElementsByName("duration")[0].value;
													var date= document.getElementsByName("date")[0].value;
													var time = document.getElementsByName("time")[0].value;											
													var formData="duration="+duration+"&date="+date+"&time="+time;
													var xhttp = new XMLHttpRequest();
													xhttp.open("POST", "http://localhost/AppointmentApp/backend/add-slot.php",false);
													xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
													xhttp.onreadystatechange = function() {
														if (this.readyState == 4 && this.status == 200) {
																console.log(this.responseText);
																if(this.responseText=="1")
																{
																	alert("Slot Added Sucessfully");
																}
																else if(this.responseText=="-1")
																{
																	alert("Slot Added Failed");
																}
																
															}
															else {
																
															}
														};
														xhttp.send(formData);
											}
								</script>     
												
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
		
		
	</body>


</html>