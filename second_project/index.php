<?php  

if(isset($_POST["submit"])){
    session_start();
    $username = $_POST["uname"];
    $password = $_POST["pword"];

    if(empty($username)){
        echo "<p style='color: orange'>Please enter a username and a password</p>";
    }else{
        echo "<p style='color: green'>Registration was successful. You will be redirected to the Login page</p>";
        $_SESSION["uname"] = $username;
        $_SESSION["pword"] = $password;
        header("Refresh:4; url=/sidehustle-internship/second_project/login.php");

    }
}
     
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE | SIGN UP</title>
</head>
<body>
<h3>Registration Form</h3>
<form action="" method="post">
<p>Username: <input type="text" name="uname"></p>
<p>Password: <input type="password" name="pword"></p>
<input type="submit" name="submit" value="Submit">
</form>

<p>Already have an Account? <a href="/sidehustle-internship/second_project/login.php">Login here</a>

    
</body>
</html>