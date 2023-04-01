<?php

session_start();

include "conf-ionos.php";


if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
        //echo "vous etes connecté";

    }


       $date = date('Y-m-d H:i:s'); 
	   setlocale(LC_TIME, "fr_FR", "French");
	   $dateFR= utf8_encode(strftime("%A %d %B %Y, %H:%M", strtotime($date)));

		$id = $_SESSION['id'];


        if (isset($_POST['valider']))
        	{
            	$descriptif= $_POST['descriptif'];
                $note = $_POST['note'];
            	//echo $descriptif;

            	$requete = "INSERT INTO CR (descriptif, date, id_utilisateur,note) VALUES ('$descriptif', '$dateFR', '$id', $note)";

                        if ( ($note > 5) || ($note<1))  {
                            echo "Veuillez saisir une note entre 1 et 5";
                        }
         
                   	 	else
                   	 	{
                             if (!mysqli_query($bdd,$requete)) 
                    	{
                        	echo "<br>Erreur : ".mysqli_error($bdd)."<br>";
                   	 	}
                   	 		echo " <font color = limegreen > Votre compte rendu a bien éte inséré </font> ";
                   	 	}
                     


    }



?>

<html>
<head>
        <title>  Creer un compte rendu </title>
    <meta charset="UTF-8">
   <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>
</head>
<body>	
            

            <br> <br>
			<form action= "createcr.php" method="POST">
			<center>  <h2 style='color:#5C6566 '> Ecrivez votre compte rendu </h2> <img src = 'images/ecrire.png' '60px' height ='60px' > </center> <br>
			<center> <textarea  name = "descriptif" rows="25" cols="75" :> </textarea> <br> <br>
                      <input type="text" style="width: 470px; height: 80px;" name = "note" placeholder="Attribuez vous une note entre 1 et 5 selon la satisfaction de votre journée " /> <br> <br>
					 <input type= "submit" name="valider" value= "Insérer"> 
			 </center>
			<br> <br> <br>

            
			<center> <a href= "eleve.php" > Cliquez pour retourner a l'accueil </a> </center>
			</textarea>	
			</form>

	
</body>
</html>
