<?php
require('menu.inc.php');

// Initialize variables for form input
$center_name = '';
$center_address = '';
$city_id = '';
$user_id = '';
$msg='';
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $center_name = $_POST['center_name'];
    $center_address = $_POST['center_address'];
    $city_id = $_POST['city_id'];
    $user_id = $_POST['user_id'];

    // Insert data into the database
    $insertQuery = "INSERT INTO retailcenter (center_name, city_id, user_id, center_address) 
                    VALUES ('$center_name', '$city_id', '$user_id', '$center_address')";
    
    if ($conn->query($insertQuery) === TRUE) {
        $msg = '
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>New record created successfully</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`';            
        }    
    } else {
        echo "Error adding center: " . $conn->error;
      }
      

// Fetch cities and users from the database for dropdowns
$cityQuery = "SELECT city_id, city FROM cities";
$cityResult = $conn->query($cityQuery);

$userQuery = "SELECT user_id, firstname, lastname FROM users";
$userResult = $conn->query($userQuery);
// require('center_master.php');
?>

<main id="main" class="main  ">

   
    <section class="section ">
      <div class="row justify-content-center align-items-center ">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add New Retail Center</h5>

              <!-- General Form Elements -->
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <div class="row mb-3">
                  <label for="center_name" class="col-sm-2 col-form-label">Center Name</label>
                  <div class="col-sm-10">
                    <input name="center_name" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="center_address" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input name="center_address" type="text" class="form-control" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="city_id">city_id</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="city_id" name="city_id" required>
                            <?php
                            while ($cityRow = $cityResult->fetch_assoc()) {
                                echo "<option value='{$cityRow['city_id']}'>{$cityRow['city']}</option>";
                            }
                            ?>
                        </select>
                        </div>
                  </div>
                <div class="row mb-3">
                  <label for="user_id" class="col-sm-2 col-form-label">User</label>
                  <div class="col-sm-10">
                    <select class="form-select" id="user_id" name="user_id" required>
                        <?php
                        while ($userRow = $userResult->fetch_assoc()) {
                            echo "<option value='{$userRow['user_id']}'>{$userRow['firstname']} {$userRow['lastname']}</option>";
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Center</button>
                </div>
                

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      
      </div>
    </section>

  </main><!-- End #main -->
  <?php
$sql = "SELECT * FROM `retailcenter`";
$res = mysqli_query($conn, $sql);


  
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Retail Centers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="admin_dashboard.php">Admin</a></li>
                <li class="breadcrumb-item">Retail Centers</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col">
                                <h5 class="card-title">Retail Centers</h5>
                                <p>Add, Remove and Edit Retail Center</p>
                            </div>
                            <div class="col text-end">
                                <a href="center.php" type="button" class="btn btn-sm btn-primary mt-3">+ Add Retail Center</a>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Retail Center ID</th>
                                    <th scope="col">Retail Center Name</th>
                                    <th scope="col">city_id </th>
                                    <th scope="col">user_id </th>
                                    <th scope="col">Address</th>
                                    <!-- <th scope="col">Actions</th> -->
                                </tr>
                                
                            </thead>
                            <tbody>
                                <?php
                                $srno = 1;
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    echo "<tr>";
                                ?>
                                    <td><?php echo $srno; ?></td>
                                    <td><?php echo $rows['center_id']; ?></td>
                                    <td><?php echo $rows['center_name']; ?></td>
                                    <td><?php echo $rows['city_id']; ?></td>
                                    <td><?php echo $rows['user_id']; ?></td>
                                    
                                    <td><?php echo $rows['center_address']; ?></td>
                                   
                                <?php
                                    $srno++;
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>

                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    
</main><!-- End #main -->
<?php 
require('footer.inc.php');?>
</body>

</html>