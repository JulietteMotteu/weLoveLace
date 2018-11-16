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

        <div class="intro">
            <i class="fas fa-chevron-left"></i><p>Des questions, propositions, envie de participer ? Dites-nous tout !</p><i class="fas fa-chevron-right"></i>
        </div>
        <div id="mailer">
        <h2>Contact</h2>

            <div id="mailerForm">
                
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Sujet">
                
                <textarea placeholder="Votre message"></textarea>
                
                <button>Envoyer</button>
            </div>
        </div>
    
    
    
        <div id="map">

            <h2>Adresse</h2>
            <figure>
                <a href="https://www.google.fr/maps/place/Rue+Gaucheret+88,+1030+Schaerbeek/@50.8638377,4.3585736,17z/data=!3m1!4b1!4m5!3m4!1s0x47c3c39e03423535:0xb4e58e8abb2713a3!8m2!3d50.8638377!4d4.3607623">
                </a>
                <img src="./img/infos/map.svg" width="500" height="500" alt="map" usemap="#infomap">

                <map name="infomap">
                    <area shape="rect" coords="200,190,285,276" href="https://www.google.fr/maps/place/Rue+Gaucheret+88,+1030+Schaerbeek/@50.8638377,4.3585736,17z/data=!3m1!4b1!4m5!3m4!1s0x47c3c39e03423535:0xb4e58e8abb2713a3!8m2!3d50.8638377!4d4.3607623" alt="map">
                </map> 


                <figcaption>
                    <i class="fas fa-map-marker-alt fa-lg"></i>
                    <address>Rue Gaucheret, 88<br>
                    <span>1030 Schaerbeek</span></address>
                </figcaption>
            </figure>
        </div>
    
    
        <div id="faqParent">

        <h2>F.A.Q.</h2>
  
            <div id="containerFaq">

                <ul class="faq">
                    <li class="q"> Qui sommes-nous ?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!</li>

                    <li class="q"> Le projet ?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!</li>

                    <li class="q"> Comment nous rejoindre ?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!</li>

                    <li class="q"> Lorem ?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!.</li>

                    <li class="q"> Lorem ipsum ?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!.</li>

                    <li class="q"> Lorem ipsum love love?<a class="arrow-down-close" onclick="openDropdown(this)"></a></li>
                    <li class="a">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis reprehenderit suscipit repellendus cupiditate autem adipisci inventore, ullam cumque excepturi illum dolore ut nesciunt omnis fugiat libero, hic quisquam molestiae aut repellat maiores eaque. Dolor ipsam esse harum labore debitis iste, nesciunt saepe voluptatibus cupiditate rerum nostrum animi, deserunt quidem possimus perspiciatis qui velit ducimus, aut temporibus? Ex illo explicabo dolorem quisquam facere? Officia non sunt nihil obcaecati reprehenderit, eligendi saepe asperiores doloribus aut perferendis, delectus exercitationem placeat enim modi quis assumenda ducimus laudantium nostrum! Natus consequatur, quam veniam. Accusamus et similique sed officia ipsum voluptatibus eum, vero voluptates cumque earum!</li>
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

    // Arrow - Close
    function openDropdown(element){
        element.classList.toggle('open');
        document.getElementsByTagName('body')[0].classList.toggle('open');
    };
    
</script>
</body>
</html>