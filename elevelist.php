<?php 

session_start();

include "conf-ionos.php";

 if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
    {

    }
    	 $requete = "SELECT * FROM UTILISATEUR WHERE usertype= 0 ";
	    $elevelist = $connexion->query($requete);
	    $rows = $elevelist->fetch_all(MYSQLI_ASSOC);

?>

<html>
        <head>
        		<title> Liste élèves </title>
                 <style>
                    body {
                      background-color: Blanchedalmond;
                    }
                    </style>
        </head>
<body>

     <center> <h3> Liste des élèves:</h3> </center>

        <?php foreach ($rows as $row) {
        ?>

        <div> <center>
		<style>
		table, th, td {
		  border:1px solid black;
		}
		</style>
		<table style="width:40%">
		  <tr>
		    <th>Nom</th>
		    <th>Prenom</th>
		    <th>Login</th>
		    <th>Email</th>
		    <th> Liste des comptes rendus </th> 
		  </tr>
		  <tr>
		    <td> <center> <?php echo $row['nom']; ?> </center> </td>
		    <td> <center> <?php echo $row['prenom']; ?> </center> </td>
		    <td> <center> <?php echo $row['login']; ?> </center> </td>
		    <td> <center> <?php echo $row['email']; ?> </center> </td>
		    <td> <center> <a href= "consultlistprof.php?id=<?php echo $row['id'] ?>" > Compte rendus de: <?php echo $row['prenom'] . " "  ; echo $row['nom']; ?> </a> </center> </td>
		  </tr>
		</table>
		 <?php } ?>

		<br> <br> <br>

		<a href= "prof.php"> Cliquez ici pour retourner à l'accueil </a> 

	</center>
	</div>
</body> 
</html>  










