<?php
$email;
if(!isset($_SESSION)){
    session_start();
    $email = $_SESSION["email"];
    if(empty($email)){
        header("Location:/sidehustle-internship/e-market/");
    }else{
        echo "<h3>Welcome ".$email;
    }

}

?>