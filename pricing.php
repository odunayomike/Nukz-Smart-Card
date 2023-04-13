<?php 
include("conn.php");
if(session_id() == ''){
    //session has not started
    session_start();
}

    $plan = $_SESSION['plan'];
    $sub_period = $_SESSION["sub_period"];

    $currentPage = 'pricing';
    echo $plan;
    
    if (isset($_SESSION['username'])){
        include("home-header.php");
        //echo $_SESSION["user_id"];
    }else{
        //header("Location: login.php/");
        include("header.php");
    }
    
?>
<style>
ul li {
    text-align: left;
    margin-left: -31px;
    font-size: 12px;
    line-height: 25px;
}
</style>

<div class="pricing-header">
    <p class="pricing-text">Pricing</p>
    <h2>Simple, transparent pricing</h2>
    <p style="padding: 10px 0">We believe Digital Me should be accessible to all companies, no matter the size.</p>
    <div class="month-year">
        <div class="month active-price">
            <button class="month-btn">Monthly Billing</button>
        </div>
        <div class="year">
            <button class="year-btn">Annual Billing</button>
        </div>
    </div>

    <!-- --------------- PLANS -------------------- -->
    <div class="normal-monthly-plan " style="display: flex; justify-content: space-around;     padding: 0 100px;">


        <div class="monthly-plans">
            <div class="plan">
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Free plan</p>
                    </div>
                    <?php
                    if($plan === 'free' && $sub_period === 'monthly'){
                    echo'<div class="popular">
                        <p>Current Plan</p>
                    </div>';?>
                    <?php
                    }
                    ?>


                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;0</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Free Features for users</p>
                    <a href="tools.php">
                        <button style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get started</button><br>
                    </a>
                    <a href="support.php">
                        <button>Talk to us</button>
                    </a>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>

                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>1,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>1</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>1 file/2MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>normal</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>1</b></li>

                    </ul>
                </div>

            </div>
        </div>


        <div class=" monthly-plans">
            <div class="plan">
                <?php
                $plan = "starter";
                $period = "monthly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Starter plan</p>
                    </div>
                    <?php
                    if($plan === 'starter' && $sub_period === 'monthly'){
                    echo'<div class="popular">
                        <p>Current Plan</p>
                    </div>';?>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;300</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Basic Features for users</p>
                    <form action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our free plan plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>10,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>5</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>5 files/8MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>5</b></li>

                    </ul>
                </div>

            </div>
        </div>

        <div class="monthly-plans">
            <div class="plan">
                <?php
                $plan = "business";
                $period = "monthly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Business plan</p>
                    </div>
                    <?php
                    if($plan === 'business' && $sub_period === 'monthly'){
                    echo'<div class="popular">
                        <p>Current Plan</p>
                    </div>';?>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;2500</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Main Features for users</p>
                    <form action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our Starter plan plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>150,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>All</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>8 files/15MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>300</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics <b>Advance</b></li>
                        <li><i class="bi bi-check-circle"></i> Daily analytics in email <b>Yes</b></li>


                    </ul>
                </div>

            </div>
        </div>

        <div class="monthly-plans ">
            <div class="plan">
                <?php
                $plan = "ultimal";
                $period = "monthly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Ultimal plan</p>
                    </div>
                    <?php
                    if($plan === 'ultimal' && $sub_period === 'monthly'){
                    echo'<div class="popular">
                        <p>Current Plan</p>
                    </div>';?>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;4500</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>per month</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Ultimate Features for users</p>
                    <form action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our Business plan
                        plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>Unlimited</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>All</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>10 files/20MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b> High priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>Unlimited</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics <b>Advance</b></li>
                        <li><i class="bi bi-check-circle"></i> Daily analytics in email <b>Yes</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics excel download <b>Yes</b></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>


    <!-- -----------------------YEARLY PLAN  ----------------------- -->

    <div class=" yearly-plan " style="display: none; justify-content: space-around;     padding: 0 100px;">


        <div class="monthly-plans">
            <div class="plan">
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Free plan</p>
                    </div>
                    <?php
                    if($plan === 'free' && $sub_period === 'yearly'){?>
                    <div class="popular">
                        <p>Current Plan</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;0</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>annualy</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Free Features for users</p>

                    <a href="tools.php">
                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </a>
                    <a href="support.php">
                        <button>Talk to us</button>
                    </a>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>

                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>1,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>1</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>1 file/2MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>normal</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>1</b></li>

                    </ul>
                </div>

            </div>
        </div>

        <div class="monthly-plans">
            <div class="plan">
                <?php
                $plan = "starter";
                $period = "yearly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Starter plan</p>
                    </div>
                    <?php
                    if($plan === 'starter' && $sub_period === 'yearly'){?>
                    <div class="popular">
                        <p>Current Plan</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;3000</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>annualy</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Basic Features for users</p>
                    <form id="paymentForm" action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our free plan plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>10,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>5</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>5 files/8MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>5</b></li>

                    </ul>
                </div>

            </div>
        </div>

        <div class="monthly-plans">
            <div class="plan">
                <?php
                $plan = "business";
                $period = "yearly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Business plan</p>
                    </div>
                    <?php
                    if($plan === 'business' && $sub_period === 'yearly'){?>
                    <div class="popular">
                        <p>Current Plan</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;25000</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>annualy</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Main Features for users</p>
                    <form id="paymentForm" action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our Starter plan plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>150,000</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>All</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>8 files/15MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b>priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>300</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics <b>Advance</b></li>
                        <li><i class="bi bi-check-circle"></i> Daily analytics in email <b>Yes</b></li>


                    </ul>
                </div>

            </div>
        </div>

        <div class="yearly-plans monthly-plans ">
            <div class="plan">
                <?php
                $plan = "ultimal";
                $period = "yearly";
                $url = "subscribe.php?plan=$plan&period=$period";
                ?>
                <div style="display: flex; justify-content: space-between; width: 260px;">
                    <div>
                        <p>Ultimal plan</p>
                    </div>
                    <?php
                    if($plan === 'ultimal' && $sub_period === 'yearly'){?>
                    <div class="popular">
                        <p>Current Plan</p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div style="display: flex;">
                    <div>
                        <h3>&#x20A6;45000</h3>
                    </div>
                    <div style="margin-top: 15px; font-size: 12px;">
                        <p>annualy</p>
                    </div>
                </div>
                <div class="plan-button">
                    <p style="text-align: left; font-size: 12px;">Ultimate Features for users</p>
                    <form id="paymentForm" action="<?php echo $url; ?>" method="POST">

                        <button type="submit" style="background: #ff8b3b; margin-bottom: 10px; color: #fff;">Get
                            started</button><br>
                    </form>
                    <button>Talk to us</button>
                </div>
                <div>
                    <p style="font-weight: 600; text-align: left; font-size: 12px; margin-top: 30px;">FEATURES</p>
                    <p style="font-size: 10px; text-align: left; margin-top: -10px;">Everything in our Business plan
                        plus
                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> Scans per month <b>Unlimited</b></li>
                        <li><i class="bi bi-check-circle"></i> Total tools accessible <b>All</b></li>
                        <li><i class="bi bi-check-circle"></i> Max upload size of a single file/pdf <b>10 files/20MB
                                each</b>
                        </li>
                        <li><i class="bi bi-check-circle"></i> 5 files/8MB each <b> High priority</b></li>
                        <li><i class="bi bi-check-circle"></i> Dynamic QR codes <b>Unlimited</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics <b>Advance</b></li>
                        <li><i class="bi bi-check-circle"></i> Daily analytics in email <b>Yes</b></li>
                        <li><i class="bi bi-check-circle"></i> Analytics excel download <b>Yes</b></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="js/main.js"></script>
<script src="js/support.js"></script>
</body>

</html>