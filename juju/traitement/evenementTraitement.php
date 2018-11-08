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

if (isset($_SESSION['id'])) {
$statement = $pdo->prepare('INSERT INTO t_like (idPersonne, idEvenement) VALUES (:idSession, :idEvent)');

$statement->bindValue(':idSession', $_SESSION['id'], PDO::PARAM_INT);
$statement->bindValue(':idEvent', $_GET['idEvent'], PDO::PARAM_INT);

$statement->execute();
}

ob_flush();

?>