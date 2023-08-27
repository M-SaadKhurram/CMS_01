<?php
require('menu.inc.php');

$msg = ''; // Initialize the message variable

if (isset($_POST['save'])) {
    $trackingNumber = get_safe_value($conn, $_POST['tracking_number']);
    $status = get_safe_value($conn, $_POST['status']);

    // Update the status in the database based on tracking number
    $update_sql = "UPDATE `bill` SET `status` = '$status' WHERE `tracking_num` = '$trackingNumber'";

    if (mysqli_query($conn, $update_sql)) {
        $msg = '
            <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>Status updated successfully</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
}
?>
<main id="main" class="main">
    <div class="pagetitle">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Tracking</h5>
                        <!-- Browser Default Validation -->
                        <form class="row g-3" method="post">
                            <div class="col-md-6">
                                <label for="cityName" class="form-label" name="tracking_number">Tracking Number </label>
                                <input type="text" class="form-control" id="" name="tracking_number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="cityName" class="form-label">Delivery Status</label>
                                <select name="status" id="deliveryStatus" class="form-control form-control-sm">
                                    <option value="Packaging">Packaging</option>
                                    <option value="On the way">On The Way</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" name="save">Save</button>
                            </div>
                        </form>
                        <!-- End Browser Default Validation -->
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <?php echo $msg; ?>
            </div>
        </div>
    </section>
</main>
<?php require('footer.inc.php') ?>