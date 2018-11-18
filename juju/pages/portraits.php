<div id="portraitSection">

    <div class="intro">
        <i class="fas fa-chevron-left"></i><p>Les badass oubliées qui ont révolutionné le monde (de l'IT) !</p><i class="fas fa-chevron-right"></i>
    </div>
    <div id="timeline">
        <?php
        //on charge le contenu du fichier config.php
        require_once('./config.php');
        //on se connecter a la db
        try { 
            $pdo = new PDO(MYSQL_DSN, DB_USER, DB_PWD);
        }   catch (PDOExeption $e){
            echo $e->getMessage();         
            $pdo = null ;
            die();
        }
        $statement = $pdo->query('SELECT * FROM t_women ORDER BY dateBirth ASC'); 
        $t_women = $statement->fetchAll(PDO::FETCH_ASSOC);

        ?>
        <?php
        for($i = 0; $i < count($t_women); $i++){
            echo '<div class="timeline-item">';
            if($i % 2 == 0) {
                echo  '<div class="timeline-content left">';
            }
            else {
                 echo  '<div class="timeline-content right">';
            }
            echo '<a href="./img/portraits/' . $t_women[$i]['image'] . '.png"><img class="portraitImg" src="./img/portraits/' . $t_women[$i]['image'] . '.png" alt=""></a><h2>' . $t_women[$i]['prenom'] . ' ' . $t_women[$i]['nom'] . '</h2><p class="datePortrait">' . $t_women[$i]['dateBirth'] . '-' . $t_women[$i]['dateDeath'] . '</p><p class="profession">' . ucfirst($t_women[$i]['profession']) . '</p><p class="nationalite">' . $t_women[$i]['nationality'] . '</p><button class="descriptionBtn" id="' . $t_women[$i]['idWomen'] . '"><i class="fas fa-chevron-right fa-rotate-90"></i><span>Découvrir la badass !</span></button><p class="portraitDesc visible" id="' . $t_women[$i]['idWomen'] . '">' . $t_women[$i]['description'] . '</p>' .  '</div></div>';
        }
        
        ?> 
        
    </div>
</div>

<script>
            
    timeline.addEventListener('click', function(e){
        if (e.target.className == 'descriptionBtn') {
            var portrait = document.getElementsByClassName('portraitDesc');
            for (let i=0; i<portrait.length; i++) {
                if (e.target.id == portrait[i].id) {
                    console.log(e.target);
                    if (portrait[i].classList.contains("visible"))
                    {
                        portrait[i].classList.remove("visible");
                    }

                    else {
                        portrait[i].classList.add("visible"); 
                    }
                }
            }
        }
    });
                
</script>
        
    