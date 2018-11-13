<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    //on charge le contenu du fichier config.php
    require_once('./config.php');
    //on se connecter a la db
    try { 
        $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
    }   catch (PDOExeption $e){
        echo $e->getMessage();         
        $pdo = null ;
        die();
    }
    $statement = $pdo->query('SELECT * FROM t_women'); 
    $t_women = $statement->fetchAll(PDO::FETCH_ASSOC);
  
?>
<?php
    for($i = 0; $i < count($t_women); $i++){
    echo    "<div>" . $t_women[$i]['nom']           . "</div>" .
            "<div>" . $t_women[$i]['prenom']        . "</div>" .
            "<div>" . $t_women[$i]['dateDeath']     . "</div>" .
            "<div>" . $t_women[$i]['dateBirth']     . "</div>" .
            "<div>" . $t_women[$i]['nationality']   . "</div>" .
            "<div>" . $t_women[$i]['description']   . "</div>" ;
    }
?> 
</body>
</html>