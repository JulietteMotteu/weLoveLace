<?php

include("./includes/header.php");

include("./includes/nav.php");

$listePages = ['portraits', 'evenement', ];

if(isset($_GET['page'])) {
    include("pages/" . $_GET['page'] . ".php");
}
/*else {
    include("./page/home.php");
}*/

include("./includes/footer.php");

?>