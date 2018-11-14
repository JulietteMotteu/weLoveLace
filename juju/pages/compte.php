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
if(isset($_SESSION['id'])) {
    $statement = $pdo->prepare('SELECT * FROM t_personne WHERE id = :id');
    $statement->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
    $statement->execute();
    $personne = $statement->fetchAll(PDO::FETCH_ASSOC);
    var_dump($personne);
}


?>
    

<div id="compteSection">

    <div id="profil">
        <h2>Mon profil</h2>
        <div id="profilDetail"> 
            <?php
            echo '<div id="photo">';
            if (!empty($personne[0]['photo'])) {
                echo '<img src="' . $personne[0]['photo'] . '" alt="Ma photo">';
            }
            else {
                echo '<i class="fas fa-user-alt" id="userLogo"></i>';
            }
            echo '</div><div id="profilDesc"><h3>' . ucfirst($personne[0]['pseudo']) . '</h3></div>';

            ?>
        </div>
    </div>
    

</div>

<?php
ob_flush();
?>