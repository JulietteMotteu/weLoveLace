<?php
ob_start();

session_start();

include("./includes/header.php");

include("./includes/nav.php");

$listePages = ['portraits', 'evenement', 'ressources', 'infos', 'compte'];

if(isset($_GET['page']) && in_array($_GET['page'], $listePages)) {
    include("pages/" . $_GET['page'] . ".php");
}
/*else {
    include("home.php");
}*/

if(isset($_GET['session'])) {
    include("session/" . $_GET['session'] . ".php");
}
/*else {
    include("./page/home.php");
}*/

include("./includes/footer.php");

ob_flush();
?>