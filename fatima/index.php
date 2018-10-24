<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="design/style.css">
    <title>Document</title>
</head>
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
    $statement = $pdo->query('SELECT * FROM t_evenement');  
    $t_evenement = $statement->fetchall(PDO::FETCH_ASSOC);
?>
<?php
    
  for($i = 0; $i < count($t_evenement); $i++){
      echo   "<div class='atelimg'>" . "<h1>" . $t_evenement[$i]['nom'] . "</h1>" . "</div>" .
             "<div>" . "<p>" .  "le lieu  :" . $t_evenement[$i]['lieu'] .  
             "<div>" . "<p>" .  "le heure  :" . $t_evenement[$i]['heure'] . 
             "date de sorti  est :" . $t_evenement[$i]['date'] .
             "<div id='divPara1'> . 'description est :'" . $t_evenement[$i]['description'] . "</p>" . "</div>".
             "type est :" . $t_evenement[$i]['type'];
       
  }  
?> 






<body>
<!-- mon premier events -->
 <div id="1events">
   <div class="atelimg">
        <h1>Atelier Java Script</h1>
        <img src="img/even1.jpg" alt="image"> 
   </div>
    <h3>S'inscrire +</h3>
    <div id="divPara1">
        <p> 
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius adipisci, voluptatibus illum necessitatibus reiciendis <br>  minima quae deleniti, perspiciatis quibusdam quisquam sequi tempora vel commodi expedita ex dolor.lorem <br> optio tempora quibusdam
        </p>
        <a href="#">Partager</a>
    </div>
    <h2>03 <br> 08 <br> VEN <br> 18h </h2>
     
 </div>   
</body>
</html>