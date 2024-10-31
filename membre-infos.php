<?php include "debut-page.inc.php"; ?>



<body>

<div class="container-lg bg-light">



    <?php

    if (isset($_SESSION['id_membre'])){
        
        $pseudo=$_SESSION['pseudo'];
        $nom=$_SESSION['nom'];
        $prenom=$_SESSION['prenom'];
        $email=$_SESSION['email'];
        $motdepasse=$_SESSION['motdepasse'];
        $id=$_SESSION['id_membre'];

        
        ?>

<br><br><strong>Vos informations :</strong><br><br>

            
            <div class="form-group row">
                <label for="pseudo" class="col-sm-2 col-form-label"><strong>Pseudo</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="pseudo" value="<?php echo $pseudo ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"><strong>Email</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $email ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="nom" class="col-sm-2 col-form-label"><strong>Nom</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nom" value="<?php echo $nom ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="prenom" class="col-sm-2 col-form-label"><strong>Prénom</strong></label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="prenom" value="<?php echo $prenom ?>"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="motdepasse" class="col-sm-2 col-form-label"><strong>Mot de passe</strong></label>
                    <div class="col-sm-10">
                        <input type="password" readonly class="form-control-plaintext" id="motdepasse" value="<?php echo $motdepasse ?>"><br><br>
                    </div>
            </div>

        </form>

        <a href="deconnexion.php"><strong>Se déconnecter  <i class="bi bi-arrow-right-circle"></i></strong></a>
        

    <?php
    }   ?>
    
    



</div>


</body>


<?php include "fin-page.inc.php"; ?>
