<?php 
  require('menu.inc.php');
  $sql = "SELECT * FROM `shippeditem`";
  $res = mysqli_query($conn,$sql);
?>
<main id="main" class="main">
    

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Courier Details</h5>

              <div class="table-responsive">
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>S.no</th>
                    <th>Courier ID</th>
                    <th>Weight</th>
                    <th>Dimension</th>
                    <th>Insurance Amount</th>
                    <th>Destination</th>
                    <th>Final Delivery Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $srno = 1;
                    
                    // Your PHP code for database retrieval and table rows
                    while($row = mysqli_fetch_assoc($res)){
                      echo "<tr>";                        
                      
                        echo "<td> $srno </td>";
                        echo '<td>' . $row['courier_id'] . '</td>';
                        echo '<td>' . $row['weight'] . '</td>';
                        echo '<td>' . $row['dimension'] . '</td>';
                        echo '<td>' . $row['insuranceamount'] . '</td>';
                        echo '<td>' . $row['destination'] . '</td>';
                        echo '<td>' . $row['finaldeliverydate'] . '</td>';
                        echo '</tr>';
                        $srno++;
                    }
                    ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->
  <?php require('footer.inc.php'); ?>