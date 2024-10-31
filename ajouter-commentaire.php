<?php include "debut-page.inc.php"; ?>

<body>

<div class="container-lg bg_light">


    <?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $com=$_POST["ajoutcom"];
        $id_membre=$_SESSION["id_membre"];

        echo"<br><br><h3>Votre commentaire a été publié.</h3><br><br>";
        
        echo"<a href='detail-film.php?id=".$id."'>Retour</a>";


        $requete="INSERT INTO commentaire (contenu,postdate,id_membre,id_film)
        VALUES ( ?, NOW(), ? ,? )"; 
        $reponse=$pdo->prepare($requete);
        $reponse->execute(array($com, $id_membre,$id));


    }
    


    ?>


</div>




</body>


<?php include "fin-page.inc.php"; ?>
