<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<button data-id="' .  $t_evenement[$i]['id'] . '" class="boutonLike"><i class="fas fa-heart fa-lg">inscrire</i></button>
<script>
eventSection.addEventListener('click', function(e){
        
        var xhr = new XMLHttpRequest();
        
        xhr.onreadystatechange = function (){
			if (xhr.readyState == 4){
				if (xhr.status == 200){
					console.log (xhr.responseText);
                    if (e.target.className == 'boutonLike') {
                        e.target.disabled = "disabled";
                    }
				}
				else {
					console.log ("Erreur dans AJAX");
				}
			}
		}
		
		xhr.open ("GET", "config.php?idEvent=" + e.target.getAttribute('data-id'));
		xhr.send (null);
        
    });
</script>
</body>
</html>

