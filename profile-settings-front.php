<?php
  session_start();
?>

<!DOCTYPE html> 
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Gap Box</title>
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
		<!-- Header -->
		<?php include 'customer-header.php' ?>
			<!-- /Header -->
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
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									<?php
											include './connection.php';
											$Id=$_SESSION['Id'];
											if($_SESSION["UserTypeId"]=="1")
											{
												$sql = "Select UserId from customers where CustomerId='$Id'";
	
												$result = $conn->query($sql);
												$row = $result->fetch_assoc();
												$UserId=$row["UserId"];
											
												$sql2="Select * from users where UserId='$UserId'";
												$result2 = $conn->query($sql2);
												if($result2->num_rows>0){

							
												While($row2 = $result2->fetch_assoc())
												{?>
													<form method="POST" enctype="multipart/form-data" action="backend/profile-settings-updateData.php">
													 <input type="hidden" value="<?php echo $row["UserId"] ?> " name="UserId" >
													<div class="row form-row">
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Name</label>
																<input value="<?php echo $row2['name']; ?>" type="text" class="form-control" name="name">
															</div>
														</div>
					
														
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Email ID</label>
																<input value="<?php echo $row2['email'] ?>" type="email" class="form-control" name="email" disabled>
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Mobile</label>
																<input value="<?php echo $row2['mobileNumber'] ?>" type="text"  class="form-control" name="mobileNumber">
															</div>
														</div>
														<div class="col-12">
															<div class="form-group">
															<label>Country</label>
																<input value="<?php echo $row2['country'] ?>" type="text" class="form-control"  name="country">
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>City</label>
																<input value="<?php echo $row2['city'] ?>" type="text" class="form-control" name="city">
															</div>
														</div>
														<div class="col-12 col-md-6">
															<div class="form-group">
																<label>Postal Code</label>
																<input value="<?php echo $row2['postalCode'] ?>" type="text" class="form-control" name="postalCode">
															</div>
														</div>
													</div>
													<div class="submit-section">
														<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
													</div>
												</form>
												<?php } }
											}
                                     ?>
									
									<!-- /Profile Settings Form -->

									
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
			<script>
				 function showData2()
					{
						var xhttp = new XMLHttpRequest();
					    xhttp.open("GET", "http://localhost/AppointmentApp/backend/customer-general-getData.php",false);
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
                  
			</script>
			<script>		       
					$(document).ready(function(){

                            showData2();
					});
			 </script>
			 
			
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Select2 JS -->
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		
		<!-- Datetimepicker JS -->
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		
		<!-- Sticky Sidebar JS -->
        <script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
        <script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

</html>