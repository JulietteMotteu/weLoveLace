<?php
ob_start();

session_start();

include("./includes/header.php");

$listePages = ['portraits', 'evenement', 'ressources', 'infos', 'compte'];

if(isset($_GET['page']) && in_array($_GET['page'], $listePages)) {
    include("./includes/nav.php");
    include("pages/" . $_GET['page'] . ".php");
}
else {
    include("./circuit-acueil2.html");
}

if(isset($_GET['session'])) {
    include("./includes/nav.php");
    include("session/" . $_GET['session'] . ".php");
}
else {
    include("./circuit-acueil2.html");
}

include("./includes/footer.php");

ob_flush();
?>