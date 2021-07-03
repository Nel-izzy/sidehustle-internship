<?php
if(!isset($_SESSION)){
    session_start();
    unset($_SESSION['username']);
    header("Location:/sidehustle-internship/second_project/login.php");
}

?>