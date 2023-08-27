<?php
   require('connection.inc.php'); 
   require('functions.inc.php');
  if ($_SESSION['user_LOGIN'] == 'yes' && isset($_SESSION['user_USERNAME'])) {
  } else {
    header('location:login.php');
  } 
  ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <h1 class="heading text-white mb-3" data-aos="fade-up">A trusted provider of <br>
                    <b>
                        courier services.
                </h1>

                </b>

                <p class="text-white mb-5" data-aos="fade-up" data-aos-delay="100">
                Our services are best for speedy and urgent deliveries for customers. Customers can easily track their Overnight and COD shipments through our easy-to-use .    
                We deliver your products safely to
                    your home in a reasonable time</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="img-wrap">
                    <img src="./img/user.png" alt="Image" class="img-fluid rounded-circle" style="border: 12px groove white;">
                </div>
            </div>
        </div>
    </div>
</div>


   </body>
   </html> 


