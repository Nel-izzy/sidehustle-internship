<?php
if(!isset($_SESSION)){
    session_start();
    $email = $_SESSION["email"];
    if(empty($_SESSION["email"])){
        header("Location:/sidehustle-internship/e-market/");
    }
}

?>