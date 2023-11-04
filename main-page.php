<!DOCTYPE html>
<html lang="en">
<head>
    <title>Main Page</title>
    <?php echo @file_get_contents('./html/head.html');?>
</head>

<body>
    <div class="main-container">
        <?php include('./html/header.php'); ?>
            
        <div class="rectangle" id="supporters">
            <h1 class="headline">SUPPORTERS</h1>
            <div><b>NO SUPPORTERS YET</b></div>
        </div>
        <div class="rectangle mainArea">
            <h1 class="headline">News</h1>
            <div id="news-content"><?php echo @file_get_contents('./html/news.html'); ?></div>
        </div>
        <div class="rectangle" id="specialpplContainer">
            <h1 class="headline">SPECIAL PPL</h1>
            <ul id="specialppl">
                <li id="mati"><b>Mati18505</b></li>
                <li><b>Sirdo</b></li>
                <li><b>LainMayer</b></li>
            </ul>
        </div>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
