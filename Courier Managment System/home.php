<?php
require('connection.inc.php');
require('functions.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
          <a class="nav-link" href="login.php">Sing In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="new_user.php">Sing Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About Us</a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>  
       
      </ul>
    </div>
  </div>
</nav>





        
         
            <div class="container">
                <div class="row align-items-center justify-content-between pt-5">
                    <div class="col-lg-6 text-center text-lg-start pe-lg-5 m-0">
                        <h1 class="display-4 text-white mb-3" data-aos="fade-up">CMS</h1>
                        <p class="lead text-white mb-5" data-aos="fade-up" data-aos-delay="100">Courier management system is currently handled manually by the organisation and facing various challenges in maintaining records and providing information to its customers. Tracking and handling of couriers is becoming tedious for the organisation.</p>
                        
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <img src="./img/istockphoto-1186576767-612x612.jpg" alt="Image" class="img-fluid rounded">
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-XXXX" crossorigin="anonymous"></script>
</body>
</html>
