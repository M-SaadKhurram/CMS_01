<?php
require ('agent_menu.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script>
        function printCard(trackingNum) {
            var printContents = document.getElementById('card_' + trackingNum).innerHTML;
            var originalContents = document.body.innerHTML;

            var printWindow = window.open('', '_blank');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(printContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();

            printWindow.print();

            // Important: Close the print window after printing is done.
            printWindow.close();
        }
    </script>
</head>

<body>
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

                $sql = "SELECT * FROM bill";
                $result = $conn->query($sql);

                $noresult = true;

                while ($row = $result->fetch_assoc()) {
                    $noresult = false;
                    ?>
                <div class="col-md-4 mt-4">
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
                            <p class="card-text"> <b> Sender ID:</b>
                                <?php echo $row['sender_id'] ?>
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
                            <p class="card-text"> <b> Delivery Charges :</b>
                                <?php echo $row['delivery_charges'] ?>
                            </p>
                            <!-- <button class="btn btn-outline-secondary"
                                onclick="printCard(<?php# echo $row['tracking_num']; ?>)">Print
                            </button> -->
                            <a  class="btn btn-outline-secondary" href="<?php echo './agent_print_bill.php?bill_id='.$row['bill_id']; ?>" role="button"
                                >Print
                </a>
                        </div>
                    </div>
                </div>

                <?php
                }

                if ($noresult) {
                    echo '<div class="jumbotron my-4">
                    <h1 class="display-3">No Bill Found</h1>
                    <p class="lead">Make a Bill</p>
                    <hr class="my-2">
                </div>';
                }

                // Close connection
                $conn->close();
                ?>
            </div>
        </section>
    </main>

    <!-- Include other scripts and footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.min.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
<?php
require('footer.inc.php');
?>
</body>

</html>
