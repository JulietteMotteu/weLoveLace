<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    #1events{
        width:60%;
        height:70%;
    }
    h1{
        color: white;
        background-color:#F15A22;
        text-align:center;
        width: 340px;
        height: 90px;
    }
    img{
/*        la taille de img */
        width: 400px;
        height:90px;
/*        por positione img droit avec h1*/
         position: relative;
        top: 21px;
    }
/*    cette  div class pour atelieh1 et img*/
    .atelimg{
        display: flex;
         flex-direction: row;
    }
/*    cette h3 est pour sinscrire */
    h3{
        height: 80px;
        width: 150px;
        color: white;
        text-align: center;
        background-color:#F15A22;
        position: relative;
        left: 911px;
        bottom: 41px;
    }
/*    cette clas est pour le paratexte*/
    #divPara1{
        position: relative;
        bottom: 130px;
    }
   #divPara1 > a{
        position: relative;
        left: 750px;
    }
</style>
<body>
<!-- mon premier events -->
 <div id="1events">
   <div class="atelimg">
        <h1>Atelier Java Script</h1>
        <img src="img/even1.jpg" alt="image"> 
   </div>
    <h3>S'inscrire +</h3>
    <div id="divPara1">
        <p> 
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius adipisci, voluptatibus illum necessitatibus reiciendis <br>  minima quae deleniti, perspiciatis quibusdam quisquam sequi tempora vel commodi expedita ex dolor.lorem <br> optio tempora quibusdam
        </p>
        <a href="#">Partager</a>
    </div>
    <h2>03 <br> 08 <br> VEN <br> 18h </h2>
     
 </div>   
</body>
</html>