<!--LOGIN-->

<?php
ob_start();

$msg1 = '';
$msg2 = '';



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
    $statement = $pdo->prepare('SELECT id, password, pseudo FROM t_personne WHERE pseudo = :pseudo');
    $statement->bindValue(':pseudo', $userLog, PDO::PARAM_STR);
    $statement->execute();
    $motDePasse = $statement->fetchAll(PDO::FETCH_ASSOC);
/*    var_dump($motDePasse);*/
    if (count($motDePasse) == 0) {
        $msg1 = 'Couple Login/MdP invalide.';
    }
    else {
        if (password_verify($_POST['pwd'] , $motDePasse[0]['password'])) {
            //$msg = 'ok';
            $_SESSION['lastAccess'] = time();
            $_SESSION['pseudo'] = $motDePasse[0]['pseudo'];
            $_SESSION['id'] = $motDePasse[0]['id'];
            
            header("Location: ./index.php?page=compte"); // Officiellement il FAUT un URL absolu
            
        } else {
            $msg1 = 'Couple Login/MdP invalide.';
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
    $error = $statement->errorInfo();
    if ($error[1] != null) {
        $msg2 = 'Ce login est déjà utilisé, veuillez en choisir un autre';    
    }
    else {
        $reponse = $statement->fetchAll(PDO::FETCH_ASSOC);

        $msg2 = 'Votre compte a été créé';
        // Ouvrir session
        
    }
}

?>
    
<div id="sign">

    <div>
       <!--LOGIN-->
        <div>

           <h2>Connexion</h2>

            <form id="formLog" method="post" action="">
                <input type="text" name="userLog" placeholder="pseudo">

                <input type="password" name="pwd" placeholder="password">

                <button name="buttonLog">Connexion</button>
            </form>

            <p> 
                <?php
                echo $msg1;
                ?> 
            </p>
        </div>    



            <!--INSCRIPTION-->

        <div>  
            <h2>Inscription</h2>
            <form id='formIns' method="POST" action="">
                 <input placeholder="pseudo" type="text" name="userIns" id="user">

                 <input placeholder="password" type="password" name="pwd1" id="pwd1">

                 <input placeholder="confirmez votre password" type="password" name="pwd2" id="pwd2">

                 <button id="buttonIns">Inscription</button>

            </form>
            <p id="message2">
                <?php
                echo $msg2;
                ?>
            </p> 

        </div>
    </div>  
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
        if (user.value !='' && pwd1.value==pwd2.value &&  pwd1.value !='' &&  pwd2.value !=''){
            form.submit();
        } else {
            var messageForm = document.createTextNode('Veuillez insérer des mots de passe identiques');
            message2.appendChild(messageForm);
        }
    })
</script>

<?php
ob_flush();
?>