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
        
        navigationMenu.addEventListener('mouseover', function(e){
            if (e.target.tagName == 'A') {
                let tailleLigne = (window.innerWidth - e.target.offsetLeft - 25 + "px");
                ligneNav.style.display = 'inline-block';
                ligneNav.style.width = tailleLigne;
                ligneNav.style.transition = "0.3s";
                elemChoisiEnCours = e.target;
            }
            
        });
        ligneNav.style.width = 0;
        
        
        
        window.addEventListener ("resize",function(e){
            console.log('Resize');
                let tailleLigne = (window.innerWidth - elemChoisiEnCours.offsetLeft - 25 + "px");
                console.log(tailleLigne);
                ligneNav.style.width = tailleLigne;
                                                    
        })
        
        
        
    
    </script>
</nav>