<?php 
require('menu.inc.php');
$sql = "SELECT * FROM `users`";

// Check if role filter is set
if(isset($_GET['role_filter']) && $_GET['role_filter'] != '') {
    $roleFilter = intval($_GET['role_filter']);
    $sql .= " WHERE role_id = $roleFilter";
}

$res = mysqli_query($conn, $sql);
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Details</h5>
        
                        <!-- Role filter form -->
                        <form method="get" action="">
                            <label for="role_filter">Filter by Role:</label>
                            <select name="role_filter" id="role_filter" class="form-select border-dark">
                                <option value="">All Roles</option>
                                <option value="1">Admin</option>
                                <option value="2">Agent</option>
                                <option value="3">User</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Apply Filter</button>
                            <br>
                            <br>
                        </form>
                        <div class="table-responsive">

                        <!-- Table with stripped rows -->
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>User ID</th>
                                    <th> Name</th>
                                    <th>Email</th>
                                    <th>Role ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $srno = 1;

                                // Your PHP code for database retrieval and table rows
                                while($row = mysqli_fetch_assoc($res)){
                                    echo "<tr>";                        
                                    echo "<td> $srno </td>";
                                    echo '<td>' . $row['user_id'] . '</td>';
                                    echo '<td>' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . '</td>';
                                    echo '<td>' . $row['email'] . '</td>';
                                    echo '<td>' . $row['role_id'] . '</td>';
                                    echo '</tr>';
                                    $srno++;
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
</main>
<!-- End #main -->
<?php require('footer.inc.php'); ?>
