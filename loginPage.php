<?php
    session_start();
    if(isset($_SESSION['loggedin'])){
        header("location: home.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    </head>
    <body>
        <div id="formContainer">
            <h3>Register</h3>
                <?php 
                    if(isset($_GET["error"])){
                        switch($_GET["error"]){
                            case "c":
                                echo '<p class="error">Could not connect to server</p>';
                                break;
                            case "reu":
                                echo '<p class="error">Please enter username</p>';
                                break;
                            case "rep":
                                echo '<p class="error">Please enter password</p>';
                                break;
                            case "reurep":
                                echo '<p class="error">Please enter username and password</p>';
                                break;
                            case "ree":
                                echo '<p class="error">Please enter email</p>';
                                break;
                            case "reurepree":
                                echo '<p class="error">Please enter username, password and email</p>';
                                break;
                            case "riu":
                                echo '<p class="error">Please enter a valid username</p>';
                                break;
                            case "rie":
                                echo '<p class="error">Please enter a valid email</p>';
                                break;
                            case "riurie":
                                echo '<p class="error">Please enter a valid username and email</p>';
                                break;
                                default:
                        }
                    }
                ?>
            <form method="post" action="registerScript.php">
                <input class="spacing1" type="text" name="username" placeholder="Username"><br>
                <input class="spacing1" type="email" name="email" placeholder="Email"><br>
                <input class="spacing1" type="password" name="password" placeholder="Password"><br>
                <input class="spacing2" type="submit" name="newButton" value="Register">
            </form>
            
            <h3>Login</h3>
                <?php 
                    if(isset($_GET["error"])){
                        switch($_GET["error"]){
                            case "eu":
                                echo '<p class="error">Please enter username</p>';
                                break;
                            case "ep":
                                echo '<p class="error">Please enter password</p>';
                                break;
                            case "euep":
                                echo '<p class="error">Please enter username and password</p>';
                                break;
                            case "iu":    
                                echo '<p class="error">Incorrect username</p>';
                                break;
                            case "ip":
                                echo '<p class="error">Incorrect password</p>';
                                break;
                            default:
                        }
                    }
                ?>
            <form method="post" action="loginScript.php">
                <input class="spacing1" type="text" name="username" placeholder="Username"><br>
                <input class="spacing1" type="password" name="password" placeholder="Password"><br>
                <input class="spacing2" type="submit" name="newButton" value="Login">
            </form> 
        </div>
    </body>
</html>