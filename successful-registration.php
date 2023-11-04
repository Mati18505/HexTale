<!DOCTYPE html>
<html lang="en">
<head>
    <title>successful Registration</title>
    <?php echo @file_get_contents('./html/head.html');?>
</head>

<body>
    <div class="main-container">
        <?php echo @file_get_contents('./html/header.html'); ?>
            
        <div class="rectangle mainArea">
            <h1 class="headline">Email Verification</h1>
            <div class="info">
                <p>We have sent verification link to your <b>email.</b></p>
                <p>Click on the link to complete verifiaction process.</p>
                <p>You might need to <b>check your spam folder.</b></p>
            </div>
        </div>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
