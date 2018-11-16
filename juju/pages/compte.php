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
    
    // Afficher les événements likés ou auxquels on participe
    $statement2 = $pdo->prepare('SELECT *, DATE_FORMAT(date, "%d") as jour, DATE_FORMAT(date, "%m") as mois FROM t_evenement INNER JOIN t_participation ON t_evenement.id = t_participation.idEvenement WHERE t_participation.idPersonne = :idPersonne;');
    $statement2->bindvalue(':idPersonne',$_SESSION['id'], PDO::PARAM_INT);
    $statement2->execute();
    $participation = $statement2->fetchAll(PDO::FETCH_ASSOC);
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
                echo '<div id="userLogo"><i class="fas fa-user-alt fa-10x"></i></div>';
            }
            echo '</div><div id="profilDesc"><h3>' . ucfirst($personne[0]['pseudo']) . '</h3><p>' . $personne[0]['description'] . '</p></div>';
            
            ?>
            
            <button>Modifier</button>
            
            
        </div>
    </div>
    
<?php
    for($i = 0; $i < count($participation); $i++){
        
        $time = explode(":", $participation[$i]['heure']);
        echo '<div class="eventParent"><div class="dateHeure"><div class="date"><p>'  . $participation[$i]['jour'] . '</p><p>' . $participation[$i]['mois'] . '</p></div><p>' . $time[0] . 'h</p></div>';
        
        echo '<div class="eventDetail"><div class="nomImg"><h2>' . $participation[$i]['nom'] . '</h2>';
 
        echo '<button class="boutonLike" disable>';
        
        echo '<i class="fas fa-heart fa-lg"></i></button><img src="./img/evenements/' . $participation[$i]['image'] . '.jpg"></div><div class="descriptionIns"><div class="description"><p>' . substr($participation[$i]['description'],0,200). '</p><button><i class="fas fa-chevron-right fa-rotate-90"></i></button><button class="facebook-share" data-js="facebook-share">Partager</button></div><button class="inscription" data-id="' .  $participation[$i]['id'] . '">S\'inscrire</button></div></div></div>';
    }
    
?>

</div>

<?php
ob_flush();
?>