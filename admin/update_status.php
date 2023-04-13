<?php
include('conn.php');

if(isset($_POST['id'])) {

    $id = $_POST['id'];

    
        
   
        // Update the row status from "pending" to "sorted"
        $sql = "UPDATE complaints SET status = 'sorted' WHERE id = $id";
        if ($db->query($sql) === TRUE) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . $db->error;
        }
    
    

        
    


    // Close the database connection
    
}



if(isset($_POST['admin_id'])) {

    $id2 = $_POST['admin_id'];

    $check = mysqli_query($db,"SELECT status from nadmin WHERE admin_id = $id2");
     if (mysqli_num_rows($check)>0){
            while($statusrow = mysqli_fetch_assoc($check)){

                $status = $statusrow['status'];

        if($status == 'suspend'){
        
   
        // Update the row status from "pending" to "sorted"
            $sql2 = "UPDATE nadmin SET status = 'active' WHERE admin_id = $id2";
            if ($db->query($sql2) === TRUE) {
              
                echo "Status updated successfully";
                 
            } else {
                echo "Error updating status: " . $db->error;
            }

            }else{
                $sql2 = "UPDATE nadmin SET status = 'suspend' WHERE admin_id = $id2";
                if ($db->query($sql2) === TRUE) {
                    
                    echo "Status updated successfully";
                    
                   
                } else {
                    echo "Error updating status: " . $db->error;
                }
            }
        }
    }

}

if(isset($_POST['admin_id_delete'])) {

    $id = $_POST['admin_id_delete'];

        $sql = "DELETE FROM nadmin  WHERE admin_id = $id";
        if ($db->query($sql) === TRUE) {
            echo "Admin user deleted successfully";
        } else {
            echo "Error updating status: " . $db->error;
        }
    $db->close();
    
}

?>