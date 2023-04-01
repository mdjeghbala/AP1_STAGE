<?php
session_start();
?>
<html>
<head>
    <title> Réinitilisation mot de passe </title>
    <meta charset="utf-8">
    <style>
    body {
      background-color: BlanchedAlmond;
    }
    </style>
</head>
<body>

<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <center> <h2  style='color:#5C6566 ' > Saisissez votre e-mail </h2> </center> 

<br> <br> <br>

<?php 



include 'conf-ionos.php';
if (isset($_POST['email']))
{
     $lemail=$_POST['email'];
     echo "le formulaire a été envoyé avec comme email la valeur : ".$lemail  ; ?> <br>
     <?php

     if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
         

            $requete="Select * from UTILISATEUR WHERE email='$lemail'";
            $resultat = mysqli_query($bdd, $requete);
            $etat=0;
                while($donnees = mysqli_fetch_assoc($resultat))
                {
                    $login =$donnees['login']; //mettre le nom du champ dans la table
                    $mdp =$donnees['mdp'];   
                    $etat=1;
                }
            
            if ($etat==0)
            {
                echo "ERREUR l'email n'existe pas dans la BDD";

            }

            else
            {
                $newmdp= uniqid();
                $hashnewmdp= md5(uniqid());
                echo "L'email existe bien nous allons vous envoyer un email avec votre nouveau mot de passe";
                    $mail_content = "Voici votre nouveau mot de passe : " . $newmdp;
                    mail($lemail, 'Nouveau mot de passe', $mail_content);
                    
                    $requete2= "UPDATE UTILISATEUR SET mdp = '$hashnewmdp'  WHERE email = '$lemail' ";
                    //echo $requete2;
                    if (!mysqli_query($bdd,$requete2)) 
                    {
                        echo "<br>Erreur : ".mysqli_error($bdd)."<br>";
                    }

     

                
             
            }
        }


}
else
{
    
?>
 <div align="center">
    <form action= "oubli.php" method ="POST">
<div>
    <label for="mail">Email:</label>
        <input type="text" placeholder="Entrez votre email"  name="email"> <br>
         <center> <input type="submit" value="Envoyer" </center> <br>
<?php
}
?>






</body>
</html>
