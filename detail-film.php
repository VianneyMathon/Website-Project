<?php include "debut-page.inc.php"; ?>

<body>


<div class='container-lg bg-light'>
<br><br>
    <?php 


    if (isset($_GET['id']))
    {
            $id=$_GET['id'];
        
        $requete = "SELECT membre.nom AS mnom,film.nom AS fnom,image,datesortie,realisateur,resume,acteurs,AVG(valeur) AS moyenne FROM film,categorie,genre,note,membre
        WHERE film.id = $id
        AND id_categorie=categorie.id
        AND id_genre=genre.id
        AND note.id_film=film.id
        "; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute();
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaître le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);  ?>

        <div class="row align-items-center">

            <div class="col-6">
                <img src="<?php echo  $enregistrements[0]['image'];  ?>" class="img-fluid" style="max-height: 250px; max-width: 200px"/>
            </div>

            <div class="col p-3">
                <div class="h1">   <?php echo$enregistrements[0]['fnom']; ?> </div>
            </div>
        </div>


        <br><br>
        <div class="row align-items-center">
        

        <form>
            <div class="form-group row">
                <label for="datesortie" class="col-sm-2 col-form-label"><strong>Date</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="datesortie" value="<?php echo $enregistrements[0]['datesortie'] ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="realisateur" class="col-sm-2 col-form-label"><strong>Realisateur</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="realisateur" value="<?php echo $enregistrements[0]['realisateur'] ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="acteurs" class="col-sm-2 col-form-label"><strong>Acteurs</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="acteurs" value="<?php echo $enregistrements[0]['acteurs'] ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="resume" class="col-lg-2 col-form-label"><strong>Résumé</strong></label>
                    <div class="col-sm-10">
                        <textarea type="text" readonly class="form-control-plaintext" id="resume"><?php echo $enregistrements[0]['resume'] ?></textarea><br>
                    </div>
            </div>
            

            
        <br><br><br>
        </form>

        </div>

        <div class="row align-items-center border">

            <div class="form-group row">
                <label for="note" class="col-sm-2 col-form-label"><strong>Note</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="note" value="<?php echo $enregistrements[0]['moyenne'] ?>"><br>
                    </div>
            </div>

            <div class="col">
                <strong>Laissez une note !</strong><br><br>

                <?php 
                if (isset($_SESSION["id_membre"])) {
                ?>

                    <form action="ajouter-note.php?id=<?php echo$id; ?>" method="post">
                        <select class="form-control" name="noteform">                    
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select><br>
                        <button class="btn btn-secondary" type="submit">Valider</button>
                    </form>
                    <br><br><br>
                <?php } 
                else {
                    echo"<a href='accueil.php'>Se connecter</a> pour laisser une note.";
                }
                ?>
            </div>

            <p><br><br><br><br><br></p>

            <div class="flex-row d-flex align-items-center bg-secondary">
                    <i class="bi bi-chat" style="font-size: 1.75rem; color: #00FF00"></i>
                    <h2 class="text-white">&nbsp;Les commentaires</h2>
            </div>


            <div class="row align-items-center">
                <p><br><br></p>
                <?php
                
                $requete2 = "SELECT pseudo,contenu,membre.nom,postdate FROM membre,commentaire,film
                WHERE film.id=$id
                AND commentaire.id_film=film.id 
                AND membre.id=id_membre
                "; 
                $reponse2 = $pdo->prepare($requete2); 
                $reponse2->execute();
                // récupérer tous les enregistrements dans un tableau 
                $enregistrements2 = $reponse2->fetchAll();
                // connaître le nombre d'enregistrements 
                $nombreReponses2 = count($enregistrements2);


                for($i=0;$i<$nombreReponses2;$i++) {   ?>

                    <form>
                        <div class="form-group row">
                            <label for="contenu" class="col-lg-2 col-form-label"><strong><?php echo $enregistrements2[$i]["pseudo"]; ?></strong></label>
                            <small id="postdate" class="form-text text-muted"><?php echo $enregistrements2[$i]["postdate"]; ?></small>
                            <br><br>
                                <div class="col-sm-10">
                                    <textarea type="text" readonly class="form-control-plaintext" id="contenu"><?php echo $enregistrements2[$i]['contenu']; ?></textarea><br><br>
                                </div>
                        </div>
                    </form>

                <?php
                } ?>

                <p><br><br></p>
                <div class="flex-row d-flex justify-content-center">
                <div class="col-6 text-center">
                <strong>Laissez un commentaire !</strong><br><br>

                 <?php
                if (isset($_SESSION["id_membre"])) {
                ?>

                    <form action="ajouter-commentaire.php?id=<?php echo$id; ?>" method="post">
                        <textarea type="text" class="form-control-plaintext border" id="ajoutcom" name="ajoutcom"></textarea><br><br>
                        <button class="btn btn-secondary" type="submit">Publier</button>
                    </form>
                    <br><br><br>
                <?php } 
                else {
                    echo"<a href='accueil.php'>Se connecter</a> pour laisser un commentaire.";
                }
                



                ?>

                </div>
                </div>


                
            </div>


        </div>



        


        <?php
    }  ?>





</div>

<?php include "fin-page.inc.php"; ?>
