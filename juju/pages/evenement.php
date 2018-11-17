<?php
//on charge le contenu du fichier config.php
require_once('./config.php');
//on se connecter a la db
try { 
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOExeption $e){
    echo $e->getMessage();         
    $pdo = null ;
    die();
}

$sql = 'SELECT *, t_evenement.id as id, DATE_FORMAT(date, "%d") as jour, DATE_FORMAT(date, "%m") as mois FROM                   t_evenement';
        
$statement = $pdo->query($sql); 
$t_evenement = $statement->fetchAll(PDO::FETCH_ASSOC);

if(isset($_SESSION['id'])) {
    $statement2 = $pdo->prepare('SELECT idEvenement FROM t_like WHERE idPersonne = :idPersonne'); 
    $statement2->bindValue(':idPersonne', $_SESSION['id'], PDO::PARAM_INT);
    $statement2->execute();
    $t_like = $statement2->fetchAll(PDO::FETCH_ASSOC);

    $arrLike=[];
    foreach ($t_like as $cle => $valeur){
        $arrLike[] =  $valeur['idEvenement'];
    }
    
    $statement3 = $pdo->prepare('SELECT idEvenement FROM t_participation WHERE idPersonne = :idPersonne'); 
    $statement3->bindValue(':idPersonne', $_SESSION['id'], PDO::PARAM_INT);
    $statement3->execute();
    $t_participation = $statement3->fetchAll(PDO::FETCH_ASSOC);

    $arrParticipation=[];
    foreach ($t_participation as $cle => $valeur){
        $arrParticipation[] =  $valeur['idEvenement'];
    }
}

?>
    
<div id="eventSection">
    
<?php
    for($i = 0; $i < count($t_evenement); $i++){
        
        $time = explode(":", $t_evenement[$i]['heure']);
        echo '<div class="eventParent"><div class="dateHeure"><div class="date"><p>'  . $t_evenement[$i]['jour'] . '</p><p>' . $t_evenement[$i]['mois'] . '</p></div><p>' . $time[0] . 'h</p></div>';
        
        echo '<div class="eventDetail"><div class="nomImg"><h2>' . $t_evenement[$i]['nom'] . '</h2>';
        
        if(isset($_SESSION['id'])) {
                
                if(in_array ($t_evenement[$i]['id'], $arrLike)) {
                    
                    echo '<button data-id="' .  $t_evenement[$i]['id'] . '" class="like boutonLike" disable><i class="fas fa-heart fa-lg"></i></button>';
                }
                else {
                    echo '<button data-id="' .  $t_evenement[$i]['id'] . '" class="boutonLike"><i class="fas fa-heart fa-lg"></i></button>';
                }
        }
        
        else {
            echo '<button data-id="' .  $t_evenement[$i]['id'] . '"><i class="fas fa-heart fa-lg"></i></button>';
        }
        
        echo '<img src="./img/evenements/' . $t_evenement[$i]['image'] . '.jpg"></div><div class="descriptionIns"><div class="description" id="' . $t_evenement[$i]['id'] . '"><p>' . $t_evenement[$i]['description'] . '</p><button class="descriptionBtn" id="' . $t_evenement[$i]['id'] . '"><i class="fas fa-chevron-right fa-rotate-90"></i></button><button class="facebook-share" data-js="facebook-share">Partager</button></div>';
        
        if(isset($_SESSION['id'])) {
            
            if(in_array($t_evenement[$i]['id'], $arrParticipation)) {
                echo '<button class="inscriptionBtn inscription" data-id="' .  $t_evenement[$i]['id'] . '">Participe<i class="fas fa-check"></i></button>';
            }
            else {
                echo '<button class="inscriptionBtn" data-id="' .  $t_evenement[$i]['id'] . '">S\'inscrire</button>';
            }
        }
        else {
                echo '<button class="inscriptionBtn" data-id="' .  $t_evenement[$i]['id'] . '">S\'inscrire</button>';
            }
        
        echo '</div></div></div>';
    }
    
?>

<!--<div id="inscrire" class="white-popup-block mfp-hide">
	<p>Vous désirez participer? En cliquant sur inscription, vous êtes automatiquement enregistré à notre événement badass!</p>
	<p><a class="popup-modal-dismiss" href="#">Inscription</a></p>
	<p><a class="popup-modal-dismiss" href="#">Ne pas s'inscrire</a></p>
</div>-->

<script>
    
    // POUR SABRINA <3 <3

 /*   var likeBtn = document.getElementsByClassName('boutonLike');
    console.log(likeBtn);
    
    for (let i = 0; i < count(likeBtn); i++) {
        likeBtn.addEventListener('click', function (){
        likeBtn[i].style.color = "#ea5920";
        }
    })*/
    
    // Liker un événement
    eventSection.addEventListener('click', function(e){
        console.log('click');
        
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function (){
			if (xhr.readyState == 4){
				if (xhr.status == 200){
                    if (e.target.className == 'boutonLike') {
                        e.target.classList.add("like");
                    }
				}
				else {
					console.log ("Erreur dans AJAX");
				}
			}
		}
		
		xhr.open ("GET", "./traitement/evenementLike.php?idEvent=" + e.target.getAttribute('data-id'));
		xhr.send (null);
        
    });
    
    // Participer à un événement
    eventSection.addEventListener('click', function(e){
   
        var xhr2 = new XMLHttpRequest();
        
        xhr2.onreadystatechange = function (){
			if (xhr2.readyState == 4){
				if (xhr2.status == 200){
					console.log (xhr2.responseText);
                    if (e.target.className == 'inscriptionBtn') {
                        e.target.innerHTML = 'Participe<i class="fas fa-check"></i>';
                        e.target.disabled = "disabled";
                    }
				
				}
				else {
					console.log ("Erreur dans AJAX");
				}
			}
		}
		xhr2.open ("GET", "./traitement/evenementParticipation.php?idEvent=" + e.target.getAttribute('data-id'));
		xhr2.send (null);
    });
    
</script>

<!--ce script pour le partage fb-->
<script type="text/javascript">
    
    var facebookShare = document.querySelectorAll('[data-js="facebook-share"]');

    for (let i=0; i<facebookShare.length; i++) {
        facebookShare[i].onclick = function(e) {
            e.preventDefault();

            var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');

            if(facebookWindow.focus) { 
                facebookWindow.focus(); 
            }
            return false;
        }
    }
    
    // Ce script pour le texte qui apparaît
    eventSection.addEventListener('click', function(e){
        if (e.target.className == 'descriptionBtn') {
            var descr = document.getElementsByClassName('description');
            var event = document.getElementsByClassName('eventParent');
            for (let i=0; i<descr.length; i++) {
                if (e.target.id == descr[i].id) {
                    if (descr[i].classList.contains("descriptionOpen"))
                    {descr[i].classList.remove("descriptionOpen");
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
    
        
 
    
    /*Popup modal*/
/*    
    utiliser dans s'inscire : href = "#inscription"
    $(document).ready(function() {
        $('.inscription').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#username',
            modal: true
        });
        $(document).on('click', '.popup-modal-dismiss', function (e) {
            e.preventDefault();
            $.magnificPopup.close();
        });
    });
    
    $(".mfp-bg").css('background-color', '#fff');*/
    
</script>