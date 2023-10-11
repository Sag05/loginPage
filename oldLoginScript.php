<?php
	session_start();
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: home.php");
	}

	$mysqli = new mysqli("localhost", "root", "", "test");
	if($mysqli === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$username = $username_err = $password = $password_err = $login_err = "";

	//Check if username was entered
	if(empty(trim($_POST["username"]))){
		$username_err = "Please enter username";
	} else{
		$username = $_POST["username"];
	}
	
	//Check if password was entered
	if(empty(trim($_POST["password"]))){
		$password_err = "Please enter password";
	} else{
		$password = $_POST["password"];
	}

	//If no errors entering password, check with database
	if(empty($username_err) && empty($password_err)){
		$sql = "SELECT id, username, password FROM logins WHERE username = ?";
		
		if($stmt = $mysqli->prepare($sql)){
			$stmt->bind_param("s", $param_username);
			$param_username = $username;

			if($stmt->execute()){
				$stmt->store_result();
				if($stmt->num_rows== 1){
					$stmt->bind_result($id, $username, $hashed_password);
					if($stmt->fetch()){
						if(password_verify($password, $hashed_password)){

							session_start();
	
							$_SESSION["loggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $username;
	
							header("location: home.php");
						} else{
							$login_err = "Invalid username or password.";
						}
					}
				} else{
					$login_err = "Invalid username or password.";
				}
			} else{
				echo "Oops! something went wrong. Please try again later";
			}
			$stmt->close();
		}
	}
	$mysqli->close();
?>