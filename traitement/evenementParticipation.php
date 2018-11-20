<?php
ob_start();
session_start(); 


require_once('../config.php');
    //on se connecter a la db
try { 
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOExeption $e){
    echo $e->getMessage();         
    $pdo = null ;
    die();
}

if(isset($_SESSION['id'])){
    $statement2 = $pdo->prepare('SELECT * FROM t_participation WHERE idPersonne = :idSession AND t_participation.idEvenement = :idEvenement');  
    $statement2->bindValue(':idSession', $_SESSION['id'], PDO::PARAM_INT);
    $statement2->bindValue(':idEvenement', $_GET['idEvent'], PDO::PARAM_INT);
    $statement2->execute();
    
    $participation = $statement2->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($statement2);
    //var_dump($participation);
    //var_dump($_SESSION['id']);
    //var_dump( $_GET['idEvent']);
    
    if (count($participation) == 0) {
        $statement = $pdo->prepare('INSERT INTO t_participation (idPersonne, idEvenement) VALUES (:idSession, :idEvent)');

        $statement->bindValue(':idSession', $_SESSION['id'], PDO::PARAM_INT);
        $statement->bindValue(':idEvent', $_GET['idEvent'], PDO::PARAM_INT);

        $statement->execute();
    }
}

ob_flush();

?>