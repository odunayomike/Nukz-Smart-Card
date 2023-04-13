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


<style>
    input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    }


    .form-segment{
        display: flex;
        justify-content: space-between;
    }
    .form-segment input{
        width: 100%;
    }
    .name{
        width: 100% !important;
    }
</style>


<div class="card-view-container">
    <div class="card-view-head">
        <h2>Odesanya Temitope</h2>
    </div>
    <div class="card-view-form">
        <form class="card-details" action="">
            
                
                    <input class="name" type="text" name="firstname" id="" value="Odesanya" >
                    <input  class="name" type="text" name="firstname" id="" value="Temitope" ><br>
                
           
                    <input type="text" name="firstname" id="" value="tope@nukreationz.com" >
                    <input type="text" name="firstname" id="" value="Developer" ><br>
        
         
            <input type="text" name="firstname" id="" value="Lagos Nigeria" ><br>
            <input type="text" name="firstname" id="" value="Nukreationz Digital" >
            <textarea  name="" id="" cols="30" rows="10"></textarea>
            <input class="name" type="text" name="firstname" id="" value="Odesanya" >
                    <input  class="name" type="text" name="firstname" id="" value="Temitope" ><br>
                
           
                    <input type="text" name="firstname" id="" value="tope@nukreationz.com" >
                    <input type="text" name="firstname" id="" value="Developer" ><br>
        </form>
    </div>

</div>