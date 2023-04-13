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

$user_id = $_SESSION['user_id'];
//include("login-handler.php");
    $currentPage = 'complaint';
    
    if (isset($_SESSION['username'])){
        include("admin-header.php");
        //echo $_SESSION["user_id"];
    }


    $sql2 = "SELECT * from complaints ";
    if ($result2 = mysqli_query($db, $sql2)){
        $rowcount2 = mysqli_num_rows($result2);
    }

    $sql4 = "SELECT * from complaints WHERE status = 'pending' ";
    if ($result4 = mysqli_query($db, $sql4)){
        $rowcount4 = mysqli_num_rows($result4);
    }

    $sql5 = "SELECT * from complaints WHERE status = 'sorted' ";
    if ($result5 = mysqli_query($db, $sql5)){
        $rowcount5 = mysqli_num_rows($result5);
    }

    
?>
<?php
// Check if the button has been clicked
if(isset($_POST['sorted'])) {

    // Retrieve the ID of the row to update
    $id = $_POST['id'];

    $check = mysqli_query($db,"SELECT status from complaints WHERE id = $id");
     if (mysqli_num_rows($check)>0){
            while($statusrow = mysqli_fetch_assoc($check)){

                $status = $statusrow['status'];

                if($status == 'pending'){

                

                // Display a confirmation dialog box
                echo '<script>
                        if(confirm("Are you sure you want to update the status?")) {
                            // Update the row status from "pending" to "sorted"
                            var xhr = new XMLHttpRequest();
                            xhr.open("POST", "update_status.php", true);
                            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhr.onreadystatechange = function() {
                                if(xhr.readyState === 4 && xhr.status === 200) {
                                    alert(xhr.responseText);
                                    location.reload();
                                }
                            }
                            xhr.send("id='.$id.'");
                        }
                    </script>';

                    }else{
                        echo '<script>alert("Complaint Status Already Updated!");</script>';
                    }
            }
        }

}

?>




<div class="main-user-content">
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
                    <p>Total Complaint &nbsp; <b><?php echo $rowcount2; ?></b></p>
                </div>
            </div>
            <div class="select-btn">
                <div class="virtual-card">
                    <p>Pending Complaint &nbsp; <b><?php echo $rowcount4; ?></b></p>
                </div>
            </div>
            <div class="search-button">
                <div class="virtual-card">
                    <p>Sorted Complaint &nbsp; <b><?php echo $rowcount5; ?></b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-list">
        <div style="display: flex; justify-content: space-between">
            <div>
                <h3>Total Complaint (All)</h3>
            </div>


        </div>

        <div style="overflow-x: auto;">
            <table id="customers">
                <tr>
                    <th style="width: 20px !important">
                        <input type="checkbox" />
                    </th>
                    <th style="width: 150px">Date</th>
                    <th style="width: 150px">Username</th>
                    <th style="width: 150px">Ticket</th>
                    <th style="width: 300px">Complaint</th>
                    <th style="width: 200px">Email</th>
                    <th style="width: 200px">Status</th>
                    <th>Completed</th>
                </tr>
                <?php
                    
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 05;
                    $start_from = ($page-1)*05;
                      $sql9 = mysqli_query($db, "SELECT * from user ");
                        if (mysqli_num_rows($sql9)>0){
                         while($row2 = mysqli_fetch_assoc($sql9)){

                        $id = $row2['user_id']; 
                        $cUsaername =$row2['username']; 
                         

                    $sql2 = mysqli_query($db, "SELECT *, DATE(created_at) AS date_only from complaints WHERE user_id = $id ORDER BY created_at DESC    LIMIT $start_from, $num_per_page ");
                    if(mysqli_num_rows($sql2)>0){
                    
                       

                    while($row = mysqli_fetch_assoc($sql2)){

                         
                         

                        $id = $row['user_id'];                           
                        $username = $row['username'];
                        $ticket = $row['complaint_ticket'];
                        $message = $row['complaint'];
                        $date = $row['date_only'];
                        $status = $row['status'];
                        // $phone = $row['phone'];
                        $email = $row['email'];
                        // $date = $row['created_on'];
                        // $hit = $row['hit'];
                        
                        
                       
                    ?>


                <tr>
                    <td><input type="checkbox" </td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $username?></td>
                    <td style="text-transform: inherit;">
                        <?php echo $ticket; ?>
                    </td>
                    <td>
                        <?php echo $message; ?>
                    </td>
                    <td>
                        <?php echo $email?>
                    </td>


                    <td style="text-transform: uppercase;"
                        class="<?php if($status =='pending'){echo 'pending';}else{echo 'sorted';}?>">
                        <?php echo $status?>
                    </td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input
                                class="<?php if($status =='pending'){echo 'status-pending';}else{echo 'status-sorted';}?>"
                                style=" font-weight: 600; border-radius: 5px; padding: 10px 15px; border: none; "
                                type="submit"
                                value="<?php if($status =='pending'){echo 'mark as sorted';}else{echo 'completed';}?>"
                                name="sorted">
                        </form>
                    </td>
                </tr>
                <?php
                    }
                }
                }
            }

            
            ?>
            </table>


        </div>
        <?php
                    $pr_query = "SELECT * from complaints ";
                    $pr_result = mysqli_query($db, $pr_query);
                    $total_record = mysqli_num_rows($pr_result);
                    
                    $total_page = ceil($total_record/$num_per_page);
                    
                    
                    for($i=1; $i<$total_page; $i++){
                        
                    }
                ?>



        <div class="pagination">
            <?php
                    if($page>1){
                        echo "<a href='complaint.php?page=".($page-1)."'>❮</a>"?>
            <?php
                    }
                    ?>


            <?php 
                    if($i>$page)
                    {
                    
                    echo "<a href='complaint.php?page=".($page+1)."'>❯</a>"?>
            <?php
                    }
                    ?>
        </div>

    </div>
</div>






<?php
        include("footer.php");
    ?>
<script src="../js/main.js"></script>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
</body>

</html>