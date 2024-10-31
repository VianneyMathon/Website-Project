<?php include "debut-page.inc.php"; ?>

<body>


<div class="container-lg bg-light">

    <p><br><br></p>
    <div class="row text-center bg-secondary text-white">
        <i class="bi bi-signpost-split" style="color: #00FF00"></i>
        <h1>Catégories</h1>
    </div>


    <?php   

$requete = "SELECT nom,id FROM categorie
"; 
$reponse = $pdo->prepare($requete); 
$reponse->execute();
// récupérer tous les enregistrements dans un tableau 
$enregistrements = $reponse->fetchAll();
// connaitre le nombre d'enregistrements 
$nombreReponses = count($enregistrements);

?>
<p><br><br></p>
<div class="d-flex flex-row p-2 justify-content-center ">
    <div class="card-group ">
<?php

echo "<table><br />";

for ($i = 0; $i < $nombreReponses ; $i ++) {
   if ($i % 3 == 0) {
        echo"<tr>";
   }
    ?>
            <td>
                
                    <div class="col">
                        <a href="detail-categorie.php?id=<?php echo $enregistrements[$i]["id"]; ?>" style="text-decoration:none;">
                            <div class="card text-white bg-secondary mb-3" style="max-width: 15rem; border-color: #00FF00; border-width: 0.25em">
                                <div class="card-body">
                                    <h5 class="card-title text-white"><?php echo $enregistrements[$i]["nom"]; ?></h5>
            
                                 </div>
                            </div>
                        </a>
                
                
            </td>
        
    <?php    
    }
    ?>



</table>


                    </div>

    </div>


</div>



<?php include "fin-page.inc.php"; ?>
