<?php

session_start();

include "conf-ionos.php";


if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
        
      echo " <center> <br> <br> Bienvenue " . $_SESSION['prenom'] . " " .$_SESSION['nom'] . "</center> <br> <br> "; 

    }




?>
<div> <center>
<html>
<head>
    <title> Prof </title>
    <meta charset="utf-8">
   <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>
</head>
<body>

 <a href= "elevelist.php" > Voir la liste des élèves </a> <br> <br>
 <a href= "perso.php"> Voir informations personnelles </a> <br> <br>

<form action= "deconnexion.php" method ="POST">
<input type="submit" name="deconnect" value="Deconnexion"> <br> <br>

<h2> Les 5 derniers compte rendus qui ont été crée sont les suivants: </h2>

<?php


        $requete = "SELECT CR.id,login,date FROM CR,UTILISATEUR WHERE CR.id_utilisateur = UTILISATEUR.id ORDER BY CR.id DESC LIMIT 5";
        $recentcr = $bdd->query($requete);
        $rows = $recentcr->fetch_all(MYSQLI_ASSOC);


         foreach ($rows as $row) 
         { ?>
             <center> <a href= " compterendu.php?id=<?php echo $row['id'] ?> " > <?php echo $row['login'] ?> a ajouté récemment un compte rendu le: <?php  echo $row['date']  ?> </a>  <br> <br> </center>

        <?php }  ?>




</body>
</html>
</center>
</div>
