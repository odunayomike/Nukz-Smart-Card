<?php
    if(!isset($_SESSION)) 
        { 
            session_start(); 

        } 
        if (!isset($_SESSION['loggedin'])) {
            header('Location: login.php');
            exit;
        }
        $currentPage = 'support';

        include("home-header.php");

        if (!isset($_SESSION['username'])) {
            $_SESSION['msg'] = "You must log in first";
            header('location: login.php');
        }
        $username = $_SESSION['username'];

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $complaintTicket = '';
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $complaintTicket .= $characters[$index];
        }
        $complaintTicket = strtoupper($complaintTicket);

        $sql_query = "SELECT user_id from user where username like '$username'";
            $result = mysqli_query($db, $sql_query);
            
            if(mysqli_num_rows($result) > 0 ){
            
                $row = mysqli_fetch_assoc($result);
                $user_id =  $row['user_id'];
            }
            if(isset($_POST['send_msg'])){
                $message = mysqli_real_escape_string($db, $_POST['complaint']);
            $email = mysqli_real_escape_string($db, $_POST['email']);

            $query = "INSERT INTO complaints (user_id, complaint, complaint_ticket, email, status, username) VALUES('$user_id', '$message', '$complaintTicket', '$email', 'pending', '$username')";

            mysqli_query($db, $query);

            echo '<script>alert("Message sent successfully!");</script>';
            }
            
    
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/support.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>FAQ</title>
</head>

<body>
    <div class="header">
        <img src="img/Group 38.svg" alt="">
        <div class="header-text">
            <h2>FAQ</h2>
            <p>How can we help you?</p>
        </div>
    </div>

    <div class="faq-section">
        <div class="questions">
            <div class="question1 question">
                <div>
                    <p>What is a Nukreationz Digital NFC business card? </p>
                </div>

                <i class="bi bi-plus-circle btn-1 faq-btn"></i>
            </div>
            <div class="answer1 answer ">
                <p>Nukreationz Digital NFC business cards are the latest trend in business cards. They are
                    designed to make exchanging contact information more efficient and effective. With a
                    tap of a smartphone, you can easily share your contact information with potential clients,
                    partners, and colleagues. These digital cards come with features like QR codes, NFC tags,
                    and unique designs that make them stand out from traditional paper business cards.
                    They also allow you to store extra information like websites, social media links,
                    and even videos. Nukreationz Digital NFC business cards
                    provide an innovative way to network and promote your brand in the digital age.</p>
            </div>

            <div class="question2 question">
                <div>
                    <p>How does the Nukreationz Digital NFC business card work?</p>
                </div>

                <i class="bi bi-plus-circle btn-2 faq-btn"></i>
            </div>
            <div class="answer2 answer ">
                <p>Nukreationz Digital NFC business cards allow you to store and share your contact information in a
                    more convenient way. With these cards, you can easily exchange contact information with other people
                    without having to manually type or copy-paste the details. The card is embedded with an NFC chip
                    that allows it to store your contact details and be scanned by other NFC enabled devices. This makes
                    it easier for people to connect with each other, as all they need is a single tap on their device.
                </p>
            </div>

            <div class="question3 question">
                <div>
                    <p>What kind of contact information can be stored on the card?</p>
                </div>

                <i class="bi bi-plus-circle btn-3 faq-btn"></i>
            </div>
            <div class="answer3 answer ">
                <p>The contact information that can be stored on a card is an important part of keeping in touch with
                    people. With the help of modern technology, it is now possible to store different types of contact
                    information on a card. This includes email addresses, phone numbers, physical addresses and social
                    media accounts. Additionally, cards can also contain links to websites and other online resources
                    that provide more detailed information about the person or business associated with the card. By
                    storing this kind of contact information on a card, it makes it easier for individuals to stay
                    connected and share important details with others quickly and easily.</p>
            </div>
            <div class="question4 question">
                <div>
                    <p>Is it secure to store my contact information on the card?</p>
                </div>

                <i class="bi bi-plus-circle btn-4 faq-btn"></i>
            </div>
            <div class="answer4 answer ">
                <p>With the increasing number of online transactions and services, it is important to consider the
                    security of your contact information when storing it on a card. Storing your contact information on
                    a card can be convenient and secure if done properly. In this article, we will discuss the various
                    security measures you should take to ensure that your contact information is safe when stored on a
                    card. We will also look at some of the use cases for storing contact information on a card and how
                    you can make sure it remains secure.</p>
            </div>

            <div class="question5 question">
                <div>
                    <p>Is it secure to store my contact information on the card?</p>
                </div>

                <i class="bi bi-plus-circle btn-5 faq-btn"></i>
            </div>
            <div class="answer5 answer ">
                <p>With the increasing number of online transactions and services, it is important to consider the
                    security of your contact information when storing it on a card. Storing your contact information on
                    a card can be convenient and secure if done properly. In this article, we will discuss the various
                    security measures you should take to ensure that your contact information is safe when stored on a
                    card. We will also look at some of the use cases for storing contact information on a card and how
                    you can make sure it remains secure.</p>
            </div>
            <div class="question6 question">
                <div>
                    <p>How do I use the Nukreationz Digital NFC business card to share my contact information?</p>
                </div>

                <i class="bi bi-plus-circle btn-6 faq-btn"></i>
            </div>
            <div class="answer6 answer ">
                <p>Nukreationz Digital NFC business cards are the perfect way to share your contact information with
                    anyone. With a simple tap of your phone, you can send someone your name, email address, phone number
                    and any other information you want them to have. This makes it easy for people to get in touch with
                    you without having to manually enter all your details into their phones. With this technology, you
                    can make sure that everyone who needs to know your contact details has them at their fingertips.</p>
            </div>

            <div class="question7 question">
                <div>
                    <p>Is it easy to set up and use the Nukreationz Digital NFC business card?</p>
                </div>

                <i class="bi bi-plus-circle btn-7 faq-btn"></i>
            </div>
            <div " class=" answer7 answer ">
                <p>Setting up and using the Nukreationz Digital NFC business card is an easy and convenient way to stay
                    connected with your contacts. With just a few taps, you can share your contact information, website,
                    social media links, and more with anyone who has a compatible device. The NFC technology makes it
                    easy to transfer data quickly and securely without the need for internet connection or manual input.
                    With Nukreationz Digital NFC business card, staying in touch with your contacts is as simple as
                    tapping two phones together.</p>
            </div>

            <div class=" question8 question">
                <div>
                    <p>What are the advantages of using a Nukreationz Digital NFC business card compared to traditional
                    </p>
                </div>

                <i class="bi bi-plus-circle btn-8 faq-btn"></i>
            </div>
            <div class="answer8 answer ">
                <p>Nukreationz Digital NFC business cards are revolutionizing the way businesses communicate with their
                    customers. With this new technology, businesses can provide a more interactive and engaging
                    experience for customers. Unlike traditional business cards, Nukreationz Digital NFC business cards
                    offer a range of advantages that make them an ideal choice for companies looking to stay ahead of
                    the competition. These advantages include the ability to easily store contact information, share
                    files, and even track customer interactions. With these features, businesses can better understand
                    their customers and provide a more personalized experience that will help them stand out from the
                    crowd.</p>
            </div>
        </div>
        <div class="body2">
            <div class="feedback">
                <h2>Feedback</h2>
                <p>Can’t find a response to your question? Kindly fill in this form and we will send you a response.
                </p>
                <form action="" method="POST">
                    <label style="margin-left: -340px; color: #fff;" for="">Comment</label><br>
                    <textarea style="height: 150px;
                    width: 100%; background: #FFFFFF;
                    border: 1px solid #FFFFFF;
                    border-radius: 4px;" type="text" name="complaint" required></textarea><br>


                    <label style="margin-left: -310px; margin-top: 20px; color: #fff;" for="">Email Address</label><br>
                    <input style=" padding: 10px 12px;
                    width: 100%; background: #FFFFFF;
                    border: 1px solid #FFFFFF;
                    border-radius: 4px;" type="email" name="email" required><br>


                    <input style="margin-top: 20px;" type="submit" name="send_msg" value="Submit">
                </form>
            </div>
            <div style="margin-left: 120px;">
                <img src="img/FAQs-cuate 1.svg" alt="">
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>

    <script src="js/main.js"></script>
    <script src="js/support.js"></script>
    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>