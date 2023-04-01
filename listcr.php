<?php

	session_start();


	include "conf-ionos.php";

    $id = $_SESSION['id'];


    if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
    {
        //echo "Vous etes connecté a la BDD";
    }


	$sqlQuery = "SELECT date,id FROM CR WHERE id_utilisateur= '$id' ";
    $cr = $connexion->query($sqlQuery);
    $rows = $cr->fetch_all(MYSQLI_ASSOC);

?>

<html>
        <head>
                    
                <style>
                body {
                  background-color: Blanchedalmond;
                }
                </style>

                <link rel="stylesheet" href="stage.css">

        </head>
<body>

<div class="header">
  <h1>Stage Review</h1>
</div>
        
        <center> <h3> Liste de mes comptes rendus:</h3> </center>
            <?php foreach ($rows as $row) {
            ?>
            <div> <center>
            <a href= "compterendu.php?id=<?php echo $row['id'];?>"> Compte rendu du: <?php echo $row['date']; ?> <br> <br> </a>  
            
            <?php } ?>


        <form action= "eleve.php">
            <input type= "submit" style="width: 180px; height: 25px;" value= "Retourner a l'accueil"> </input>
        </form>
        </center>
        </div>


</body> 
</html>  

