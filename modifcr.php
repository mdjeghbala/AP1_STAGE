<?php

session_start();

include "conf-ionos.php";

$id = $_SESSION['id'];

$idcr= $_GET['id'];




if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
     
        $date = date('Y-m-d'); // Date du jour
		setlocale(LC_TIME, "fr_FR", "French");
		$dateFR= utf8_encode(strftime("%A %d %B %G", strtotime($date)));
		//echo $dateFR;



        if (isset($_POST['validermodif']))
        	{
                $descriptif= $_POST['descriptif'];
            	$requete = "UPDATE CR SET descriptif= '$descriptif' WHERE id= '$idcr'  ";
					   if (!mysqli_query($bdd,$requete)) 
                    	{
                        	echo "<br>Erreur : ".mysqli_error($bdd)."<br>";
                   	 	}
                   	 	else
                   	 	{
                   	 		echo " <center> <font color=limegreen> Votre compte rendu a bien éte modifié ! </font> </center>";
                   	 	}
			
			}		

						$sqlQuery = "SELECT descriptif,id FROM CR WHERE id= '$idcr' ";
						$cr = $bdd->query($sqlQuery);
						$rows = $cr->fetch_all(MYSQLI_ASSOC);
	    }



?>

<html>
<head>
    <title> Modifiez votre compte rendu </title>
    <meta charset="utf-8">
    <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>    
</head>
<body>	
			 <?php foreach ($rows as $row) {
            ?>
			<form action= "modifcr.php?id=<?php echo $row['id'];?>" method="POST">
			<center>  <h2 style='color:#5C6566 '> Modifiez votre compte rendu </h2> <img src = 'images/modifcrr.png' '60px' height ='60px' > </center> <br>
			<center> <textarea  name = "descriptif" rows="25" cols="75" :> <?php echo $row['descriptif']; ?> </textarea> </center> <br> <br> 
			<center> <input type= "submit" style="width: 180px; height: 45px;" name="validermodif" value= "Valider la modification"> </center>
			 </center>
			<br> <br> <br>
			<center> <a href= "listcr.php" > Cliquez pour retourner a la liste des comptes rendus </a> </center>
			</textarea>	
			</form>
			 <?php } ?>

	
</body>
</html>

