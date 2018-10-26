<nav>

    <ul id="navigationMenu">
        <li><a href="./portraits.php">Portraits</a></li>
        <li><a href="./evenements.php">Evénements</a></li>
        <li><a href="./ressources.php">Ressources</a></li>
        <li><a href="./infos.php">Infos</a></li>
        <li><a href="./compte.php">Compte</a></li>
    </ul>
    
    <div id="ligneNav"></div>
    
    <div id="monDiv"></div>


    <script>
    
        
        var elemChoisiEnCours = null;
        
        // Comment faire l'anim quand la ligne n'est pas encore là?
        
        navigationMenu.addEventListener('mouseover', function(e){
            if (e.target.tagName == 'A') {
                let tailleLigne = (window.innerWidth - e.target.offsetLeft - 25 + "px");
                ligneNav.style.width = tailleLigne;
                elemChoisiEnCours = e.target;
            }
            ligneNav.style.opacity = 1;
            ligneNav.style.transition = "0.3s";
        });
        
        window.addEventListener ("resize",function(e){
            console.log('Resize');
                let tailleLigne = (window.innerWidth - elemChoisiEnCours.offsetLeft - 25 + "px");
                console.log(tailleLigne);
                ligneNav.style.width = tailleLigne;
                                                    
        })    
    
    </script>
</nav>