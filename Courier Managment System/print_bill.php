<?php
require('menu.inc.php');
$bill_id = $_GET['bill_id'];
if(isset($_GET['bill_id'])) {
    $bill_id = $_GET['bill_id'];

} else {
    echo "Bill ID not provided.";
}
?>

<main id="main" class="main">
<div class="pagetitle">
    <h1>Bill</h1>

</div><!-- End Page Title -->


<section class="section">
    <div class="row">
        <?php
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "SELECT * FROM bill as b
        INNER JOIN users as u on b.sender_id = u.user_id
        INNER JOIN `retailcenter` as r on b.center_id = r.center_id
        INNER JOIN couriercompanies as c on b.courier_company_id = c.courier_company_id
        WHERE bill_id = '$bill_id'";
        $result = $conn->query($sql);

        $noresult = true;

        $row = $result->fetch_assoc()
            ?>
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tracking Number:
                        <?php echo $row['tracking_num'] ?>
                    </h5>
                    <p class="card-text"> <b> Date: </b>
                        <?php echo $row['bill_date'] ?>
                    </p>
                    <p class="card-text"> <b> Center ID:</b>
                        <?php echo $row['center_id'] ?>
                    </p>
                    <p class="card-text"> <b> Center Name:</b>
                        <?php echo $row['center_name'] ?>
                    </p>
                    <p class="card-text"> <b> Sender ID:</b>
                        <?php echo $row['sender_id'] ?>
                    </p>
                    <p class="card-text"> <b> Sender Name:</b>
                        <?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'] ?>
                    </p>
                    <p class="card-text"> <b> Receiver Name:</b>
                        <?php echo $row['receiver_name'] ?>
                    </p>
                    <p class="card-text"> <b> Email:</b>
                        <?php echo $row['receiver_email'] ?>
                    </p>
                    <p class="card-text"> <b> Receiver Address:</b>
                        <?php echo $row['receiver_address'] ?>
                    </p>
                    <p class="card-text"> <b> Courier Type:</b>
                        <?php echo $row['courier_type'] ?>
                    </p>
                    <p class="card-text"> <b> Final Delivery Date: </b>
                        <?php echo $row['delivery_date'] ?>
                    </p>
                    <p class="card-text"> <b> Courier ID:</b>
                        <?php echo $row['courier_id'] ?>
                    </p>
                    <p class="card-text"> <b> Courier Weight:</b>
                        <?php echo $row['weight'] ?>
                    </p>
                    <p class="card-text"> <b> Courier Company ID:</b>
                        <?php echo $row['courier_company_id'] ?>
                    </p>
                    <p class="card-text"> <b> Courier Company Name:</b>
                        <?php echo $row['courier_company_name'] ?>
                    </p>
                    <p class="card-text"> <b> Delivery Charges :</b>
                        <?php echo $row['delivery_charges'] ?>
                    </p>
                    <button class="btn btn-outline-secondary"
                        onclick="print()">Print
                    </button>
                    
                </div>
            </div>
        </div>

        <?php
        
        // Close connection
        $conn->close();
        ?>
    </div>
</section>
</main>
<?php require('footer.inc.php') ?>