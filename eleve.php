<?php

session_start();


include "conf-ionos.php";


if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
        
      echo " <br> <br> Bienvenue " . $_SESSION['prenom'] . " " .$_SESSION['nom'];

    }


?>

<html>
<head>
    <title> Eleve </title>
    <meta charset="utf-8">
    <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>
</head>
<body>
  
<?php
    

//?>



<br> <br> <br>

<form action= "listcr.php" method ="POST">
<input type="submit" value="Liste de mes comptes rendus" name= "listcr" > <br> </form>
<form action= "createcr.php" method ="POST">
<input type="submit" value="Creer un compte rendu" name= "createcr" > <br> </form>
<br> <br> <a href='perso.php'>Lien vers info perso</a> <br> <br> 
<form action= "deconnexion.php" method ="POST">
<input type="submit" name="deconnect" value="Deconnexion"> </input>




</body>
</html>
