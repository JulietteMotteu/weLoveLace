<?php

require_once('./config.php');

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
<div id="ressourceSection">
    <div id="ressourceSelect">
        <button class="ressourceBtn" data-button="site" id="left-btn">Sites</button>
        <button class="ressourceBtn" data-button="presse">Presse</button>
        <button class="ressourceBtn" data-button="livre">Livres</button>
        <button class="ressourceBtn" data-button="media">Medias</button>
        <button class="ressourceBtn" data-button="all">All</button>
    </div>

    <div id="ressourceParent"> 
       <?php

        for ($i=0; $i<count($ressources); $i++) {

            echo '<div class="ressourceChild" data-category="' . $ressources[$i]['type'] . '"><img src="./img/ressources/' . $ressources[$i]['image'] . '" alt="' . $ressources[$i]['titre'] . '">';

            echo '<div class="overlay"><h2>' . $ressources[$i]['titre'] . '</h2>';

            echo '<p>' . substr($ressources[$i]['description'], 0, 300) . '</p><a href="#id' . $ressources[$i]['id'] .  '" class="infoLink">En savoir +</a></div></div>';

            // Gallery slide
            echo '<div id="id' . $ressources[$i]['id'] . '" class="white-popup-block mfp-hide"><h2>' . $ressources[$i]['titre'] . '</h2><h3>' . $ressources[$i]['auteur'] . '</h3>';
            if (!$ressources[$i]['media']) {
                echo '<img src="./img/ressources/' . $ressources[$i]['image'] . '" alt="' . $ressources[$i]['titre'] . '"><br>';
            }
            else {
                echo $ressources[$i]['media'] . '<br>'; 
            }
            
            echo '<p>' . $ressources[$i]['description'] . '</p>';
            
            $type = $ressources[$i]['type'];
            switch ($type) {
                case 'livre':
                    echo '<a class="lienBtn" href="' . $ressources[$i]['lien'] . '"><i class="fas fa-angle-double-right"></i>Acheter le livre</a>';
                    break;
                case 'site':
                    echo '<a class="lienBtn" href="' . $ressources[$i]['lien'] . '"><i class="fas fa-angle-double-right"></i>Vers le site</a>';
                    break;
                case 'presse':
                    echo '<a class="lienBtn" href="' . $ressources[$i]['lien'] . '"><i class="fas fa-angle-double-right"></i>Lire l\'article</a>';
            }
            
            echo '</div>';
        }

        ?>
    </div>
</div>
   
   
<!--Lien JS Magnific Popup-->    

<script>
    ressourceSelect.addEventListener("click", function(event){
        if (event.target.tagName == "BUTTON") {
            // Tri tags
            var tagRessource = document.getElementsByClassName("ressourceChild");

            for (let i = 0; i < tagRessource.length; i++) {
                tagRessource[i].classList.add('hideRessource');
                if (tagRessource[i].dataset.category == event.target.dataset.button) {
                    tagRessource[i].classList.remove('hideRessource');
                }
                else if (event.target.dataset.button == "all"){
                    tagRessource[i].classList.remove('hideRessource');
                }
            }   
        }
    })

    // Slide gallery
    $(document).ready(function() {
        $('.infoLink').magnificPopup({
            type: 'inline',
            preloader: false,
            gallery: {
                enabled: true
            },
        });
    });

</script>