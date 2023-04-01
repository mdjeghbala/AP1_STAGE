<?php

session_start();

$_SESSION['login'] = null;
$_SESSION['prenom'] = null;
$_SESSION['nom'] = null;
$_SESSION['id'] = null;
$_SESSION['email'] = null;
$_SESSION['usertype '] = null;



?>
<html>
<head>

<style>
body {
  background-color: BlanchedAlmond;
}
</style>

    <title> Accueil </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stage.css">
</head>
<body>


<?php


include "conf-ionos.php";


	if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
    	if (isset($_POST['send_con']))
		{
			$login= $_POST['login'];
			$hashmdp= md5($_POST['mdp']);
		}

		$requete= "SELECT * FROM UTILISATEUR WHERE login= '$login' ";
		$resultat = mysqli_query($bdd, $requete);
		$trouve= 0;
		while($donnees = mysqli_fetch_assoc($resultat))
		{
			$trouve= 1;
			$_SESSION['login'] = $donnees['login'];
			$mdp_from_db = $donnees['mdp'];
			$_SESSION['nom'] = $donnees['nom'];
			$_SESSION['prenom'] = $donnees['prenom'];
			$_SESSION['id']= $donnees['id'];
			$_SESSION['email']= $donnees['email'];
			$_SESSION['usertype']= $donnees['usertype'];



		}
		if ($trouve==0) 
		{
							echo "" ." <br> <br> <center> <img src = 'images/prblm.png' width = '80px' height '80px' /> </center> <br>  <center>  <h1 style='color:#5C6566 '> Le compte n'existe pas </h1> </center> <br> <br> <center> <a href = 'index.php'> Revenir à la page de connexion </a> </center> \n";
		}
		else 
		{
			
			if ($hashmdp != $mdp_from_db)
			{
				echo "" ." <br> <br> <center> <img src = 'images/prblm.png' width = '80px' height ='80px' /> </center> <br>  <center>  <h1 style='color:#5C6566 '> le mot de passe est incorrect </h1> </center> <br> <br> <center> <a href = 'index.php'> Revenir à la page de connexion </a> </center> \n";
				exit();
			}
			else
			{
				echo "le mot de passe est correcte, connexion en cours";
				if (isset($_SESSION['id']))
						
					{	
						echo " Bienvenue vous etes connecté en tant que " . $_SESSION['login'];
							
				 		$usertype= $_SESSION['usertype'];
			 			if ($usertype==0) {
							include "eleve.php";
						}
						else {
							include "prof.php";
						}		
					
					}
				else
				{
					echo "La connexion est perdue, veuillez revenir à la <a href='index.php'>page d'index</a> pour vous reconnecter."; 
				}
						
			}
		}
	}

       

?>



</body>
</html>
