<?php
if(isset($_POST["submit"])){
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username) or empty($password)){
        echo "<p style='color: red'> Login failed. Please enter username and password</p>";
    }
    elseif($username == $_SESSION["uname"] and $password  == $_SESSION["pword"]){
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        header("Location:/sidehustle-internship/second_project/home.php");
    }else{
        echo "<p style='color: red'> Login failed. Please check username or password</p>";
        
    }
    
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE | LOGIN</title>
</head>
<body>
<h3>Login Form</h3>
<form action="" method="post">
<p>Username: <input type="text" name="username"></p>
<p>Password: <input type="password" name="password"></p>
<input type="submit" name="submit" value="Submit">
</form>

<p>Don't have an Account? <a href="/sidehustle-internship/second_project/index.php">Signup here</a>
</body>
</html>