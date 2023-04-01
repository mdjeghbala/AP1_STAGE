<?php
session_start();

include "conf-ionos.php";

$usertype = $_SESSION['usertype'];
$id = $_SESSION['id'];


if($bdd=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {

      $requete="Select dateNaissance,id from UTILISATEUR WHERE id='$id'";
            $resultat = mysqli_query($bdd, $requete);
            $etat=0;
                while($donnees = mysqli_fetch_assoc($resultat))
                {
                    $dateNaissance =$donnees['dateNaissance']; //mettre le nom du champ dans la table 
                    //echo $dateNaissance;
                    $etat=1;
                }

                 function age($dateNaissance) { 
         $age = date('Y') - $dateNaissance; 
        if (date('md') < date('md', strtotime($dateNaissance))) { 
            return $age - 1; 
        } 
        return $age; 
    } 
    }

?>

<html>
<head>

    <title> Information personnelles </title>
    <meta charset="utf-8">

<link rel="stylesheet" href="stage.css">

    <style>
    body {
      background-color: Blanchedalmond;
    }
    </style>

</head>


<body>

<div class="header">
  <h1>Vos informations personnelles</h1>
</div>





<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<br><br><br>

<center> <table style="width:55%">
  <tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Login</th>
    <th>Email</th>
    <th> Age </th>
  </tr>
  <tr>
    <td> <center> <?php echo $_SESSION['nom']; ?> </center> </td>
    <td> <center> <?php echo $_SESSION['prenom']; ?> </center> </td>
    <td> <center> <?php echo $_SESSION['login']; ?> </center> </td>
    <td> <center> <?php echo $_SESSION['email']; ?> </center> </td>
      <td> <center> <?php echo age($dateNaissance); ?> </center> </td>

  </tr>
</table>
</center>

<br> <br> <br>

<?php  if ($usertype==0)
          { ?>
            <center> <a href= "eleve.php"> Cliquez pour retourner a l'accueil </a> </center>
<?php     } 
       else
            { ?>
                 <center> <a href= "prof.php"> Cliquez pour retourner a l'accueil </a> </center>
<?php            } ?>


</body>
</html>



