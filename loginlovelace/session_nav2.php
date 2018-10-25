<?php
ob_start();

require_once('./session_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP - Sessions</title>
    </head>
    <body>
        <h1>PHP - Sessions</h1>
        
        <p>Page 2 - Inacessible sans session.</p>
        
        <nav>
            <ul>
                <li><a href="./session_nav1.php">PAGE 1</a></li>
                <li>PAGE 2</li>
                <li><a href="./session_logout.php">Log Out</a></li>
            </ul>
        </nav>
        
        <pre><?php var_dump($_SESSION); ?></pre>
    </body>
</html>
<?php
ob_flush();
?>