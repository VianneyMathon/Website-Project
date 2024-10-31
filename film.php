<?php include "debut-page.inc.php"; ?>



<body>
<?php   
    if (!isset($_POST['nom'])){ ?>

    <div class="container-lg bg-light border border-dark ">

        <br><br><br>
        <div class="row bg-secondary border border-dark">

            <div class="col-1">
                <i class="bi bi-film bi-outline-dark p-2" style="font-size: 2rem; color: #00FF00"></i>
            </div>

            <div class="col-9">
                <div class="h1 text-center" style="color: white">Tous nos films</div>
            </div>

        </div> <?php

       
        $requete = "SELECT realisateur,image,film.id,film.nom AS fnom,categorie.nom AS cnom,id_categorie FROM film,genre,categorie 
        WHERE id_genre=genre.id 
        AND id_genre=1 
        AND id_categorie=categorie.id "; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute();
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaitre le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);
        
        ?>
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
                                    <img src="<?php echo  $enregistrements[$i]['image'];  ?>" class="card-img-top" style="max-height: 250px;max-width: 250px"/>
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
    }
    
    else { ?>
    <div class="container-lg bg-light border border-dark ">

<br><br><br>
<div class="row bg-secondary border border-dark">

    <div class="col-1">
        <i class="bi bi-film bi-outline-dark p-2" style="font-size: 2rem; color: #00FF00"></i>
    </div>

    <div class="col-9">
        <div class="h1 text-center" style="color: #00FF00"><?php echo$_POST["nom"]; ?></div>
    </div>
</div>
<div class="row bg-light border border-dark">
    <?php
        $recherche=$_POST["nom"];
        $requete = "SELECT realisateur,image,film.id,film.nom AS fnom,categorie.nom AS cnom,id_categorie FROM film,categorie  
        WHERE id_categorie=categorie.id
        AND film.nom IN (SELECT nom FROM film WHERE nom LIKE '%$recherche%');
         "; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute();
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaitre le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);
        
        
        ?>
        <div class="d-flex flex-row p-2 justify-content-center ">
            <div class="card-group ">
        <?php
        echo "<table><br />";
        if ($nombreReponses==0){
            echo "<h3><br><br>Aucun résultat</h3>";
        }
    
        for ($i = 0; $i < $nombreReponses ; $i ++) {
           if ($i % 3 == 0) {
                echo"<tr>";
           }
            ?>
                    <td>
                        
                            <div class="col">
                                <div class="card p-2">
                                    <img src="<?php echo  $enregistrements[$i]['image'];  ?>" class="card-img-top" style="max-height: 250px;max-width: 250px"/>
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
    }
    
        

        ?>



    </table>


        </div>

</div>


    </div>





</body>


<?php include "fin-page.inc.php"; ?>
