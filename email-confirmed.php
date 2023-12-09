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
            <a class="downloadButton-alone" href="./files/launcher/Hextale Launcher-1.0.0 Setup.exe" target="_blank"><i class="icon-download"></i> DOWNLOAD</a>
            
            </div>
        </div>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
