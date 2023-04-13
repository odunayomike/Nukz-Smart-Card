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
    $currentPage = 'dashboard';
    
    if (isset($_SESSION['username'])){
        include("admin-header.php");
        //echo $_SESSION["user_id"];
    }
?>



<div class="user-content-body">
    <div class="user-sidebar">
        <div class="side-icon user-active" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
            <a href="index.php">
                <div style="margin-left: 10px;">
                    <p>Overview</p>
                </div>
            </a>
        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">

            <div class="V-card">
                <i class="bi bi-bar-chart-fill"></i>
            </div>
            <a class="active" href="analytics.php">
                <div style="margin-left: 10px;">
                    <p>Analytics</p>
                </div>
            </a>

        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">

            <div class="V-card">
                <i class="bi bi-question-lg"></i>
            </div>
            <div style="margin-left: 10px;">
                <p>Help</p>
            </div>


        </div>

        <div class="side-icon" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-gear-fill"></i>
            </div>
            <div style="margin-left: 10px;">
                <p>Settings</p>
            </div>
        </div>
    </div>

    <div style="width: 100%;">
        <div class="analytics-box">
            <div style="margin-left: -10px;" class="box1">
                <div class="top-head">
                    <p>Top Scans</p>
                </div>
                <table class="box">
                    <tr class="box-table-head">
                        <th style="padding: 17px;">Name</th>
                        <th>Scan</th>
                    </tr>

                    <?php
                    $highest_hit = "SELECT firstname, lastname, hit 
                            FROM card_details 
                            WHERE hit != 0
                            ORDER BY hit DESC 
                            LIMIT 5";

                    // Execute the SQL query and check for errors
                    $result = mysqli_query($db, $highest_hit);
                    if (!$result) {
                        die("Query failed with error message: " . mysqli_error($db));
                    }

                    // Loop through the results and display the user IDs and column values
                    while ($row = mysqli_fetch_assoc($result)) {
                     
                    ?>
                    <tr style="color: #686868; font-weight: 500;">
                        <td style=" padding: 15px 27px;"><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['hit']/2; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

            <div style="margin-left: 20px;" class="box1">
                <div class="top-head">
                    <p>Users with highest virtual card created</p>
                </div>
                <table class="box">
                    <tr class="box-table-head">
                        <th style="padding: 17px;">Name</th>
                        <th>Number of Cards Created</th>
                    </tr>

                    <?php
                        $highest_card = "SELECT u.username, t.user_id, COUNT(*) as row_count 
                            FROM card_details t 
                            JOIN user u ON t.user_id = u.user_id 
                            GROUP BY t.user_id 
                            ORDER BY row_count DESC 
                            LIMIT 5";

                    // Execute the SQL query and fetch the results
                    $result = mysqli_query($db, $highest_card);
                    if (!$result) {
                        die("Query failed with error message: " . mysqli_error($db));
                    }
                    $results = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    // Loop through the results and display the user IDs, usernames, and row counts
                    foreach ($results as $row) {
                        
                    ?>
                    <tr style="color: #686868; font-weight: 500;">
                        <td style=" padding: 15px 27px;"><?php echo $row['username']; ?></td>
                        <td><?php echo $row['row_count']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>





        <div style="margin-top: -70px;" class="analytics-box">
            <div style="margin-left: -10px;" class="box1">
                <div class="top-head">
                    <p>Active Users</p>
                </div>
                <table class="box">
                    <tr class="box-table-head">
                        <th style="padding: 17px;">Name</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $active_users = mysqli_query($db, "SELECT * from user WHERE status = 'active' LIMIT 5 ");
                    if(mysqli_num_rows($active_users)>0){
                        while($row = mysqli_fetch_assoc($active_users)){
                            $id = $row['user_id'];
                            $username = $row['username'];
                            $status = $row['status'];
                        
                    
                    
                    
                    ?>
                    <tr style="color: #686868; font-weight: 500;">
                        <td style=" padding: 15px 27px;"><?php echo $username; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>



            <div style="margin-left: 20px;" class="box1">
                <div class="top-head">
                    <p>Suspended Users</p>
                </div>
                <table class="box">
                    <tr class="box-table-head">
                        <th style="padding: 17px;">Username</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $active_users = mysqli_query($db, "SELECT * from user WHERE status = 'suspended' LIMIT 5 ");
                    if(mysqli_num_rows($active_users)>0){
                        while($row = mysqli_fetch_assoc($active_users)){
                            $id = $row['user_id'];
                            $username = $row['username'];
                            $status = $row['status'];
                        
                    
                    
                    
                    ?>
                    <tr style="color: #686868; font-weight: 500;">
                        <td style=" padding: 15px 27px;"><?php echo $username; ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>

                    <?php
                        }
                    }else{ ?>
                    <tr style="color: #686868; font-weight: 500;">
                        <td style=" text-align: center; padding: 15px 27px;"><?php echo "No Suspended User"; ?></td>
                    </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>

        </div>

    </div>




</div>
<?php
        include("footer.php");
    ?>
<script src="../js/main.js"></script>
</body>

</html>