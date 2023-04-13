<?php
include('conn.php');
$userId = $_REQUEST['userId'];


$sql2 = "SELECT * from card_details WHERE user_id = $userId ";
    if ($result2 = mysqli_query($db, $sql2)){
        $rowcount2 = mysqli_num_rows($result2);
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
                    <p>Total Virtual Cards &nbsp; <b><?php echo $rowcount2; ?></b></p>
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
                <h3>Total Virtual Cards (All)</h3>
            </div>


        </div>

        <div style="overflow-x: auto;">
            <table id="customers">
                <tr>
                    <th style="width: 20px !important">
                        <input type="checkbox" />
                    </th>
                    <th style="width: 250px">Name</th>
                    <th style="width: 250px">Date</th>
                    <th style="width: 350px">Email</th>
                    <th style="width: 200px">Scan</th>
                    <th style="width: 200px">Phone</th>

                    <th>Action</th>
                </tr>
                <?php
                    
                    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;

                    // Define the number of items per page
                    $itemsPerPage = 5;

                    // Calculate the offset based on the current page number and items per page
                    $offset = ($page - 1) * $itemsPerPage;

                    
                    

                    $sql2 = mysqli_query($db, "SELECT * from card_details WHERE user_id = $userId   LIMIT $itemsPerPage OFFSET $offset");
                    if(mysqli_num_rows($sql2)>0){

                    while($row = mysqli_fetch_assoc($sql2)){
                        
                

                        $id = $row['card_id'];                           
                        $fname = $row['firstname'];
                        $lname = $row['lastname'];
                        // $lname = $row['lastname'];
                        $date = $row['created_on'];
                        // $jobtitle = $row['jobtitle'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $hit = $row['hit'];
                        // $hit = $row['hit'];
                        

                        
                    ?>
                <tr>
                    <td><input type="checkbox" </td>
                    <td><?php echo $fname .' '. $lname ; ?></td>
                    <td><?php echo $date?></td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <?php echo $hit/2; ?>
                    </td>

                    <td>
                        <?php echo $phone; ?>

                    </td>
                    <td>
                        <?php echo ' <a href="card-details.php?id='.$id.'">'?>
                        <button>view more</button>
                        </a>
                    </td>
                </tr>
                <?php
                        
                }
            }else{
                    echo " no virtual cards created yet!";
                }
            ?>
            </table>


        </div>
        <?php
        $sql2 = "SELECT * from card_details WHERE user_id = $userId ";
        $sql2_result = mysqli_query($db, $sql2);
        $numRows = mysqli_num_rows($sql2_result);
        $numPages = ceil($numRows / $itemsPerPage);
        
        ?>
        <ul class="pagination">
            <?php for ($i = 1; $i <= $numPages; $i++) : ?>
            <?php if ($i == $page) : ?>
            <li class="active"><a href="#" class="pagination-link" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
            <?php else : ?>
            <li><a href="#" class="pagination-link" data-page="<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endif; ?>
            <?php endfor; ?>
        </ul>

    </div>
</div>