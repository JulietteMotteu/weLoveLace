<?php
require_once('./session/session_auth.php');
require_once('./config.php');

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage();  
    $pdo = null;            
    die();                  
}

// Si session existe -> afficher compte

$statement = $pdo->prepare('SELECT * FROM t_personne');
$ressources = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
    

<div id="compteSection">

    <div id="profil">
        <h2>Mon profil</h2>
    </div>
    
    <?php
    
    ?>

</div>


<?php
ob_flush();
?>