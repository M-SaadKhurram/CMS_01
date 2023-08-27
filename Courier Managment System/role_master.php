<?php 
  require('menu.inc.php');
  $sql = "SELECT * FROM `role`";
  $res = mysqli_query($conn,$sql);
?>
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Roles</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_dashboard.php">Admin</a></li>
          <li class="breadcrumb-item">Roles</li>          
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Roles</h5>
              <p>Add, Remove and Edit Role</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role ID</th>
                    <th scope="col">Role</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $srno = 1;
                    while($rows = mysqli_fetch_assoc($res)){
                      echo "<tr>";
                  ?>
                  <td><?php echo $srno; ?></td>
                  <td><?php echo $rows['role_id']; ?></td>
                  <td><?php echo $rows['role']; ?></td>

                  <?php
                      $srno++;
                      echo "</tr>"; 
                    }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
  <!-- End #main -->
  <?php require('footer.inc.php'); ?>