<?php include "debut-page.inc.php"; ?>
<body>

<div class="container-lg bg-light">
    <?php
    if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])) {
        if (isset($_POST['pseudo'])) 
        if (isset($_POST['motdepasse']))
        if (isset($_POST['email']))
        if (isset($_POST['prenom']))
        if (isset($_POST['nom']))
        {
            $pseudo=$_POST['pseudo'];
            $motdepasse=$_POST['motdepasse'];
            $email=$_POST['email'];
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom'];
            $motdepasse_crypte = password_hash($motdepasse, PASSWORD_DEFAULT);

            $requete3 = "SELECT pseudo from membre where pseudo='$pseudo'
             "; 
             $reponse3 = $pdo->prepare($requete3); 
             $reponse3->execute();
             // récupérer tous les enregistrements dans un tableau 
             $enregistrements3 = $reponse3->fetchAll();
             // connaitre le nombre d'enregistrements 
             $nombreReponses3 = count($enregistrements3);
        
        if ($nombreReponses3==0){
            
        // exécuter une requete MySQL de type INSERT
        $requete="INSERT INTO membre (pseudo,motdepasse,nom,prenom,email,date_inscription)
        VALUES ( ?, ?, ?, ?, ?, NOW())"; 
        $reponse=$pdo->prepare($requete);
        $reponse->execute(array($pseudo, $motdepasse_crypte, $nom, $prenom, $email));
        
        echo"<br><br><h3 class='text-success'>L'insciption a bien été effectuée.</h3><br><br><strong>Vos informations :</strong><br><br>";
    ?>

        <form>

            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label"><strong>Pseudo</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="pseudo" value="<?php echo $pseudo ?>">
                    </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $email ?>">
                    </div>
            </div>

            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label"><strong>Nom</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nom" value="<?php echo $nom ?>">
                    </div>
            </div>

            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label"><strong>Prénom</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="prenom" value="<?php echo $prenom ?>">
                    </div>
            </div>

            <div class="form-group row">
                <label for="motdepasse" class="col-sm-2 col-form-label"><strong>Mot de passe</strong></label>
                    <div class="col-sm-10">
                        <input type="password" readonly class="form-control-plaintext" id="motdepasse" value="<?php echo $motdepasse ?>">
                    </div>
            </div>

        </form>

            <h5><br><br><br>Retournez vers <a href="accueil.php">l'accueil</a> pour vous connecter.</h5>
            

        
        <?php 
        }    
        else {
            echo"<br><br><h3>L'insciption a échoué, le pseudo existe déjà.</h3><br><br>";
            echo"<a href='inscription.php'>Retour vers la page d'inscription</a>";
        }
        } 
        } 
        
        else {
            echo"<br><br><h3>L'insciption a échoué, vous n'avez pas rempli tous les champs.</h3><br><br>";
            echo"<a href='inscription.php'>Retour vers la page d'inscription</a>";
        }
        ?>

        
</div>

</body>
</html>


<?php include "fin-page.inc.php"; ?>
