<?php
include "debut-page.inc.php"; ?>

<body>


<div class="container-lg bg-light">

    <?php
    if (!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])) {
        $pseudo = $_POST['pseudo']; $motdepasse = $_POST['motdepasse'];
        // exécuter une requete MySQL de type SELECT .. WHERE 
        $requete = "SELECT * FROM membre WHERE pseudo = ?"; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute(array($pseudo));
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaitre le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);
        // tester si un enregistrement existe
        // (on suppose qu'un même pseudo n'existe qu'une seule fois !)
        if ($nombreReponses > 0)
        {
        // on vérifie si le mot de passe de la base de données au mot de passe du formulaire 
            $motdepasse_crypte = $enregistrements[0]['motdepasse'];
            if (password_verify($motdepasse, $motdepasse_crypte)){
                echo'<br><br><h5>Vous êtes connectés</h5><br>';
                $_SESSION['pseudo'] = $enregistrements[0]['pseudo']; 
                $_SESSION['id_membre'] = $enregistrements[0]['id'];
                $_SESSION['prenom'] = $enregistrements[0]['prenom'];
                $_SESSION['email'] = $enregistrements[0]['email'];
                $_SESSION['motdepasse'] = $_POST['motdepasse'];
                $_SESSION['nom'] = $enregistrements[0]['nom'];


                echo "Bonjour <em>".$_SESSION['prenom']."</em>,";

                ?>
                <br><br>
                <a href="accueil.php">
                    <i class="bi bi-house" style="font-size: 2rem; color: blue;"></i>
                    <strong>Retour vers l'accueil</strong>
                </a>
                <?php

            } 
            else {
                echo'<h5><br><br>Votre pseudo et/ou mot de passe est incorrect.</h5><br>';
                echo"<h5><br>Retour vers <a href='accueil.php'>l'accueil</a>.</h5>";
            }
        } 
        else {
            echo'<h5><br><br>Votre pseudo et/ou mot de passe est incorrect.</h5><br>';
            echo"<h5><br>Retour vers <a href='accueil.php'>l'accueil</a>.</h5>";
        }
    } 


    else { ?>  
            <?php echo"<br><br><h5>Connexion échoucée, un champ n'a pas été rempli.</h5><br><br>";  ?>
            <h5><br>Retour vers <a href="accueil.php">l'accueil</a>.</h5>
    <?php } ?>


</div>



</body>
</html>


<?php include "fin-page.inc.php"; ?>
