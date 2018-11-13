<?php
ob_start();

session_start();

// Destroy Data
$_SESSION = [];

// Destroy cookie
if (session_status() == PHP_SESSION_ACTIVE) { 
    session_destroy(); 
}

// Header redirect
header("Location: ./index.php"); 
die();

ob_flush();
?>