<?php 
session_start();
include('conn.php');
$plan = isset($_GET['plan']) ? $_GET['plan'] : 'starter';
$period = isset($_GET['period']) ? $_GET['period'] : 'monthly';

$url = "subscribe.php?plan=$plan&period=$period";

$user_id = $_SESSION['user_id'];
$sql_query = "SELECT * from user where user_id = $user_id";
    $result = mysqli_query($db, $sql_query);
    
    if(mysqli_num_rows($result) > 0 ){
    
        $row = mysqli_fetch_assoc($result);
        $user_id =  $row['user_id'];
        $user_email = $row['email'];
        $username = $row['username'];

    }


$sql2 = "SELECT api from api";
$result2 = mysqli_query($db, $sql2);
if(mysqli_num_rows($result2) > 0 ){
    
        $row = mysqli_fetch_assoc($result2);
        $api =  $row['api'];
        

    }
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="./cropperjs/cropper.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

    <title>Subscribe</title>

</head>

<body>


    <?php 
    if($plan === 'starter' && $period === 'monthly'){
        $price = 300;
        $future_date = date('F j, Y', strtotime('+30 days'));
    }elseif($plan === 'business' && $period === 'monthly'){
        $price = 2500;
        $future_date = date('F j, Y', strtotime('+30 days'));
    }elseif($plan === 'ultimal' && $period === 'monthly'){
        $price = 4500;
        $future_date = date('F j, Y', strtotime('+30 days'));
    }elseif($plan === 'starter' && $period === 'yearly'){
        $price = 3000;
        $future_date = date('F j, Y', strtotime('+365 days'));
    }elseif($plan === 'business' && $period === 'yearly'){
        $price = 25000;
        $future_date = date('F j, Y', strtotime('+365 days'));
    }elseif($plan === 'ultimal' && $period === 'yearly'){
        $price = 45000;
        $future_date = date('F j, y', strtotime('+365 days'));
    }
    ?>
    <div class="payment-container">
        <div class="payment">
            <h2>Complete Payment</h2>
            <p><b>Subscription Plan:</b> <?php echo $plan; ?></h4>
            <p><b>Subscription Period:</b> <?php echo date('F j, Y'), '  ', '<b>to</b>', '  ', $future_date; ?></h4>
            <p><b>Amount:</b> <?php echo '&#x20A6;',$price; ?></h4>

            <form id="paymentForm">
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <button type="button" onclick="payWithPaystack()"> Pay </button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    var price = "<?php echo $price; ?>"
    var email = "<?php echo $user_email; ?>"
    var username = "<?php echo $username; ?>"
    var plan = "<?php echo $plan; ?>"
    var period = "<?php echo $period; ?>"
    var api = "<?php echo $api ?>"
    const testapi = 'pk_test_154bd8cc9edc496218ad7cd1bd8c511c411891a6';
    console.log(api);

    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack() {
        var handler = PaystackPop.setup({
            key: api,
            email: email,
            amount: price * 100,
            currency: "NGN",
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Generate a random reference number
            callback: function(response) {
                var reference = response.reference;
                var xhr = new XMLHttpRequest();
                var url = "./success.php";
                xhr.open("POST", url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var data = "plan=" + plan + "&period=" + period + "&reference=" + reference + "&response=" +
                    response;
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        window.location.href = "success.php?reference=" + reference + "&plan=" + plan +
                            "&period=" +
                            period;

                    }
                };
                xhr.send(data);
                console.log(data);
            },
            onClose: function() {
                alert('Transaction was not completed, window closed.');
            }
        });
        handler.openIframe();
    }
    </script>



</body>

</html>