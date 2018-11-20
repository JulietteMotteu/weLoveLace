<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>
    
    <nav id="navigation1" class="navigation">

    <ul id="navigationMenu">
        <li><a href="?page=portraits">Portraits</a></li>
        <li><a href="?page=evenement">Evenements</a></li>
        <li><a href="?page=ressources">Ressources</a></li>
        <li><a href="?page=infos">Infos</a></li>
        <li><a href="?page=compte">Compte</a></li>
    </ul>
    
    <div id="ligneNav"></div>
    
    <div id="monDiv"></div>


    <script>
    
        var elemChoisiEnCours = null;
        
        navigationMenu.addEventListener('mouseover', function(e){
            if (e.target.tagName == 'A') {
                let tailleLigne = (window.innerWidth - e.target.offsetLeft - 25 + "px");
                ligneNav.style.width = tailleLigne;
                elemChoisiEnCours = e.target;
            }
            ligneNav.style.opacity = 1;
            ligneNav.style.transition = "0.3s";
        });
        
        navigationMenu.addEventListener('mouseleave', function(e){
            ligneNav.style.width = "0px";
            ligneNav.style.transition = "0.7s";
            ligneNav.style.opacity = 0;
        });
        
        window.addEventListener ("resize",function(e){
            console.log('Resize');
                let tailleLigne = (window.innerWidth - elemChoisiEnCours.offsetLeft - 25 + "px");
               /* console.log(tailleLigne);*/
                ligneNav.style.width = tailleLigne;
                                                    
        })    
    
    </script>
</nav>