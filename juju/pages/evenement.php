
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
$statement = $pdo->query('SELECT *, DATE_FORMAT(date, "%d") as jour, DATE_FORMAT(date, "%m") as mois FROM t_evenement'); 
$t_evenement = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
    
<div id="eventSection">
    
<?php
    for($i = 0; $i < count($t_evenement); $i++){
        $time = explode(":", $t_evenement[$i]['heure']);
        echo '<div class="eventParent"><div class="dateHeure"><div class="date"><p>'  . $t_evenement[$i]['jour'] . '</p><p>' . $t_evenement[$i]['mois'] . '</p></div><p>' . $time[0] . 'h</p></div>';
        
        echo '<div class="eventDetail"><div class="nomImg"><h2>' . $t_evenement[$i]['nom'] . '</h2><button data-id="' .  $t_evenement[$i]['id'] . '" class="boutonLike"><i class="fas fa-heart fa-lg"></i></button><img src="./img/evenements/' . $t_evenement[$i]['image'] . '.jpg"></div>';
        
        echo '<div class="descriptionIns"><div class="description"><p>' . substr($t_evenement[$i]['description'],0,200). '</p><button class="facebook-share" data-js="facebook-share">Partager</button></div><a class="inscription" href="#inscrire">S\'inscrire</a></div></div></div>';
    }
?>

<div id="inscrire" class="white-popup-block mfp-hide">
	<p>Vous désirez participer? En cliquant sur inscription, vous êtes automatiquement enregistré à notre événement badass!</p>
	<p><a class="popup-modal-dismiss" href="#">Inscription</a></p>
</div>

<script>
    
    // POUR SABRINA <3 <3

 /*   var likeBtn = document.getElementsByClassName('boutonLike');
    console.log(likeBtn);
    
    for (let i = 0; i < count(likeBtn); i++) {
        likeBtn.addEventListener('click', function (){
        likeBtn[i].style.color = "#ea5920";
        }
    })*/
    
    eventSection.addEventListener('click', function(e){
        
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function (){
			if (xhr.readyState == 4){
				if (xhr.status == 200){
					console.log (xhr.responseText);
                    if (e.target.className == 'boutonLike') {
                        e.target.style.color = "#ea5920";
                        e.target.style.backgroundColor = 'transparent';
                        e.target.style.transition = "0.5s";
                        e.target.disabled = "disabled";
                    }
				
				}
				else {
					console.log ("Erreur dans AJAX");
				}
			}
		}
		
		xhr.open ("GET", "./traitement/evenementTraitement.php?idEvent=" + e.target.getAttribute('data-id'));
		xhr.send (null);
        
    });
    
/*    window.onload = function(e){
        var xhr = new XMLHttpRequest();
         xhr.onreadystatechange = function (){
			if (xhr.readyState == 4){
				if (xhr.status == 200){
					console.log (xhr.responseText);
                    if (e.target.className == 'boutonLike') {
                        e.target.style.color = "#ea5920";
                        e.target.style.backgroundColor = 'transparent';
                        e.target.style.transition = "0.5s";
                        e.target.disabled = "disabled";
                    }
				
				}
				else {
					console.log ("Erreur dans AJAX");
				}
			}
		}
		
		xhr.open ("GET", "./traitement/evenementTraitement.php?idEvent=" + e.target.getAttribute('data-id'));
		xhr.send (null);
    }*/
    
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
    
    /*Popup modal*/
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
    
</script>