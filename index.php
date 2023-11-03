<!DOCTYPE html>
<html lang="en">
<?php
    function putPage($page) {
        if(strlen($page) > 0) {
            $allowed = array('main-page', 'ranking', 'rules', 'register', 'successful-registration', 'email-confirmed');

            $page = trim($page);
            $page = (in_array($page, $allowed)) ? $page : 'main-page';
    
            echo @file_get_contents('./html/' . $page . '.html');
        }
    }
?>

<head>
    <title>Strona Główna</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="Fontello/css/fontello.css">
    <script src="htmlImporter.js"></script>
    <link rel="shortcut icon" href="#">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>

<body>
    
    <div class="main-container">
        <?php 
            echo @file_get_contents('./header.html');
            
            isset($_GET['page']) ? $page = $_GET['page'] : $page = 'main-page';
            putPage($page);
        ?>

        <footer>
            &copy; 2023 HexTale | All right reserved.
        </footer>
    </div>
</body>

</html>
