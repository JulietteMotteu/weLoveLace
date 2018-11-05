<?php
$sessionTimeOut = 600; // 60sec * 10 = 10 minutes

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Vérification de l'existance de la session
if (!isset($_SESSION['lastAccess'])){
    $_SESSION = [];

    // Destroy cookie
    if (session_status() == PHP_SESSION_ACTIVE) { 
        session_destroy(); 
    }
    
    header("Location: ./session/inscriptionlogin.php"); 
    die();
}

// ToDo : tests de sécurité (double IP, ...)

// Timeout
if (time() - $_SESSION['lastAccess'] > $sessionTimeOut) {
    $_SESSION = [];

    // Destroy cookie
    if (session_status() == PHP_SESSION_ACTIVE) { 
        session_destroy(); 
    }
    
    header("Location: ./_index.php"); 
    die();
}

$_SESSION['lastAccess'] = time();
?>