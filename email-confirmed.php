<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Confirmed</title>
    <?php echo @file_get_contents('./html/head.html');?>
</head>

<body>
    <div class="main-container">
        <?php echo @file_get_contents('./html/header.html'); ?>
            
        <div class="rectangle mainArea">
            <h1 class="headline">Registration successful!</h1>
            <div class="info">
                <p>You can now <b>play!</b></p>
            </div>
        </div>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
