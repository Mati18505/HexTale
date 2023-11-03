<?php 
    require_once("connection.php");
    require_once("validatelib.php");

    function CheckValid($con) {
        $result = new stdClass();
        $result->valid = false;

        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            if(UsernameExist($username, $con))
                $result->message = "A user with that username already exist!";
            else if(!ValidateUsername($username))
                $result->message = "A username can only have letters and numbers!";
            else if(!EmailExist($email, $con))
                $result->message = "A user with that email already exist!";
            else if (!ValidateEmail($email))
                $result->message = "The email is incorrect!";
            else if(!ValidatePassword($password))
                $result->message = "Password must be between 4 and 20 characters long!";
            else
                $result->valid = true;
        }
        else
        {
            $result->valid = false;
            $result->message = "Please complete the registration form!";
        }

        return $result;
    }

    $resultJSON = json_encode(CheckValid($webpage->GetConnection()));

    echo $resultJSON; // for AJAX
?>