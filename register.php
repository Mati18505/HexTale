<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <?php echo @file_get_contents('./html/head.html');?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="main-container">
        <?php echo @file_get_contents('./html/header.html'); ?>
            
        <div class="rectangle mainArea">
            <div class="register">
                <h1>Register</h1>
                <form action="RegisterDir/register.php" method="post" autocomplete="off" id="register-form">
                    <label for="username">
                        <i class="fas fa-user"></i>
                    </label>
                    <input type="text" name="username" placeholder="Username" id="username" required>
                    <label for="password">
                        <i class="fas fa-lock"></i>
                    </label>
                    <input type="password" name="password" placeholder="Password" id="password" required>
                    <label for="email">
                        <i class="fas fa-envelope"></i>
                    </label>
                    <input type="text" name="email" placeholder="Email" id="email" required>
                    <div class="g-recaptcha" data-sitekey="6LfdOOEoAAAAAAK9NydZv45TpBskeSjK3BhIDDdB"></div>
                    <span id="warning"></span>
                    <input type="submit" value="Register">
                </form>
            </div>
        </div>

        <script>
            const registerForm = document.getElementById("register-form");
            const warning = document.getElementById("warning");

            registerForm.addEventListener("submit", function(event) {
                if(!grecaptcha.getResponse())
                {
                    warning.innerHTML = "Please confirm that you are not a bot.";
                    event.preventDefault();
                    return;
                }
                
                var request = new XMLHttpRequest();
                var url = "RegisterDir/validate.php";
                request.open("POST", url, false);
                request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                request.onreadystatechange = function () {
                    if (request.readyState === 4 && request.status === 200) {
                        var jsonData = JSON.parse(request.response);
                        console.log(jsonData);

                        if(jsonData["valid"] == false)
                        {
                            event.preventDefault();
                            warning.innerHTML = jsonData["message"];
                        }
                    }
                };
                var username = registerForm.querySelector("#username").value;
                var password = registerForm.querySelector("#password").value;
                var email = registerForm.querySelector("#email").value;
                request.send("username=" + username + "&password=" + password + "&email=" + email);

            });  

        </script>

        <?php echo @file_get_contents('./html/footer.html'); ?>
        
    </div>
</body>

</html>
