<?php
function ValidateUsername($username) {
    return !preg_match('/^[a-zA-Z0-9]+$/', $username) == 0;
}
function UsernameExist($username, $con) {
    if (pg_prepare($con, "username-exist", 'SELECT USERNAME FROM "public"."accounts" WHERE "username" = $1')) {
        $queryResult = pg_execute($con, "username-exist", array($username));
        return pg_num_rows($queryResult) > 0;
    }
}
function EmailExist($email, $con) {
    if (pg_prepare($con, "email-exist", 'SELECT EMAIL FROM "public"."accounts" WHERE "email" = $1')) {
        $queryResult = pg_execute($con, "email-exist", array($email));
        return pg_num_rows($queryResult) == 0;
    }
}
function ValidateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
function ValidatePassword($password) {
    return !(strlen($password) > 20 || strlen($password) < 4);
}
?>