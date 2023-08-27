<?php
require('agent_menu.inc.php');

$trackingNumber = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code here
   

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize the input
    $trackingNumber = mysqli_real_escape_string($conn, $_POST["trackingNumber"]);

    // Query to fetch status from bill table
    $sql = "SELECT * FROM bill WHERE tracking_num = '$trackingNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Tracking</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <main id="main" class="main">
        <div class="container mt-5">
            <h2>Track Bill Status</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="trackingNumber" class="form-label">Enter Tracking Number:</label>
                    <input type="text" class="form-control" id="trackingNumber" name="trackingNumber" required>
                </div>
                <button type="submit" class="btn btn-primary">Track</button>
            </form>
        </div>
        <div class="container mt-5">
            <?php if ($trackingNumber !== "" && isset($row)) : ?>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tracking Number: <?php echo $row['tracking_num'] ?></h5>
                            <p class="card-text"> <b> Date: </b> <?php echo $row['bill_date'] ?></p>
                            <p class="card-text"> <b> Receiver Name:</b> <?php echo $row['receiver_name'] ?></p>
                            <p class="card-text"> <b> Email:</b> <?php echo $row['receiver_email'] ?></p>
                            <p class="card-text"> <b> Receiver Address:</b> <?php echo $row['receiver_address'] ?></p>
                            <p class="card-text"> <b> Delivery Charges :</b> <?php echo $row['delivery_charges'] ?></p>
                            <p class="card-text"> <b> Status :</b> <?php echo $row['status'] ?></p>
                            <button class="btn btn-outline-secondary" onclick="window.print()">Print</button>
                        </div>
                    </div>
                </div>
            <?php elseif ($trackingNumber !== "") : ?>
                <div class="alert alert-danger mt-3">Tracking number not found.</div>
            <?php endif; ?>
        </div>
    </main>
    <!-- Include Bootstrap JS -->

<?php
require('footer.inc.php');
?>
</body>

</html>
