
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
        echo '<div class="eventParent"><div class="dateHeure"><p>'  . $t_evenement[$i]['jour'] . '</p><p>' . $t_evenement[$i]['mois'] . '</p><p>' . $time[0] . 'h</p></div>';
        
        echo '<div class="eventDetail"><div class="nomImg"><h2>' . $t_evenement[$i]['nom'] . '</h2><i class="fas fa-heart fa-lg"></i><img src="./img/evenements/' . $t_evenement[$i]['image'] . '.jpg"></div>';
        
        echo '<div class="descriptionIns"><div class="description"><p>' . substr($t_evenement[$i]['description'],0,200). '</p><button>Partager</button></div><button class="inscription">S\'inscrire</button></div></div></div>';
    }
?>
</div>


<!--ce script pour le partage  fb-->
<!--<span class="facebook-share" data-js="facebook-share">Partage</span>
   <script type="text/javascript">
var facebookShare = document.querySelector('[data-js="facebook-share"]');

facebookShare.onclick = function(e) {
  e.preventDefault();
  var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
  if(facebookWindow.focus) { facebookWindow.focus(); }
    return false;
}
   </script>

  <div>
      
   <a><h3 type="button" value="Submit Form" onclick= "ConfirmForm();"> s'inscrire</h3></a>
  </div>-->

<!--<div id="BlockUIConfirm" class="BlockUIConfirm">
	<div class="blockui-mask"></div>
	<div class="RowDialogBody">
		<div class="confirm-header row-dialog-hdr-success">
			Confirm Acceptance
		</div>
		<div class="confirm-body">
			vous-etes sur de voloir participer acette evenement ?
		</div>
		<div class="confirm-btn-panel pull-right">
			<div class="btn-holder pull-right">
				<input type="submit" class="row-dialog-btn btn btn-success" value="oui j'Accept" onclick="Submit();" />
				<input type="button" class="row-dialog-btn btn btn-naked" value=" annuller" onclick="$('#BlockUIConfirm').hide();"/>
			</div>
		</div>
	</div>
</div>-->


<!--
<script>
    function ConfirmForm() {
	$("#BlockUIConfirm").show();
}

function Submit() {
	alert("confirmée");
	$('#BlockUIConfirm').hide();
}
</script>
-->
