
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
        echo '<div class="eventParent"><div class="dateHeure"><p>' .$t_evenement[$i]['heure'] . '</p><p>'  . $t_evenement[$i]['jour'] . '</p><p>' . $t_evenement[$i]['mois'] . '</p></div>';
        
        echo '<div class="eventDetail"><div class="nomImg"><h2>' . $t_evenement[$i]['nom'] . '</h2><i class="far fa-heart fa-2x"></i><img src="./img/evenements/' . $t_evenement[$i]['image'] . '.jpg"></div>';
        
        echo '<div class="descriptionIns"><div class="description"><p>' . substr($t_evenement[$i]['description'],0,200). '</p><button>Partager</button></div><button class="inscription">S\'inscrire</button></div></div></div>';
    }
?>
</div>

<?php
//    $description  = "";
//    $pieces = explode(" ", $description);
//    echo $pieces[0]; // piece1
//    echo $pieces[1]; // piece2
//    $t_evenement($heur, $min, $secende) = explode('.', $row_Recordset1['heure']);
//    // affichage du heure
//    echo $heur. "H";
//    
//function break_date($date)
//	{
//		$date = explode('-',str_replace('/','-',$date)); 
//		return $date[1].'-'.$date[2].'-'.$date[0];
//	}
//    $t_evenement = "Y-m-d H:i:s";
//$t_evenement = explode(" ",$t_evenement);
//$date = $t_evenement[1];
//$date = $t_evenement[2];
//$heure = $t_evenement[0];
    
//$date = date('Y-m-d',strtotime($timestamp));
//$time = date('H:i:s',strtotime($timestamp));
    
// $date = explode('-',$date); // pour virer le caractère /
//  $date = new Datetime($date);
//  $datenaissance = $date->format('Y-m-d'); //format mysql
//                        $date = "y-d-m"; 
//                        $date = explode('-', $date);    

?>


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

<div id="coeur1">
    <input type="checkbox" id="like"/>
    <label for="like">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M12 21.35l-1.45-1.32c-5.15-4.67-8.55-7.75-8.55-11.53 0-3.08 2.42-5.5 5.5-5.5 1.74 0 3.41.81 4.5 2.09 1.09-1.28 2.76-2.09 4.5-2.09 3.08 0 5.5 2.42 5.5 5.5 0 3.78-3.4 6.86-8.55 11.54l-1.45 1.31z"/>
    </svg>
</label>
</div>
