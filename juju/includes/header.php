<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta charset="UTF-8">
    <title>Ressources</title>
    <link rel="stylesheet" href="./style/normalize.css">
    <!-- Ici le CSS pour les plugins -->
    <link rel="stylesheet" href="./style/jquery/magnific-popup.css">
    <link rel="stylesheet" href="./style/jquery/faq.css">
    <!-- Ici on met le fichier CSS compilé -->
    <link rel="stylesheet" href="./style/stylejuju.css">
    <link rel="stylesheet" href="./style/fontAwesome/css/all.css">
     <link rel="icon" href="./img/logo/logo_url.png" type="image/png"> 
    <!-- Ici les fichiers JS -->
    <script src="./js/jquery/jquery-3.3.1.min.js"></script>
    <script src="./js/jquery/jquery.magnific-popup.js"></script>
    <script src="./js/jquery/script.js"></script>

</head>

<body>
    <div id="headerTop">
        <div id="logo">
           <a href="./index.php"><img src="./img/logo/logo_nom.png" alt=""></a>
        </div>

        <div id="leftLinks">
               <a href="">EN</a>
               <a href="">FR</a>

           <?php

            if (isset($_SESSION['pseudo'])) {
                echo '<a href="?session=session_logout">Sign out<i class="fas fa-user"></i></a>';
                echo '<p id="welcomePseudo">Bienvenue ' . $_SESSION['pseudo'] . ' You\'re badass !</p>';
            }
            else {
                echo '<a href="?session=inscriptionlogin">Sign<i class="fas fa-user"></i></a>';
            }

           ?>
        </div>
    
        <div id="top">
            <a href="#" class="to-top"><span><i class="fas fa-angle-up"></i> </span></a>
        </div>

<script>
    $(document).ready(function() {
        $('.to-top').click(function() {
            $('html, body').animate({scrollTop: 0}, 300);
        })
    });
</script>

    </div>