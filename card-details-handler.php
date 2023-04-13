<?php
    $username = $_SESSION['username'];

// echo ('something');
include('conn.php');
include "phpqrcode/qrlib.php";


if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $cname = mysqli_real_escape_string($db, $_POST['cname']);
    $psummary = mysqli_real_escape_string($db, $_POST['psummary']);
    $website = mysqli_real_escape_string($db, $_POST['website']);
    $jobtitle = mysqli_real_escape_string($db, $_POST['jobtitle']);
    $color = mysqli_real_escape_string($db, $_POST['color-input']);
    // social page 
    $facebook = mysqli_real_escape_string($db, $_POST['facebook-link']);
    $instagram = mysqli_real_escape_string($db, $_POST['instagram-link']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter-link']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin-link']);
    $pintrest = mysqli_real_escape_string($db, $_POST['pin-link']);
    $youtube = mysqli_real_escape_string($db, $_POST['youtube-link']);
    $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp-link']);

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    
    
    
    
    

    $sql_query = "SELECT user_id from user where username like '$username'";
    $result = mysqli_query($db, $sql_query);
    
    if(mysqli_num_rows($result) > 0 ){
    
        $row = mysqli_fetch_assoc($result);
        $user_id =  $row['user_id'];
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array("jpg", "jpeg", "png", "svg" );
        
    }
    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
        $img_upload_path = 'uploads/'.$new_img_name;
        move_uploaded_file($tmp_name, $img_upload_path);

    

    
        // Attempt insert query execution
        $sql = "INSERT INTO card_details ( user_id, firstname, lastname, email, phone, caddress, company_name, psummary, jobtitle, website_link, images, color) VALUES ('$user_id', '$fname', '$lname', '$email', '$phone', '$address', '$cname', '$psummary', '$jobtitle', '$website', '$new_img_name', '$color')";
        if($db->query($sql) === true){
            $card_id = mysqli_insert_id($db);
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . $db->error;
        }
        

        $query2 = "INSERT INTO user_social_link (card_id, user_id, facebook, instagram, linkedin, twitter, whatsapp, pintrest, youtube)
                    VALUES('$card_id', '$user_id', '$facebook', '$instagram', '$linkedin', '$twitter', '$whatsapp', '$pintrest', '$youtube')";
        mysqli_query($db, $query2);

        
    

        $images = $_FILES['files'];

        # Number of images
        $num_of_imgs = count($images['name']);
        echo $num_of_imgs;
    
        for ($i=0; $i < $num_of_imgs; $i++) { 
            
            # get the image info and store them in var
            $image_name = $images['name'][$i];
            $tmp_name   = $images['tmp_name'][$i];
            $error      = $images['error'][$i];
    
            # if there is not error occurred while uploading
            if ($error === 0) {
                
                # get image extension store it in var
                $img_ex = pathinfo($image_name, PATHINFO_EXTENSION);
    
                /** 
                convert the image extension into lower case 
                and store it in var 
                **/
                $img_ex_lc = strtolower($img_ex);
                
                /** 
                crating array that stores allowed
                to upload image extensions.
                **/
                $allowed_exs = array('jpg', 'jpeg', 'png');
    
    
                /** 
                check if the the image extension 
                is present in $allowed_exs array
                **/
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    /** 
                     renaming the image name with 
                     with random string
                    **/
                    $new_img_name = uniqid('IMG-', true).'.'.$img_ex_lc;
                    
                    # crating upload path on root directory
                    $img_upload_path = 'uploads/'.$new_img_name;
    
                    # inserting imge name into database
                    
                    $sql  = "INSERT INTO images (user_id, file_name)
                         VALUES (?,?)";
                    $stmt = $db->prepare($sql);
                    $stmt->bind_param('ss', $user_id, $new_img_name);
                    $stmt->execute();
                    
    
                    # move uploaded image to 'uploads' folder
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    
    
                }else {
                    # error message
                     $em = "You can't upload files of this type";
    
                    /*
                    redirect to 'index.php' and 
                    passing the error message
                    */
    
                    header("Location: card_details.php?error=$em");
                }
    
       
            }else {
                # error message
                $em = "Unknown Error Occurred while uploading";
    
                /*
                redirect to 'index.php' and 
                passing the error message
                */
    
                header("Location: card_details.php?error=$em");
            }
        }	
        echo "<script>location.href='card-success.php';</script>";

    }
    
    $db->close();

}


?>