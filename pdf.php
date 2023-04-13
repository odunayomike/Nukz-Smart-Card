<?php
include('conn.php');

if(isset($_FILES['pdf_file'])) {
  $pdf_name = $_FILES['pdf_file']['name'];
  $pdf_tmp_name = $_FILES['pdf_file']['tmp_name'];
  $pdf_type = $_FILES['pdf_file']['type'];
  $pdf_size = $_FILES['pdf_file']['size'];
  $upload_dir = "uploads/";
  $pdf_file = uniqid() . ".pdf";
  move_uploaded_file($pdf_tmp_name, $upload_dir . $pdf_file);
  $pdf_url = $upload_dir . $pdf_file;

  $stmt = $db->prepare("INSERT INTO pdf_files (url, name, size, type) VALUES (?, ?, ?, ?)");

  if(!$stmt) {
    // Handle error
    echo "Error preparing statement: " . $db->error;
    exit();
  }

  $bind_result = $stmt->bind_param("ssis", $pdf_url, $pdf_name, $pdf_size, $pdf_type);

  if(!$bind_result) {
    // Handle error
    echo "Error binding parameters: " . $stmt->error;
    exit();
  }

  $execute_result = $stmt->execute();

  if(!$execute_result) {
    // Handle error
    echo "Error executing statement: " . $stmt->error;
    exit();
  }

  $pdf_id = $stmt->insert_id;
  $view_link = "view_pdf.php?id=" . $pdf_id;
  echo "PDF file uploaded successfully. View link: <a href='$view_link'>$view_link</a>";
}

$db->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="pdf_file">
        <input type="submit" name="submit" value="Upload">

    </form>

    <?php if(isset($view_link)) { ?>
    <p>View link: <a href="<?php echo $view_link; ?>"><?php echo $view_link; ?></a></p>
    <?php } ?>
</body>

</html>