<?php

// on envoie du JSON

// on ne met jamais le fichier en cache
header("Cache-Control: no-cache");

// on n'envoit plus de texte ou de l'HTML mais bien du JSON.
header('Content-Type: application/json');

// recevoir du POST
    
if (isset($_POST['email'], $_POST['msg'])){
    
    // on vérifie la pertinence
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false && $_POST['msg'] != '') {
        
        //on fait un minimum syndical de sécurité
        $email = $_POST['email'];
        
        // On enlève les espaces devant et derriere et les balises HTML
        $message = trim(strip_tags($_POST['msg']));
        
        $recipient = 'collignon.d@gmail.com'; // la personne qui recçoit le mail
        $title = 'WeLoveLace.be - Nouveau message du formulaire de contact';
        $body = 'Le contact suivant : ' . $email . ' a posé la question suivante : ' . $message;
        
//        if (@mail($recipient, $title, $body)) { /// !!!! MAC A VOIR
        if (true) {
            echo '{"resultat" : "Ok"}';
        }
        else {
            // Erreur : probleme technique du Daemon Mailou du serveur Apache
            echo '{"resultat" : "NOK Tech prob"}';
        }
        
    }
    else {
        // Erreur : j'ai rien reçu des mauvaises valeurs en POST
        echo '{"resultat": "NOK bad value"}';
        }
        
}

else {
    // Erreur : je n'ai rien reçu en POST
    echo '{"resultat": "NOK"}';
    }
    



?>