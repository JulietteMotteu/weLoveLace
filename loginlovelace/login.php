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

if (isset($_POST['buttonlog'],$_POST['userlog'], $_POST['pwd'])) {
    // Ici, on devrait rechercher dans la DB le HASH de l'utilisateur approprié
    // Le nom des utilisateurs doit donc être un champ avec une contrainte UNIQUE 
    $user = $_POST['userlog'];
    $pwd = $_POST['pwd'];
    $statement = $pdo->prepare('SELECT password FROM t_personne WHERE pseudo = :pseudo');
    $statement->bindValue(':pseudo', $user, PDO::PARAM_STR);
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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>PHP - Authetification</title>
        <style>
            input, button {
                margin: 10px;
                padding: 10px;
            }
            
            p {
                margin: 10px;
                padding: 10px;
                background-color: #e5e5e5;
                border: 1px solid #c3c3c3;
                border-radius: 3px;
            }
            
            p:empty {
                display: none;
            }
        </style>
    </head>
    
    <body>
        <h1>login</h1> 
        
        
        
        
        
      
        <form method="post" action="">
            <input type="text" name="userlog" placeholder="LOGIN">
            <br>
            <input type="password" name="pwd" placeholder="PWD">
            <br>
            <button name="buttonlog">Log In</button>
        </form>
        
        <p> <?php
                echo $msg;
        ?> </p>
    </body>
</html>
<?php
ob_flush();
?>