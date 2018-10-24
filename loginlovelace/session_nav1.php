<?php
ob_start();

// Authentification
require_once('./session_auth.php');

// SESSION
$_SESSION['demo'] = 42;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP - Sessions</title>
    </head>
    <body>
        <h1>PHP - Sessions</h1>

        <p>Page 1 - Inacessible sans session.</p>
        
        <nav>
            <ul>
                <li>PAGE 1</li>
                <li><a href="./session_nav2.php">PAGE 2</a></li>
                <li><a href="./session_logout.php">Log Out</a></li>
            </ul>
        </nav>
        
        <pre><?php var_dump($_SESSION); ?></pre>
    </body>
</html>
<?php
ob_flush();
?>