<?php

session_start();

include "conf-ionos.php";

 //$id = $_SESSION['id'];

$usertype= $_SESSION['usertype'];

if ($connexion = mysqli_connect ($serveurBDD, $userBDD, $mdpBDD, $nomBDD))
    {

    }

    $idcr= $_GET['id'];

    $sqlQuery = "SELECT * FROM CR WHERE id= '$idcr' ";
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
        </head>
<body>
        
     
            <?php foreach ($rows as $row) {
            ?>
            <div> <center>
            <h3> Compte rendu du <?php echo $row['date'] ?>:</h3>
            <textarea rows= "25" cols= "75" wrap= "hard" disabled="yes" > <?php echo $row['descriptif']; ?> </textarea> <br> <br>
            <form action= "commentaire.php?id=<?php echo $row['id'];?>" method="POST"> 
            <input type= "submit" name="commentaire" value= "Commenter le projet"> </input> </form> <br>

            <?php  
                                     
            foreach ($rows as $row) {
	      
	           echo " La note attribuée est de: " .$row['note'];

                        }       

                        
                        if($usertype==1)
                        { ?>

                           <br> <br> <a href = "prof.php" > Cliquez ici pour retourner à la liste des compte rendus </a> 
                            <?php
                        }                                       
            

                   if($usertype==0) 
             			{	?>

             				<form action= "modifcr.php?id=<?php echo $row['id'];?>" method="POST"> <br> <br> 
				            <input type= "submit" name="modifier" value= "Modifier">
				            <br> <br> <a href = "listcr.php" > Cliquez ici pour retourner à la liste des compte rendus </a>
				            </center>
				            </div>	
				        	</form>
				        	<?php 
             			}
             ?>
          
            
            <?php } ?>


         

</body> 
</html>  
