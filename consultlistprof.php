<?php

session_start();

include "conf-ionos.php";

 if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
    {

    }

    $iduser= $_GET['id'];

 	$sqlQuery = "SELECT date,id FROM CR WHERE id_utilisateur= '$iduser' ";
	$cr = $connexion->query($sqlQuery);
	$rows = $cr->fetch_all(MYSQLI_ASSOC);

    $requete2= "SELECT * FROM UTILISATEUR,CR WHERE UTILISATEUR.id = CR.id_utilisateur AND id_utilisateur = '$iduser'";
    $resultat = mysqli_query($connexion, $requete2);
    while($donnees = mysqli_fetch_assoc($resultat))
        {

            $prenom = $donnees['prenom'];
            $nom = $donnees['nom'];
        } 



?>

<html>
        <head>
                    <link rel="stylesheet" href="stage.css">
        </head>
<style>
body {
  background-color: BlanchedAlmond;
}
</style>





        	<center> <h3> Liste des comptes rendus de: <?php echo $prenom . " "; echo $nom; ?> </h3> </center>
            <?php foreach ($rows as $row) {
            ?>
            <div> <center>
            <a href= "compterendu.php?id=<?php echo $row['id'];?>"> Compte rendu du: <?php echo $row['date']; ?> <br> <br> </a>  
            
            <?php } ?>


        <form action= "elevelist.php">
            <input type= "submit" style="width: 180px; height: 25px;" value= "Retourner a la liste d'élèves"> </input>
        </form>
        </center>
        </div>


</body> 
</html>  

