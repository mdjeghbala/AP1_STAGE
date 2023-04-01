<?php

session_start();

include "conf-ionos.php";

$idcr= $_GET['id'];

$id = $_SESSION['id'];

 if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
    {
        //echo "Vous etes connecté a la BDD";
    }


	$date = date('Y-m-d H:i:s'); 
	setlocale(LC_TIME, "fr_FR", "French");
	$dateFR= utf8_encode(strftime("%A %d %B %Y, %H:%M", strtotime($date)));	
	
    if (isset($_POST['envoyercommentaire']))
        {
        	$contenu_commentaire = $_POST['commentaire'];
        	$requete = "INSERT INTO COMMENTAIRE (contenu, datecom, id_compterendu, id_utilisateur) VALUES ('$contenu_commentaire', '$dateFR','$idcr' ,'$id')";
		    if (!mysqli_query($connexion,$requete)) 
        	{
            	echo "<br>Erreur : ".mysqli_error($connexion)."<br>";
       	 	}
       	 	else
       	 	{
       	 		echo "<font color=limegreen> Votre commentaire a bien été posté </font>";
       	 	}



        }


        $requete2 = "SELECT DISTINCT datecom,contenu,id_utilisateur,login FROM COMMENTAIRE,UTILISATEUR WHERE COMMENTAIRE.id_utilisateur= UTILISATEUR.id AND id_compterendu = '$idcr' ";
	    $comm = $connexion->query($requete2);
	    $rows = $comm->fetch_all(MYSQLI_ASSOC);	
	  

?>



<html>
<head>
		<title> Commentaires du projet </title>
		<meta charset="UTF-8">
        <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>
</head>
<body>
        <br> <br> <br> <br> <br> <br>
		<div align = 'center'>
			<form action='commentaire.php?id=<?php echo $idcr;?>' method="POST">                                      	                                         
		     <input type="text" style="width: 320px; height: 80px;" name = "commentaire" placeholder="Ajouter un commentaire" /> <br>
		     <input type="submit" style="width: 120px; height: 25px;" name= "envoyercommentaire" values= "Envoyer">
		    </form>
		</div>

		<div align = "center"> 
		<h3> <font color= teal > Liste des commentaires:</h3> </font>
	        <?php foreach ($rows as $row) {
	      
	           echo " <p style = font-weight:bold > " . $row['login'] . ":  " . $row['contenu'] . "   <font color= lightsalmon > posté le:   " . $row['datecom'] . "  </font>" ; ?>  
	           
	          
	        
	    <?php } ?>
		</div>








