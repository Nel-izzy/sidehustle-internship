<?php
if(!isset($_SESSION)){
    session_start();
    $username = $_SESSION["username"];
    if(empty($username)){
        header("Location:/sidehustle-internship/second_project/login.php");
    }else{
        echo "<h3>Welcome ".ucfirst($username);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBSITE | HOME</title>
</head>
<body>
    
    <p><a href="/sidehustle-internship/second_project/logout.php">Log out</a>
</body>
</html>