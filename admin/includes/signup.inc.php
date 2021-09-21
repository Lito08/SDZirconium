<?php

if (isset($_POST["submit"])) {
    
    $full_name = $_POST["full_name"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    require_once '../connection.php';
    require_once '../functions.php';

    if (emptyInputSignup($full_name, $user_name, $email, $password, $confirm_password) !== false) {
        header("Location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($user_name) !== false) {
        header("Location: ../register.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../register.php?error=invalidemail");
        exit();
    }
    if (passwordMatch($password, $confirm_password) !== false) {
        header("Location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($con, $user_name, $email) !== false) { 
        header("Location: ../register.php?error=usernametaken");
        exit();
    }

    createUser($con, $full_name, $user_name, $email, $password);

}
else {
    header("Location: ../register.php");
    exit();
}