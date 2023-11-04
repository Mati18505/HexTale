<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Confirmed</title>
    <?php echo @file_get_contents('./html/head.html');?>
</head>

<body>
    <div class="main-container">
        <?php include('./html/header.php'); ?>
            
        <div class="rectangle mainArea">
            <h1 class="headline">Registration successful!</h1>
            <div class="info">
                <p>You can now <b>play!</b></p>
            </div>
            <div class="download-div">
            <?php
                $downloadLinks = json_decode(file_get_contents("files/DownloadLinks.json"), true);
                $clientDownload = $downloadLinks["clientDownload"];
                echo '<a class="downloadButton-alone" href="' . $clientDownload . '" target="_blank"><i class="icon-download"></i> DOWNLOAD</a>';
            ?>
            
            </div>
        </div>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
