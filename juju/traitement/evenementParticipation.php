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
    $statement2 = $pdo->prepare('SELECT * FROM t_participation WHERE idPersonne = :idSession');  
    $statement2->bindValue(':idSession', $_SESSION['id'], PDO::PARAM_INT);
    $statement2->execute();
    
    $participation = $statement2->fetchAll(PDO::FETCH_ASSOC);
    
    if (count($participation) == 0) {
        $statement = $pdo->prepare('INSERT INTO t_participation (idPersonne, idEvenement) VALUES (:idSession, :idEvent)');

        $statement->bindValue(':idSession', $_SESSION['id'], PDO::PARAM_INT);
        $statement->bindValue(':idEvent', $_GET['idEvent'], PDO::PARAM_INT);

        $statement->execute();
    }
    else {
        echo json_encode($participation);
    }
}

ob_flush();

?>