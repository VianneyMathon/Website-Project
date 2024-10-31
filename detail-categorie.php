<?php include "debut-page.inc.php"; ?>

<body>
    <div class="container-lg bg-light">
    
    <?php 
    if ($_GET["id"]) {
        $id=$_GET["id"];

        $requete = "SELECT categorie.nom AS cnom,image,realisateur,id_categorie,film.id,film.nom AS fnom FROM categorie,film
        WHERE categorie.id=$id
        AND id_categorie=categorie.id
        AND id_genre = 1
        "; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute();
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaitre le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);
        
        ?>
        <p><br><br></p>
        <div class="row text-center bg-secondary text-white">
            <h1><?php echo $enregistrements[0]["cnom"]."<br>Films"; ?></h1>
        </div>

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
                                <div class="card p-2">
                                    <img src="<?php echo  $enregistrements[$i]['image'];  ?>" class="card-img-top" style="max-height: 250px; max-width: 250px"/>
                                        <div class="card-body">
                                            <a href="detail-film.php?id=<?php echo$enregistrements[$i]["id"]; ?> " class="text-dark">
                                                <h5 class="card-title"><strong> <?php echo$enregistrements[$i]['fnom'];  ?> </strong></h5>
                                            </a>
                                            <p class="card-text"><?php echo$enregistrements[$i]['realisateur'];  ?></p>
                                        
                                        </div>
                                        <div class="card-footer">

                                            <?php
                                            echo'<a href="detail-categorie.php?id='.$enregistrements[$i]["id_categorie"].'">'.$enregistrements[$i]["cnom"].'</a>';   
                                            ?>

                                        </div>
                                </div>
                            </div>
                        
                        
                    </td>
                

            <?php
            

        }

            
            
        

        ?>



    </table>


        </div>

    </div>

       
        <?php
    }

    $requete2 = "SELECT categorie.nom AS cnom,image,realisateur,id_categorie,film.id,film.nom AS fnom FROM categorie,film
    WHERE categorie.id=$id
    AND id_categorie=categorie.id
    AND id_genre = 2
    "; 
    $reponse2 = $pdo->prepare($requete2); 
    $reponse2->execute();
    // récupérer tous les enregistrements dans un tableau 
    $enregistrements2 = $reponse2->fetchAll();
    // connaitre le nombre d'enregistrements 
    $nombreReponses2 = count($enregistrements2);
    
    ?>
    <p><br><br></p>
    <div class="row text-center bg-secondary text-white">
        <h1><?php echo "Séries"; ?></h1>
    </div>

    <p><br><br></p>
    <div class="d-flex flex-row p-2 justify-content-center ">
        <div class="card-group ">
    <?php

    echo "<table><br />";

    for ($j = 0; $j < $nombreReponses2 ; $j ++) {
       if ($j % 3 == 0) {
            echo"<tr>";
       }
        ?>
                <td>
                    
                        <div class="col">
                            <div class="card p-2">
                                <img src="<?php echo  $enregistrements2[$j]['image'];  ?>" class="card-img-top" style="max-height: 250px; max-width: 250px"/>
                                    <div class="card-body">
                                        <a href="detail-film.php?id=<?php echo$enregistrements2[$j]["id"]; ?> " class="text-dark">
                                            <h5 class="card-title"><strong> <?php echo$enregistrements2[$j]['fnom'];  ?> </strong></h5>
                                        </a>
                                        <p class="card-text"><?php echo$enregistrements2[$j]['realisateur'];  ?></p>
                                    
                                    </div>
                                    <div class="card-footer">

                                        <?php
                                        echo'<a href="detail-categorie.php?id='.$enregistrements2[$j]["id_categorie"].'">'.$enregistrements2[$j]["cnom"].'</a>';   
                                        ?>

                                    </div>
                            </div>
                        </div>
                    
                    
                </td>
            

        <?php
        

    }

        
        
    

    ?>



</table>


    </div>

</div>


    

    </div>

</body>


<?php include "fin-page.inc.php"; ?>
