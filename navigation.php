<nav>

    <ul id="navigationMenu">
        <li><a href="./portraits.php">Portraits</a></li>
        <li><a href="./evenements.php">Evénements</a></li>
        <li><a href="./ressources.php">Ressources</a></li>
        <li><a href="./infos.php">Infos</a></li>
        <li><a href="./compte.php">Compte</a></li>
    </ul>
    
    <div id="ligneNav"></div>


    <script>
    
        
        var elemChoisiEnCours = null;
        
        navigationMenu.addEventListener('mouseover', function(e){
            if (e.target.tagName == 'A') {
                //console.log(window.innerWidth - e.target.offsetLeft);
                let tailleLigne = (window.innerWidth - e.target.offsetLeft + "px");
                console.log(tailleLigne);
                ligneNav.style.width = tailleLigne;
                
                elemChoisiEnCours = e.target;
                
            }
        });
        
        
        window.addEventListener ("resize",function(e){
            console.log('Resize');
             let tailleLigne = (window.innerWidth - elemChoisiEnCours.offsetLeft + "px");
                console.log(tailleLigne);
                ligneNav.style.width = tailleLigne;
                                                    
        })
        
        
        
    
    </script>
</nav>