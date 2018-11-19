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
    
    // Mise à jour données perso -> marche à moitié -> textarea ne s'insère pas!
//    if(isset($_POST['photo'], $_POST['descriptionText'])) {
//        $statement3 = $pdo->prepare('UPDATE t_personne SET description = :description, photo = :photo, WHERE id = :idPersonne');
//        $statement3->bindValue(':photo', $_POST['photo'], PDO::PARAM_STR);
//        $statement3->bindValue(':description', $_POST['descriptionText'], PDO::PARAM_STR);
//        $statement3->bindValue(':idPersonne', $_SESSION['id'], PDO::PARAM_INT);
//        $statement3->execute();
//        $insertion = $statement3->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($_POST);
//    }
//    echo $_POST['descriptionText'];
//    
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
            
            <button id="profilBtn">Modifier</button>
            
            
        </div>
    </div>
    
    <div id="formProfil" class="visible">
       <h2>Modifier</h2>
        <form action="./index.php?page=compte" method="post">
            <label for="photo">Télécharger votre photo</label>
            <input type="file" name="photo">
            <textarea name="descriptionText" id="" cols="30" rows="10" placeholder="Votre description de badass!"></textarea>
            <button type="submit">Enregistrer</button>
        </form>
    </div>

</div>

<div id="compteEventSection">
    <h2>Mes participations</h2>


    <?php
        for($i = 0; $i < count($participation); $i++){

            $time = explode(":", $participation[$i]['heure']);
            echo '<div class="eventParent"><div class="dateHeure"><div class="date"><p>'  . $participation[$i]['jour'] . '</p><p>' . $participation[$i]['mois'] . '</p></div><p>' . $time[0] . 'h</p></div>';

            echo '<div class="eventDetail"><div class="nomImg"><h2>' . $participation[$i]['nom'] . '</h2>';

            echo '<button class="boutonLike" disable>';

            echo '<i class="fas fa-heart fa-lg"></i></button><img src="./img/evenements/' . $participation[$i]['image'] . '.jpg"></div><div class="descriptionIns"><div class="description"id="' . $participation[$i]['id'] . '"><p>' . $participation[$i]['description'] . '</p><button class="descriptionBtn" id="' . $participation[$i]['id'] . '"><i class="fas fa-chevron-right fa-rotate-90"></i></button><button class="facebook-share" data-js="facebook-share">Partager</button></div><button class="inscriptionBtn" data-id="' .  $participation[$i]['id'] . '">S\'inscrire</button></div></div></div>';


        }

    ?>

<script>
    
    // Ce script pour modifier le profil 
    profilBtn.addEventListener('click', function(){
        if (formProfil.classList.contains("visible")) {
            formProfil.classList.remove("visible");
        }
        else {
            formProfil.classList.add("visible");
        }
    })
    
    // Ce script pour le texte qui apparaît
    compteEventSection.addEventListener('click', function(e){
        if (e.target.className == 'descriptionBtn') {
            var descr = document.getElementsByClassName('description');
            var event = document.getElementsByClassName('eventParent');
            for (let i=0; i<descr.length; i++) {
                if (e.target.id == descr[i].id) {
                    if (descr[i].classList.contains("descriptionOpen"))
                    {
                        descr[i].classList.remove("descriptionOpen");
                        event[i].classList.remove("eventOpen"); 
                    }
                    
                    else {
                        descr[i].classList.add("descriptionOpen");
                        event[i].classList.add("eventOpen");     
                    }
                }
            }
        }
    })
    
</script>

<?php
ob_flush();
?>