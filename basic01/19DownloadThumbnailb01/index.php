<?php
    if (isset($_POST['download'])) { // if download btn is clicked
        $imgUrl = $_POST['imgurl'];
        $imageName = $_POST['imgName'];

        $ch = curl_init($imgUrl); //init curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // it transfers data as the return value of curl_exec
        $download = curl_exec($ch);
        curl_close($ch);
        header("Content-type: image/jpg");
        if (empty($imageName)) {
            header('Content-Disposition: attachment;filename="thumbnail.jpg"');

        } else {
            header('Content-Disposition: attachment;filename='.$imageName.".jpg");

        }
        echo $download;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn basic PHP download thumbnail</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <header>Download Thumbnail</header>
        <div class="url-input">
            <span class="title">
                Paste video url:
            </span>
            <div class="field">
                <input type="text" placeholder="https://www.youtube.com/" required>
                <input type="hidden" class="hidden-input" name="imgurl">
                <input type="hidden" class="hidden-name" name="imgName" >
                <span class="bottom-line"></span>
            </div>
        </div>

        <div class="preview-area">
            <img src="" alt="" class="thumbnail">
            <i class="icon fas fa-cloud-download-alt">

            </i>

            <span>Paste video url to see preview</span>
        </div>

        <button class="download-btn" type="submit" name="download">
            Download Thumbnail
        </button>
    </form>

    <script>
        const urlField = document.querySelector(".field input");

        previewArea = document.querySelector(".preview-area");
        imgTag = previewArea.querySelector('.thumbnail');
        hiddenInput = document.querySelector('.hidden-input');
        hiddenName = document.querySelector('.hidden-name');

        urlField.onkeyup = () => {
            let imgUrl = urlField.value; //getting enter value of url
            console.log(imgUrl);
            previewArea.classList.add("active");

            if (imgUrl.indexOf('https://www.youtube.com/watch?v=') != -1) {
                //if entered value is yt video url
                let vidId = imgUrl.split("v=")[1].substr(0, 11); //splitting yt youtube from v= can get only video id
                console.log(vidId);
                let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; //passing entered url video id inside by thumbnail url
                console.log(ytThumbnailUrl);
                imgTag.src = ytThumbnailUrl; //passing url on img src
                hiddenName.value = vidId; 
            }else if(imgUrl.indexOf('https://youtu.be/' != -1)) {
                //if entered value is look like this
                let vidId = imgUrl.split("be/")[1].substr(0, 11); //splitting yt youtube from be/ can get only video id
                console.log(vidId);
                let ytThumbnailUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`; //passing entered url 
                imgTag.src = ytThumbnailUrl; //passing url on img src
                hiddenName.value = vidId; 
            }else if(imgUrl.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
                //if the entered vallue is other image
                imgTag.src = imgUrl;
                hiddenName.value = "";
            }else {
                imgTag.src = "";
                button.style.pointerEvents = "none";
                previewArea.classList.remove("active");
                hiddenName.value = "";
            }

            hiddenInput.value = imgTag.src; //passing value
            console.log(hiddenName.value);
        }
    </script>
</body>
</html>