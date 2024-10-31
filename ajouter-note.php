<?php include "debut-page.inc.php"; ?>

<body>

<div class="container-lg bg_light">


    <?php
    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        $note=$_POST["noteform"];

        echo"<br><br><h3>Merci d'avoir voté !</h3><br><br>";
        echo"<strong>Votre note :</strong>".$note."<br><br>";
        echo"<a href='detail-film.php?id=".$id."'>Retour</a>";


        $requete="INSERT INTO note (valeur,id_film)
        VALUES ( ?, ?)"; 
        $reponse=$pdo->prepare($requete);
        $reponse->execute(array($note, $id));


    }
    


    ?>


</div>




</body>



<?php include "fin-page.inc.php"; ?>
