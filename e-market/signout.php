<?php
if(!isset($_SESSION)){
    session_start();
    unset($_SESSION['email']);
    header("Location:/sidehustle-internship/e-market/");
}

?>