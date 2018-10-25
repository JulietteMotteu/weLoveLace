<!--LOGIN-->

<?php
ob_start();

$msg = '';



// On charge le contenu du fichier config.php
require_once('./config.php');

// On essaie de se connecter à la DB

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage(); // on affiche le message d'erreur
    $pdo = null;            // on détruit le pdo par sécurité
    die('aaaaaarg ça ne fonctionne pas!!!!!!'); // on arrête le script car rien ne marche
}

if (isset($_POST['buttonLog'],$_POST['userLog'], $_POST['pwd'])) {
    // Ici, on devrait rechercher dans la DB le HASH de l'utilisateur approprié
    // Le nom des utilisateurs doit donc être un champ avec une contrainte UNIQUE 
    $userLog = $_POST['userLog'];
    $pwd = $_POST['pwd'];
    $statement = $pdo->prepare('SELECT password FROM t_personne WHERE pseudo = :pseudo');
    $statement->bindValue(':pseudo', $userLog, PDO::PARAM_STR);
    $statement->execute();
    $motDePasse = $statement->fetchAll(PDO::FETCH_ASSOC);
/*    var_dump($motDePasse);*/
    if (count($motDePasse) == 0) {
        $msg = 'Couple Login/MdP invalide.';
    }
    else {
        if (password_verify($_POST['pwd'] , $motDePasse[0]['password'])) {
            //$msg = 'ok';
            session_start();
            $_SESSION['lastAccess'] = time();

            header("Location: ./session_nav1.php"); // Officiellement il FAUT un URL absolu
            die();
        } else {
            $msg = 'Couple Login/MdP invalide.';
        }
    }
}

?>


<!--INSCRIPTION-->

<?php

$msgIns = "";
// On charge le contenu du fichier config.php
require_once('./config.php');

// On essaie de se connecter à la DB

try {
    $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
} catch (PDOException $e) {
    echo $e->getMessage(); // on affiche le message d'erreur
    $pdo = null;            // on détruit le pdo par sécurité
    die('aaaaaarg ça ne fonctionne pas!!!!!!'); // on arrête le script car rien ne marche
}

if (isset($_POST['userIns'], $_POST['pwd1'],$_POST['pwd2']) && $_POST['userIns'] != '' && $_POST['pwd1'] != '' && $_POST['pwd1']==$_POST['pwd2'] ) {
    // On ne sait pas encore le nom de la langue mais on prépare déjà la requête SQL
    $statement = $pdo->prepare('INSERT INTO  t_personne (pseudo, password) VALUES ( :userIns , :passwordIns )');
                            
    $userIns = $_POST['userIns'];
    $passwordIns = $_POST['pwd1']; // !!!! hash
    $hashed_password = password_hash($passwordIns, PASSWORD_DEFAULT);
    // On associe ce qu'on reçu en POST avec le placeholder (:lang)
    $statement->bindValue(':userIns', $userIns, PDO::PARAM_STR);
    $statement->bindValue(':passwordIns', $hashed_password, PDO::PARAM_STR);
    // On exécute la requête SQL
    $statement->execute();
    
  /* var_dump($pdo->errorInfo());*/
    $reponse = $statement->fetchAll(PDO::FETCH_ASSOC);
    
   
}

?>






<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>sign</title>
        <!--LOGIN-->
        <link rel="stylesheet" href="./stylesabrina.css">
        
        
        
    </head>
    
    <body>
       <div>
       <!--LOGIN-->
        <h2>Connexion</h2> 
        
        <form id="formLog" method="post" action="">
            <input type="text" name="userLog" placeholder="LOGIN">
            <br>
            <input type="password" name="pwd" placeholder="PWD">
            <br>
            <button name="buttonLog">Connexion</button>
        </form>
        
        <p> <?php
                echo $msg;
        ?> </p>
        
        
        <!--INSCRIPTION-->
        
        <h2>Inscription</h2>
         <form id='formIns' method="POST" action="">
             <input placeholder="user" type="text" name="userIns" id="user">
             <br>
             <input placeholder="password" type="password" name="pwd1" id="pwd1">
             <br>
             <input placeholder="confirmez votre password" type="password" name="pwd2" id="pwd2">
             <br>
             <button id="buttonIns">Inscription</button>

        </form> 
        </div> 
   <!--LOGIN-->  
    <script>
    var form = document.getElementById('formIns');
    var user = document.getElementById('user');
    var btn = document.getElementById('buttonIns');
    var pwd1 = document.getElementById('pwd1');
    var pwd2 = document.getElementById('pwd2');
    btn.addEventListener("click",function(e){
        
        e.preventDefault();
        if (user.value !='' && pwd1.value==pwd2.value){
            form.submit();
        } else {
            console.log ('mal encodé !!!')
        }
    })
    </script>
    
    </body>
</html>
<?php
ob_flush();
?>