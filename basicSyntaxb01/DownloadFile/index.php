<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        .img-box {
            display: inline-block;
            text-align: center;
            margin: 0 15px;
        }
    </style>
</head>

<body>
    <?php
    $images = array("nhaTrangBeach01.jpg", "testImgNhatho01.jpg");
    // Loop through array to create image gallery
    foreach ($images as $image) {
        echo '<div class="img-box">';
        echo '<img src="images/' . $image . '" width="200" alt="' .  pathinfo($image, PATHINFO_FILENAME) . '">';
        echo '<p><a href="download.php?file=' . urlencode($image) . '">Download</a></p>';
        echo '</div>';
    }

    ?>
</body>

</html>