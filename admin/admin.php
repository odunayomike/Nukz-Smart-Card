<?php 
    include("conn.php");
   
    if(session_id() == ''){
        //session has not started
        session_start();
    }

    if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
    }
    if ($_SESSION['user_type'] == 'user') {
    echo "you are not authorised to access this page";

    exit;
    }

    if ($_SESSION['status'] == 'suspended') {
    echo '<script>alert("Your admin access have been suspended");</script>';

    exit;
    }

      $errors = array(); 

    $user_id = $_SESSION['user_id'];
    //include("login-handler.php");
    $currentPage = 'admin';
    
    if (isset($_SESSION['username'])){
        include("admin-header.php");
        //echo $_SESSION["user_id"];
    }

    $sql2 = "SELECT * from nadmin WHERE admin_type = 1 ";
    if ($result2 = mysqli_query($db, $sql2)){
        $rowcount2 = mysqli_num_rows($result2);
    }

?>
<?php
// Check if the button has been clicked
if(isset($_POST['suspend'])) {

    // Retrieve the ID of the row to update
    $id = $_POST['admin_id'];

    
                

                // Display a confirmation dialog box
                echo '<script>
                        if(confirm("Are you sure you want to update the status this Admin user?")) {
                            // Update the row status from "active" to "suspend"
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "update_status.php", true);
                            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if(xhr.readyState === 4 && xhr.status === 200) {
                                    alert(xhr.responseText);
                                    location.reload();
                                }
                            }
                            xhr.send("admin_id='.$id.'");
                        }
                    </script>';

                    
      
}

if(isset($_POST['delete'])) {

    // Retrieve the ID of the row to update
    $id = $_POST['admin_id_delete'];

    
                

                // Display a confirmation dialog box
                echo '<script>
                        if(confirm("Are you sure you want to delete this Admin user?")) {
                            
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "update_status.php", true);
                            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if(xhr.readyState === 4 && xhr.status === 200) {
                                    alert(xhr.responseText);
                                    location.reload();
                                }
                            }
                            xhr.send("admin_id_delete='.$id.'");
                        }
                    </script>';

                    
      
}

?>


<div style="overflow: auto; opacity: 1;" class="main-user-content">
    <h3>Overview</h3>
    <div class="main-user-body-header">
        <!-- <span>What are you looking for?</span> -->
        <div style="
              margin-top: 20px;
              justify-content: space-around;
              display: flex;
            ">
            <div class="search">
                <div class="virtual-card">
                    <p>Total Active Users &nbsp; <b><?php echo $rowcount2; ?></b></p>
                </div>
            </div>
            <!-- <div class="select-btn">
                <div class="virtual-card">
                    <p>Total Virtual Card <b></b></p>
                </div>
            </div> -->
            <div class="search-button">
                <div class="virtual-card">
                    <button class="create-admin">Create Admin</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content-list">
        <div style="display: flex; justify-content: space-between">
            <div>
                <h3>Total Admin Users (All)</h3>
            </div>


        </div>

        <div style="overflow-x: auto;">
            <table id="customers">
                <tr>
                    <th style="width: 20px !important">
                        <input type="checkbox" />
                    </th>
                    <th style="width: 250px">Date</th>
                    <th style="width: 250px">Username</th>
                    <th style="width: 350px">Email</th>
                    <th style="width: 200px">Action</th>
                    <th style="width: 200px">Delete</th>

                    <th>Status</th>
                </tr>
                <?php
                    
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 05;
                    $start_from = ($page-1)*05;
                    
                    

                    $sql2 = mysqli_query($db, "SELECT * from nadmin WHERE admin_type = 1   LIMIT $start_from, $num_per_page ");
                    if(mysqli_num_rows($sql2)>0){

                    while($row = mysqli_fetch_assoc($sql2)){
                        
                

                        // $id = $row['admin_id'];                           
                        $username = $row['username'];
                        // $lname = $row['lastname'];
                        $date = $row['created_at'];
                        // $jobtitle = $row['jobtitle'];
                        // $phone = $row['phone'];
                        $email = $row['email'];
                        $status = $row['status'];
                        // $hit = $row['hit'];
                        

                        
                    ?>
                <tr>
                    <td><input type="checkbox" </td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $username?></td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
                            <input class="<?php if($status =='active'){echo 'Suspend';}else{echo 'activate';}?>"
                                style="background-color: grey; font-weight: 600; border-radius: 5px; padding: 10px 15px; border: none; color: #fff;"
                                type="submit"
                                value="<?php if($status =='active'){echo 'Suspend';}else{echo 'Activate';}?>"
                                name="suspend">
                        </form>
                    </td>

                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="admin_id_delete" value="<?php echo $row['admin_id']; ?>">
                            <input
                                style="background-color: red; font-weight: 600; border-radius: 5px; padding: 10px 15px; border: none; color: #fff;"
                                type="submit" value="Delete" name="delete">
                        </form>
                    </td>
                    <td class="<?php if($status =='active'){echo 'activated';}else{echo 'suspended';}?>"
                        style="text-transform: uppercase;">
                        <?php if($status =='active'){echo 'Active';}else{echo 'Suspended';}?></td>
                </tr>
                <?php
                        
                }
            }
            ?>
            </table>


        </div>
        <?php
                    $pr_query = "SELECT * from nadmin ";
                    $pr_result = mysqli_query($db, $pr_query);
                    $total_record = mysqli_num_rows($pr_result);
                    
                    $total_page = ceil($total_record/$num_per_page);
                    
                    
                    for($i=1; $i<$total_page; $i++){
                        
                    }
                ?>



        <div class="pagination">
            <?php
                    if($page>1){
                        echo "<a href='admin.php?page=".($page-1)."'>❮</a>"?>
            <?php
                    }
                    ?>


            <?php 
                    if($i>$page)
                    {
                    
                    echo "<a href='admin.php?page=".($page+1)."'>❯</a>"?>
            <?php
                    }
                    ?>
        </div>

    </div>
</div>

<div style="display: none;" class="create-admin-modal">

    <div class="container1">
        <div style="display: flex; justify-content: space-between;" class="login">
            <div>
                <h2>Create Admin</h2>
            </div>
            <div class="cancel-create-admin">
                <i style="font-size: 24px; cursor: pointer;" class="bi bi-x-circle"></i>
            </div>

        </div>
        <div class="form-content1">
            <form id="prospects_form" action="admin-register-handler.php" method="POST">
                <?php  include('errors.php');  ?>
                <div style="display: flex;">

                    <div>

                        <input type="text" name="username" value="" placeholder="Username">
                        <input type="text" name="firstname" value="" placeholder="Firstname">
                        <input type="text" name="lastname" value="" placeholder="Lastname">
                    </div>

                    <div>
                        <input type="email" name="email" value="" placeholder="Email">
                        <input type="password" name="password_1" placeholder="Password">
                        <input type="password" name="password_2" placeholder="Confirm Password">
                    </div>


                </div>
                <div style="width: 50%; text-align: center;">
                    <input style="width: 100%;" type="submit" name="reg_user" value="Create Admin Account">
                </div>

            </form>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/main.js"></script>
<script src="js/admin.js"></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>


</body>

</html>


<?php include "footer.php"; ?>