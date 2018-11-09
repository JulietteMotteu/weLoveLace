<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Infos</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./stylemelissa.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script>
    
        $(document).ready(function(){
            
            $('button').on('click', function(e){
                
                var monEmail = $('input').val();
                var monMsg = $('textarea').val();
                var monFormEstValide = true;
                
//                console.log(email,msg);
            
                if (monEmail != '') {
                    $('input').removeClass('error');
                }
                else {
                    $('input').addClass('error');
                    monFormEstValide = false;
                }
                
                if (monMsg != '') {
                    $('textarea').removeClass('error');
                }
                else {
                    $('textarea').addClass('error');
                    monFormEstValide = false;
                }
                
                
            //Call Ajax
                
                if (monFormEstValide) {
            
                    $.ajax ({
                        url      : './envoiemailwelovelace.php',
                        type     : 'POST',
                        dataType : 'json',
                        data : {
                            email : monEmail, // <input type = "texte" name="email" value="...">
                            msg   : monMsg
                        },
                        success: function(data) {
                            console.log(data);
                            $('p').html('Merci, votre message a bien été envoyé !');
                        },
                        error: function() {
                            $('p').html('Désolé, problème technique');
                            for (var i = 0; i < arguments.length; i++) {
                            }

                        },
                        complete : function() {}
                        
                    })
                }    
            })
        })
        
    
    </script>
    
</head>
<body>
   
   <div id="info">
   
   <div id="mailer">
   <h1> <span>&lt;</span>Des questions, propositions, envie de participer ? Dites nous tout ! <span>&gt;</span></h1>
   
   <h2>Contacts</h2>
    
    <input type="text" placeholder="Email">
    <input type="text" placeholder="Sujet">
    
    <textarea placeholder="Votre message"></textarea>
    
    <button>Envoyer</button>
    
    <p></p>
    
    </div>
    
    
    
    <div id="map">
    
    <h2>Adresse</h2>
    
    <p>
        <figure>
            <a href="https://www.google.fr/maps/place/Rue+Gaucheret+88,+1030+Schaerbeek/@50.8638377,4.3585736,17z/data=!3m1!4b1!4m5!3m4!1s0x47c3c39e03423535:0xb4e58e8abb2713a3!8m2!3d50.8638377!4d4.3607623">
                <img src="./img/infos/map-illustrator.svg" alt="" target=_blank>
            </a>
            
            <figcaption>Rue Gaucheret, 88 <br> 1030 Schaerbeek</figcaption>
            
        </figure>
    </p>
    
    </div>
    
    
    <div id="faq">
    
    <h2>F.A.Q.</h2>
  
    
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
    </div>
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