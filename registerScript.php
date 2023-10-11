<?php
	session_start();
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		header("location: home.php");
	}

	//Check if username was entered
	if (empty(trim($_POST["username"]))) {
		$error .= "reu";
	} else {
		$username = $_POST["username"];
	}

	//Check if password was entered
	if (empty(trim($_POST["password"]))) {
		$error .= "rep";
	} else {
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	}

	if(empty(trim($_POST["mail"]))){
		$error .= "ree";
	} else {
		$mail = $_POST['mail'];
	}

	if(isset($error)){
		header("Location: loginPage.php?error=$error");
		die();
	}

	$link = mysqli_connect("localhost", "root", "", "test");
	if ($link === false) {
		header("Location: loginPage.php?error=c");
		die();
	}

	$sql = "INSERT INTO logins (username, mail, password) VALUES ( '$username', '$mail', '$password')";
	mysqli_query($link, $sql);
	header("Location: loginPage.php");
?>