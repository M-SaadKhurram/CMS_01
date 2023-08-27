<?php
// Database connection code here (create $conn)
require('menu.inc.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Form was submitted, process the data and insert into the database
    $weight = $_POST['weight'];
    $dimension = $_POST['dimension'];
    $insuranceamount = $_POST['insuranceamount'];
    $destination = $_POST['destination'];
    $finaldeliverydate = $_POST['finaldeliverydate'];

    // Perform data validation if needed

    $sql = "INSERT INTO shippeditem (weight, dimension, insuranceamount, destination, finaldeliverydate) 
            VALUES ('$weight', '$dimension', '$insuranceamount', '$destination', '$finaldeliverydate')";

    if ($conn->query($sql) === TRUE) {
        echo "Courier item added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Courier Item</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div>
            <p>
            <br>
        </p>
        </div>
        <h1 class="text-center">Add New Courier Item</h1>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body ">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="text" class="form-control" id="weight" name="weight" required>
                            </div>
                            <div class="mb-3">
                                <label for="dimension" class="form-label">Dimension</label>
                                <input type="text" class="form-control" id="dimension" name="dimension" required>
                            </div>
                            <div class="mb-3">
                                <label for="insuranceamount" class="form-label">Insurance Amount</label>
                                <input type="text" class="form-control" id="insuranceamount" name="insuranceamount" required>
                            </div>
                            <div class="mb-3">
                                <label for="destination" class="form-label">Destination City</label>
                                <select class="form-select" id="destination" name="destination" required>
                                    <!-- Fetch and populate the city options from the database -->
                                    <?php
                                    $city_query = "SELECT * FROM cities";
                                    $city_result = $conn->query($city_query);
                                    while ($row = $city_result->fetch_assoc()) {
                                        echo "<option value='" . $row['city_id'] . "'>" . $row['city'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="finaldeliverydate" class="form-label">Final Delivery Date</label>
                                <input type="date" class="form-control" id="finaldeliverydate" name="finaldeliverydate" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Courier Item</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
require('footer.inc.php')
?>
