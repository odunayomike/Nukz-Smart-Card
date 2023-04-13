<!DOCTYPE html>
<html>

<head>
    <title>View PDF</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
</head>

<body>
    <?php
    $pdf_url = "https://nukreationzdigital.com/new%20smart%20card/uploads/641052c12ddf5.pdf";
    ?>

    <iframe src="<?php echo $pdf_url; ?>" width="100%" height="800px" frameborder="0"></iframe>
</body>

</html>