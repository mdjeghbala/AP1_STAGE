<?php

session_start();

?>
<html>

<head> 

<link rel="stylesheet" href="stage.css">

<style>
body {
  background-color: Blanchedalmond;
}
</style>


<title> Connexion </title>

<meta charset="utf-8">


</head>

<body>


<?php



include "conf-ionos.php";
if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
{
	//echo "Vous etes connecté";
}

else 
{
	echo "Erreur";
}


?>


<div class="header">
  <h1>Stage Review</h1>
</div>

<br> <br> 
<center> <h1 style="color:BurlyWood;"> Connexion </h1> </center> <br> <br> 

<div align="center">
<form action= "accueil.php" method ="POST">
<div>
    <label for="login">Login:</label>
        <input type="text"  style = "padding: 8px 12px ;"placeholder="Entrez votre login"  name="login"> <br> <br>
    <label for="mdp">Mot de passe:</label> 
        <input type="password" style = "padding: 8px 12px ;" placeholder="Entrez votre mot de passe"  name="mdp"> <br> <br> 
        <center> <input type="submit" value="Envoyer" name= "send_con"> </center> <br>
        
        <a href="oubli.php" > Mot de passe oublié </a>
        </div>





</form>
</div>
