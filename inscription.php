<?php require_once("connexion_base.php"); ?>
<!doctype html> 
 <html lang="en"> <head> <meta charset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

 <body>

 <?php 
                                $req="SELECT logo FROM logo";
                                $rep = $pdo->prepare($req); 
                                $rep->execute();
                                $enr = $rep->fetchAll();             
                                ?>

<div class='container-lg border'>

    
    <div class="row text-center bg-secondary">
      <div class="m-2">
      <a href="accueil.php">
                        <button type="button" class="btn">
                            <img src="<?php echo $enr[1]['logo']; ?>" class="img-fluid">
                        </button>
                    </a>
      </div>
        <p class="h1 text-white">Inscrivez-vous</p>
    </div>
 






    <form action="enregistrer-membre.php" method="post">
        <div class="form-group row bg-light">
          <p><br></p>
            <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo"><br>
                </div>
    
        
            <label for="nom" class="col-sm-2 col-form-label">Nom</label>
              <div class="col-lg-10">
                  <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom"><br>
              </div>
        
        
            <label for="prenom" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom"><br>
                </div>

              <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email"><br>
                </div>

              <label for="motdepasse" class="col-sm-2 col-form-label">Mdp</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Motdepasse"><br><br>
                </div>

              <button class="btn btn-secondary" style="border-color: #00FF00; border-width: 0.20em" type="submit">Valider</button>

        </div>
                
    </form>




</div>








    <!--Nerienécrireaprèscettelimite--> 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"crossorigin="anonymous"> </script> 
</body> </html>



<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



