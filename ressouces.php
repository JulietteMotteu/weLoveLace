<?php

require_once('./config.php');
/*include('form.php');*/

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();  
    $pdo = null;            
    die();                  
}

$statement = $pdo->query('SELECT * FROM t_ressources');
$ressources = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ressources</title>
    <link rel="stylesheet" href="./style/stylejuju.css">
</head>
<body>

    <div id="ressource-section">
        <div id="ressource-select">
            <button class="ressource-btn">Sites</button>
            <button class="ressource-btn">Presse</button>
            <button class="ressource-btn">Livres</button>
            <button class="ressource-btn">Medias</button>
            <button class="ressource-btn">All</button>
        </div>

        <div id="ressource-parent"> 
           <?php

            for ($i=0; $i<count($ressources); $i++) {
                echo '<div class="ressource-child"><img src="./img/ressources/' . $ressources[$i]['image'] . '">';
                echo '<h2>' . $ressources[$i]['titre'] . '</h2>';
                echo '<p>' . $ressources[$i]['description'] . '</p>';
                echo '</div>';
            }

            ?>
        </div>
    </div>
    
</body>
</html>