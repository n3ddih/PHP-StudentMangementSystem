<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['teacher']) || !isset($_SESSION['student'])){
    // redirect to login
    header("Location: login.php");
}

