<?php
// A t on reçu des données du formulaire ?
if (isset($_POST['email'], $_POST['question'])) {
    // Sont-elles valides ?
    // $_POST['email'] est il un email ?
    // $_POST['message'] est il vide ou trop long ?
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false && $_POST['question'] != '' && strlen($_POST['question'])) {
        // Envoi de mail
        $to = 'webmaster@monsite.be'; // le bénéficicaire
        $subject = 'Un visiteur du site monsite.be a laissé un message';
        $message = 'Un visiteur avec l email ' . $_POST['email'] . ' a laissé le message suivant : ' . $_POST['question'];
        
        // Le résultat est stocké dans un booléen
        $isMailSend = @mail($to, $subject, $message);
        
        // On affiche le résultat pour l'utilisateur
        if ($isMailSend) {
            $result = '<p>Votre message a bien été envoyé. Nous vous recontactons au plus vite :)<p>';
        } else {
            $result = 'Problème technique, retentez votre chance plus tard.';
        }
    } else {
        $result = 'Le formulaire a été mal rempli, nous ne pouvons traiter votre demande';
    }
} else {
    $result = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800,900" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>

    
    <style>
    
        * {
            box-sizing: border-box;
            
        }
        input, textarea, button {  
            display: block;
            width: 150px;
            height: 40px;
            font-family: Verdana, Arial, sans-serif;
            font-size: 16px;
            margin: 10px;
            border: 2px solid #6A3875;
            border-radius: 7px;
            background-color: #ea5920;
            border-color: #ea5920;
            color : #FFFFFF;
        }
        
        input {
            display: block;
            width: 300px;
            font-family: Verdana, Arial, sans-serif;
            font-size: 16px;
            padding: 10px 15px 10px 15px;
            margin: 10px;
            border: 2px solid #6A3875;
            border-radius: 7px;
            color: #6A3875;
            background-color: #FFFFFF;
        }
        
        textarea {
            width: 600px;
            height: 200px;
            resize: none;
            display: block;
            width: 600px;
            font-family: Verdana, Arial, sans-serif;
            font-size: 16px;
            padding: 10px 15px 10px 15px;
            margin: 10px;
            border: 2px solid #6A3875;
            border-radius: 7px;
            background-color: #FFFFFF;
            color: #6A3875;
        }
        
        .error {
            border: 1px solid red;
        }
        
        #figcaption {
            display: flex;
            align-content: center;
        }
        
        h2 {
            font-family: 'Raleway', sans-serif;
        }
        
        h4 {
            font-family: 'Raleway', sans-serif;
            font-weight: 800;
            color: #6A3875;
            
        }
        
        
        
        /* ---------- GRAPHISME CIRCUIT --------- */
        
        #monDiv {

        border-left: 2px solid #ea5920;

        position: relative;

        height: auto;

        }

 

    #monDiv::before {

        content: '';

        display: inline-block;

        position: relative;

        top:100%;

        left: -13px;

        width: 20px;

        height: 20px;

        border-radius: 50%;

        color: white;

        border: 2px solid #ea5920;

        }
        
    </style>
    
</head>
<body>
   
   <h2>Des questions, propositions, envie de participer ? Dites nous tout !</h2>
   <div class="monDiv">
   <h4>Contacts</h4>
    
    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" placeholder="Sujet">

        <textarea name='question' placeholder="Votre message"></textarea>

        <button>Envoyer</button>

        <p><?php echo $result; ?></p>
    </form>
    
    
    <div class="monDiv">
    </div>
    
    
    <h4>Adresse</h4>
    
    <p>
        <figure>
            <a href="https://www.google.fr/maps/place/Rue+Gaucheret+88,+1030+Schaerbeek/@50.8638377,4.3585736,17z/data=!3m1!4b1!4m5!3m4!1s0x47c3c39e03423535:0xb4e58e8abb2713a3!8m2!3d50.8638377!4d4.3607623">
                <img src="./map-illustrator.svg" alt="" target=_blank>
            </a>
            
            <figcaption>Rue Gaucheret, 88 <br> 1030 Schaerbeek</figcaption>
            
        </figure>
    </p>
    </div>
    
    <div class="monDiv">
    <h4>F.A.Q.</h4>
    </div>
    
    <div id="container">
      
      <ul class="faq">
        <li class="q"> Qui sommes-nous ? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
        
        <li class="q"> Le projet ? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
        
        <li class="q"> Comment nous rejoindre ? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
        
        <li class="q"> Lorem ? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
        
        <li class="q"> Lorem ipsum ? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
        
        <li class="q"> Lorem ipsum love love? <img src="img/arrow.png"></li>
        <li class="a">Suspendisse sit amet elit lacinia, feugiat magna at, luctus massa. Aliquam sodales dictum nulla. consectetur adipiscing elit.</li>
      </ul>
    </div>
    
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    
    
</body>
</html>