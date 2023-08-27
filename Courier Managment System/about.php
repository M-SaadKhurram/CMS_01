
<?php
     require('connection.inc.php'); 
	 require('functions.inc.php');

	
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-primary">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">CMS.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_tracking.php">Track your courier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Sing Out</a>
          </li>  
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>  
         
        </ul>
      </div>
    </div>
  </nav>
	<div class="hero overlay">
		<div class="container">
			<div class="row align-items-center justify-content-between pt-5">
				<div class="col-lg-6 text-center text-lg-start pe-lg-5 m-0">
					<h1 class="heading text-white mb-3" data-aos="fade-up">About US</h1>
					<p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">A Courier Management System (CMS) is a software solution that automates and optimizes the management of courier and logistics operations. It is essential for courier companies and businesses involved in shipping and deliveries. The system facilitates order creation, real-time tracking, route optimization, fleet management, and inventory control. It enables customers to track their packages, offers route suggestions, manages vehicle fleets, and ensures timely deliveries. Additionally, it provides features like delivery scheduling, automated notifications, and insightful reports. Integration with e-commerce platforms and robust security measures are also part of its functionalities. Overall, a CMS greatly enhances efficiency in supply chain management and delivery services.</p>
					<div class="align-items-center mb-5 mm" data-aos="fade-up" data-aos-delay="200">
						<a href="home.php" class="btn btn-dark me-4">Back</a>
						<!-- <a href="https://www.youtube.com/watch?v=Mb1zrW_zra4" class="text-white glightbox">Watch the video</a> -->
					</div>
				</div>
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="img-wrap">
						<img src="./img/track your courier.jpg" alt="Image" class="img-fluid rounded">
					</div>
				</div>
			</div>
		</div>
	</div>


	
</body>
</html> 

   

