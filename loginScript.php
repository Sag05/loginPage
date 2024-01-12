<?php
    session_start();
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: home.php");
        die();
    }

    $link = mysqli_connect("localhost", "root", "", "test");

    //Check if username was entered
    if (empty(trim($_POST["username"]))) {
        $error .= "eu";
    } else {
        $username = $_POST["username"];
    }

    //Check if password was entered
    if (empty(trim($_POST["password"]))) {
        $error .= "ep";
    } else {
        $password = $_POST["password"];
    }

    if (isset($error)) {
        header("Location: loginPage.php?error=$error");
        die();
    }

    $sql = "SELECT password, id FROM logins WHERE username='$username'";

    $result = mysqli_query($link, $sql);
    $user_info = mysqli_fetch_assoc($result);
    if (!isset($user_info["id"])) {
        header("Location: loginPage.php?error=iu");
        die();
    }
    if (password_verify($password, $user_info["password"])) {
        $_SESSION["id"] = $user_info["id"];
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;

        header("location: home.php");
    } else {
        header("Location: loginPage.php?error=ip");
        die();
    }
    mysqli_close($link);
?>