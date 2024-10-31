<?php session_start(); 
require_once("connexion_base.php"); ?>
<!doctype html> 
 <html lang="en"> <head> <metacharset="utf-8"> 
 <meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

<body>

<header>
    <div class='container-lg'>


        <div class="row bg-secondary">

            <div class="col-lg text-left text-dark p-3">
            
            <?php 
            $req="SELECT logo FROM logo";
            $rep = $pdo->prepare($req); 
            $rep->execute();
            $enr = $rep->fetchAll();             
                ?>
                
                    
                    <a href="accueil.php">
                        <button type="button" class="btn">
                            <img src="<?php echo $enr[1]['logo']; ?>" class="img-fluid">
                        </button>
                    </a>
            </div>


            <div class="col d-flex justify-content-end">
                <nav class="navbar navbar-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="film.php" method="post">
                            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="nom">
                            <button class="btn btn-outline-dark text-dark" style="background-color: #00FF00" type="submit"><strong>Rechercher</strong></button>
                        </form>
                    </div>
                </nav>
            </div>





        </div>




        <div class="row bg-secondary align-items-center">

        
            <div class="col-5">


                <ul class="nav nav-tabs align-items-center">

                    
                    <li class="nav-item">
                        <a class="nav-link text-dark text-white" href="accueil.php"><strong>Accueil</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-white" href="film.php"><strong>Films</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-white" href="serie.php" ><strong>Séries</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark text-white" href="categorie.php" ><strong>Catégories</strong></a>
                    </li>
                    
                    
                </ul>
            </div>




    </div>











</header>





