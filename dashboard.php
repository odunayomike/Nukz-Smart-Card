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


$user_id = $_SESSION['user_id'];
//include("login-handler.php");
    $currentPage = 'dashboard';
    
    if (isset($_SESSION['username'])){
        include("home-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }


    $sql2 = "SELECT * from card_details WHERE user_id = $user_id";
    if ($result2 = mysqli_query($db, $sql2)){
        $rowcount2 = mysqli_num_rows($result2);
    }
    
?>

<div class="user-content-body">
    <div class="user-sidebar">
        <div class="side-icon user-active" style="text-align: center; display: flex; margin-bottom: 10px">
            <div class="V-card">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
            <div style="margin-left: 10px;">
                <p>Overview</p>
            </div>
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
                        <p>Virtual Cards &nbsp; <b><?php echo $rowcount2; ?></b></p>
                    </div>
                </div>
                <div class="select-btn">
                    <div class="virtual-card">
                        <p>Total QR Code <b>N/A</b></p>
                    </div>
                </div>
                <div class="search-button">
                    <div class="virtual-card">
                        <p>Profile Scan <b>N/A</b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-list">
            <div style="display: flex; justify-content: space-between">
                <div>
                    <h3>Virtual Cards Created (All)</h3>
                </div>


            </div>

            <div style="overflow-x: auto;">
                <table id="customers">
                    <tr>
                        <th style="width: 20px !important">
                            <input type="checkbox" />
                        </th>
                        <th style="width: 200px">Date</th>
                        <th style="width: 300px">Name</th>
                        <th style="width: 250px">Email</th>
                        <th style="width: 200px">Job Tiltle</th>
                        <th style="width: 200px">Profile Scan</th>

                        <th>info</th>
                    </tr>
                    <?php
                    
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    $num_per_page = 05;
                    $start_from = ($page-1)*05;
                    
                    

                    $sql2 = mysqli_query($db, "SELECT * from card_details  WHERE user_id = $user_id LIMIT $start_from, $num_per_page ");
                    if(mysqli_num_rows($sql2)>0){

                    while($row = mysqli_fetch_assoc($sql2)){
                        
                

                        $id = $row['card_id'];                           
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        $date = $row['created_on'];
                        $jobtitle = $row['jobtitle'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $date = $row['created_on'];
                        $hit = $row['hit'];
                        
                                            
                    ?>
                    <tr>
                        <td><input type="checkbox" </td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $fname, ' ', $lname?></td>
                        <td>
                            <p><?php echo $email; ?>
                        </td>
                        <td>
                            <p><?php echo $jobtitle; ?>
                        </td>
                        <td>
                            <p><?php echo $hit / 2; ?>
                        </td>
                        <td><?php echo ' <a href="user-profile-details.php?id='.$id.'">' ?><button
                                style="background: #ff8b3b;">View
                                more</button></a></td>
                    </tr>
                    <?php
                        
                }
            }
            ?>
                </table>


            </div>
            <?php
                    $pr_query = "SELECT * from card_details WHERE user_id = $user_id";
                    $pr_result = mysqli_query($db, $pr_query);
                    $total_record = mysqli_num_rows($pr_result);
                    
                    $total_page = ceil($total_record/$num_per_page);
                    
                    
                    for($i=1; $i<$total_page; $i++){
                        
                    }
                ?>



            <div class="pagination">
                <?php
                    if($page>1){
                        echo "<a href='dashboard.php?page=".($page-1)."'>❮</a>"?>
                <?php
                    }
                    ?>


                <?php 
                    if($i>$page)
                    {
                    
                    echo "<a href='dashboard.php?page=".($page+1)."'>❯</a>"?>
                <?php
                    }
                    ?>
            </div>

        </div>
    </div>



</div>


<?php
        include("footer.php");
    ?>
<script src="js/main.js"></script>
</body>

</html>