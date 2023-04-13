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
    $currentPage = 'cardDetails';
    
    if (isset($_SESSION['username'])){
        include("user-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }
    
?>


<?php
$sql2 = mysqli_query($db, "SELECT * from card_details WHERE user_id = $user_id");
if(mysqli_num_rows($sql2)<=0){

echo "<div class='no-cards'> no cards created yet</div>";
}else{

?>

<style>
  .user-card{
    background: #FFFFFF;
    box-shadow: 0px 0px 13px rgba(0, 0, 0, 0.09);
    border-radius: 0px;
    padding: 15px;
    display: flex;
    justify-content: space-around;
    width: fit-content;
    border-radius: 10px;
    margin-top: 30px;
    margin-right: 25px;
    overflow: hidden;
    width: 350px !important;

  }
  .card-image img{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    padding-top: 16px;
  }
  .user-card-container{
    display: flex;
    flex: 0 0 200px; /* <aside> */
    flex: 1 0 auto;  /* <article> */ 
    flex-flow: wrap;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 20px;
    margin: 3vw;
  }
  .short-card-details p{
    text-align: center;
    padding-top: 16px;
    margin-left: 15px;
    margin-right: 15px;
    line-height: 17px;
  }
  .short-card-details button{
    margin-left: 15px;
    padding: 8px;
    color: #fff;
    background: #FF8B3B;
    border: none;
    border-radius: 6px;
    margin-top: 20px;
    font-size: 10px;
    
  }

  

</style>



<h2 class="card-header">Cards Created By <?php echo $_SESSION['username']; ?> </h2>





<div class="user-card-container">
<?php

$sql2 = mysqli_query($db, "SELECT * from card_details WHERE user_id = $user_id");
if(mysqli_num_rows($sql2)>0){

    while($row = mysqli_fetch_assoc($sql2)){

        $id = $row['card_id'];                           
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $date = $row['created_on'];
        $jobtitle = $row['jobtitle'];
        $phone = $row['phone'];

        

                                
?>
  <div class="user-card">

    <div class="card-image">
    <img style="padding: 0px;" src="uploads/<?=$row['images'] ?>" class="card__image" alt="" />
    </div>
    <div class="short-card-details">
      <p style="margin-top: 20px;"><?php echo $fname, ' ', $lname?></p>
      <p><?php echo $jobtitle; ?></p>
      <?php echo ' <a href="user-profile-details.php?id='.$id.'">' ?>
      <button>View Details</button>
      </a>
    </div>
  </div>
  <?php
            }
            }

?>
<?php
}
?>
  </div>

  
<?php
include('footer.php');

?>
  


