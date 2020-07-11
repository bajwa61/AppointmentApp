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
			<?php include 'customer-header.php' ?>
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
						
						<!-- Profile Sidebar -->
							<?php include 'customer-profileSideBar.php' ; ?>
						<!-- / Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
									<nav class="user-tabs mb-4">
										<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
											<li class="nav-item">
												<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
											</li>
										</ul>
									</nav>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-0">
										
										<!-- Appointment Tab -->
										<div id="pat_appointments" class="tab-pane fade show active">
											<div class="card card-table mb-0">
												<div class="card-body">
													<div class="table-responsive">
														<table class="table table-hover table-center mb-0">
															<thead>
																<tr>
																	<th>Service Provider Name</th>
																	<th>Phone Number</th>
																	<th>Appointment Date</th>
																	<th>Appointment Time</th>
																</tr>
															</thead>
															<tbody>
															<?php 
																            include 'connection.php';
																            $CID=$_SESSION["Id"];//Customer Booking
																
									
																
																			$sql2="SELECT * FROM  bookings where bookings.CustomerId='$CID'";
																			
																					$result2 = $conn->query($sql2);
																						if ($result2->num_rows > 0) {
																								while($row2 = $result2->fetch_assoc()){
																									
																									
																									$custID=$row2["SlotId"];
																									$sql3="SELECT * from slots where SlotId='$custID' ";
																									
																									$result3 = $conn->query($sql3);
																									$row3 = $result3->fetch_assoc();

																									$userID=$row3["ServiceProviderId"];
																									$sql4="Select UserId from serviceproviders where ServiceproviderId='$userID'";
																									$result4 = $conn->query($sql4);
																									$row4 = $result4->fetch_assoc();

																									$userID=$row4["UserId"];
																									$sql5="Select * from users where UserId='$userID' LIMIT 1 ";
																									
																									$result5 = $conn->query($sql5);
																									while($row5 = $result5->fetch_assoc()){ ?>
																										<tr>
																											<td><?php echo $row5["name"] ?></td>
																											<td><?php echo $row5["mobileNumber"]; ?></td>
																											<td><?php echo $row3["date"]  ; ?></td>
																											<td><?php echo $row3["time"]  ; ?></td>
																										</tr>
                                                                           <?php }     
																								}
																						}
																	
															?>
																
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!-- /Appointment Tab -->
									</div>
									<!-- Tab Content -->
									
								</div>
							</div>
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<?php include 'footer.php' ; ?>
			<!-- /Footer -->
		   
		</div>
		<script>
			        function showData()
					{
						var xhttp = new XMLHttpRequest();
					    xhttp.open("GET", "http://localhost/se_project/backend/customer-general-getData.php",false);
					    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				     	xhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
									var myObj = JSON.parse(this.responseText);
									if(myObj.name.length==0)
									{
										document.getElementById("name").innerHTML="Customer";
									}
									else
									{
										document.getElementById("name").innerHTML=myObj.name;
									}
									if(myObj.dob=="0000-00-00")
									{
										document.getElementById("dob").style.display='none';
									}
									else
									{
										document.getElementById("dob").innerHTML=myObj.dob;
									}
									if(myObj.city.length==0 || myObj.country.length==0)
									{
										document.getElementById("location").style.display='none';
									
									}
									else
									{
										document.getElementById("location").innerHTML=myObj.city+","+myObj.country;
									}
									
									
							}
                        };		
					xhttp.send();
					}
					$(document).ready(function(){
                            showData();
					});
		</script>
		<!-- /Main Wrapper -->
	  
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		<script src="assets/js/script.js"></script>
		
	</body>

</html>