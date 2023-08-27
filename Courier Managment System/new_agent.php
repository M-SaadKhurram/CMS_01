<?php
require('menu.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form was submitted, process the data and insert into the database
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $phonenumber = $_POST['phonenumber'];
    $email=$_POST['email'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $username=$_POST['username'];
    $password=$_POST['password'];
   

    // Perform data validation if needed
    $sql="INSERT INTO `users` ( `firstname`, `middlename`, `lastname`, `gender`, `phonenumber`, `email`, `street`, `city`, `state`, `country`, `username`, `password`, `role_id`) VALUES ( '$firstname', '$middlename', '$lastname', '$gender', '$phonenumber', '$email', '$street', '$city', '$state','$country', '$username', '$password', '2');";

    // $sql = "INSERT INTO shippeditem (firstname, middlename, lastname, gender, phonenumber) 
    //         VALUES ('$firstname', '$middlename', '$lastname', '$gender', '$phonenumber')";




// ... (other PHP code)

if ($conn->query($sql) === TRUE) {
   echo $msg=`<div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert" style="width: 300px;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>New record created successfully</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
`;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ... (rest of the PHP code)

    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div>
<p class="mt-5">
<br>
</p>
</div>
    <div class="container mt-5">
        <h1 class="text-center">Creat New Agent</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" required>
                            </div>
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">phone Number</label>
                                <input type="number" class="form-control" id="phonenumber" name="phonenumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">street</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Creat New Agent </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
<?php
require('footer.inc.php')
?>