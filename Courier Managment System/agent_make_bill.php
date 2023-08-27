<?php 
require('agent_menu.inc.php');
// require('connection.inc.php');
  $alert = false;
  $Error = false;
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      // Form was submitted, process the data and insert into the database
      $center = $_POST['center'];
      $sender = $_POST['sender'];
      $rname = $_POST['rname'];
      $remail = $_POST['remail'];
      $raddress = $_POST['raddress'];
      $ctype = $_POST['ctype'];
      $ddate = $_POST['ddate'];
      $cid = $_POST['cid'];
      $cpid = $_POST['cpid'];
      $randomTrackingNumber = generateRandomString(10);
      
  
    
// ... (other form data retrieval)

$weight = $_POST['weight'];
$multipliedWeight = $weight * 999; // Multiply the weight by 999

$deliveryCharges = $multipliedWeight; // Use the multiplied weight as delivery charges

$sql = "INSERT INTO `bill` (`tracking_num`, `center_id`, `sender_id`, `receiver_name`, `receiver_email`, `receiver_address`, `courier_type`, `delivery_date`, `courier_id`, `courier_company_id`, `delivery_charges`, `weight`) VALUES ('$randomTrackingNumber', '$center', '$sender', '$rname', '$remail', '$raddress', '$ctype', '$ddate', '$cid', '$cpid', '$deliveryCharges', '$weight')";

$result = mysqli_query($conn, $sql);

if ($result) {
    $alert = true;
} else {
    $Error = true;
}

  }
  
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a New Bill</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <main id="main" class="main">
        <?php
        if ($alert) {        
echo '<div class="alert alert-primary alert-dismissible fade show mt-0 " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
    </button>
    <strong>Your Bill is Ready!</strong> 
  </div>';
}
if($Error){
echo '<div class="alert alert-danger alert-dismissible fade show mt-0 " role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  <span class="sr-only">Close</span>
</button>
<strong>Error!</strong> Bill is not ready.Please Try again later.
</div>';
}
  ?>
        <div class="pagetitle">
            <h1>Bill</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="agnet_dashboard.php">Home</a></li>
                    <li class="breadcrumb-item active">Make a Bill</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="container">
                    <hr>
                    <a href="bill.php" class="btn btn-outline-primary">Back</a>

                </div>
                <div class="container">
                    <h1 class="text-center">Make New Bill</h1>
                    <div class="col-lg-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="tracker" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="center" class="form-label">Center</label>
                                        <select class="form-select" id="center" name="center" required>
                                            <option value="Select Center" selected>Select Center</option>
                                            <!-- Fetch and populate the Retail Center options from the database -->
                                            <?php
                                      $rcenter = "SELECT * FROM retailcenter";
                                      $r_result = mysqli_query($conn,$rcenter);
                                      while ($row = mysqli_fetch_assoc($r_result)) {
                                          echo "<option value='" . $row['center_id'] . "'>" . $row['center_name'] . "</option>";
                                      }
                                      ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Sender" class="form-label">Sender</label>
                                        <select class="form-select" id="Sender" name="sender" required>
                                            <option value="Select Sender Name" selected>Select Sender Name</option>

                                            <!-- Fetch and populate the Sender options from the database -->
                                            <?php
                                      $user_sender = "SELECT * FROM users";
                                      $user_result = mysqli_query($conn,$user_sender);
                                      while ($row = mysqli_fetch_assoc($user_result)) {
                                          echo "<option value='" . $row['user_id'] . "'>" . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . " </option>";
                                      }
                                      ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Reciever Name</label>
                                        <input type="text" class="form-control" name="rname" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Reciever Email</label>
                                        <input type="email" class="form-control" name="remail" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Reciever Address</label>
                                        <textarea class="form-control" name="raddress" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Courier Type</label>
                                        <input type="text" class="form-control" name="ctype">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Final Delivery Date</label>
                                        <input type="date" class="form-control" name="ddate" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Courier ID</label>
                                        <select class="form-select" id="cid" name="cid" required>
                                            <option value="Select Courier" selected>Select Courier ID</option>
                                            <?php
                                                    $courier_sql = "SELECT * FROM shippeditem";
                                                    $courier_result = $conn->query($courier_sql);
                                                    while ($row = $courier_result->fetch_assoc()) {
                                                        echo "<option value='" . $row['courier_id'] . "'>" . $row['courier_id'] . "</option>";
                                                    }
                                        ?>
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="" class="form-label">Weight</label>
                                        <input type="text" class="form-control" id="weight" name="weight" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cpid" class="form-label">Courier Company</label>
                                        <select class="form-select" id="cpid" name="cpid" required>
                                            <option value="Select Courier Company" selected>Select Courier Company
                                            </option>
                                            <!-- Fetch and populate the Courier Companies options from the database -->
                                            <?php
                                      $company_sql = "SELECT * FROM couriercompanies";
                                      $company_result = $conn->query($company_sql);
                                      while ($row = $company_result->fetch_assoc()) {
                                          echo "<option value='" . $row['courier_company_id'] . "'>" . $row['courier_company_name'] . "</option>";
                                      }
                                      ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Make Bill</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer border-top border-info">

                        </div>
                    </div>
                </div>
            </div>






            </div>



        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const cidSelect = document.getElementById("cid");
            const weightInput = document.getElementById("weight");

            cidSelect.addEventListener("change", function () {
                const selectedCourierId = cidSelect.value;

                // Fetch the weight based on the selected courier ID using an AJAX request
                fetch('get_weight.php?cid=' + selectedCourierId)
                    .then(response => response.json())
                    .then(data => {
                        // Update the weight input field with the retrieved weight value
                        weightInput.value = data.weight;
                    })
                    .catch(error => {
                        console.error('Error fetching weight:', error);
                    });
            });
        });
    </script>
</body>

</html>

<?php
require('footer.inc.php');
?>