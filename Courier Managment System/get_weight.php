<?php
 require('connection.inc.php');

if (isset($_GET['cid'])) {
    $selectedCourierId = $_GET['cid'];
    
    // Fetch the weight based on the selected courier ID from the database
    $weight_sql = "SELECT weight FROM shippeditem WHERE courier_id = '$selectedCourierId'";
    $weight_result = mysqli_query($conn, $weight_sql);

    if ($weight_result && mysqli_num_rows($weight_result) > 0) {
        $row = mysqli_fetch_assoc($weight_result);
        $weight = $row['weight'];
        
        // Return the weight as JSON response
        echo json_encode(array('weight' => $weight));
    } else {
        echo json_encode(array('weight' => ''));
    }
} else {
    echo json_encode(array('weight' => ''));
}
?>
