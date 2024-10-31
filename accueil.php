<?php include "debut-page.inc.php"; ?>
<body>


    <div class='container-lg'>
        <div class="row d-flex justify-content-end bg-secondary">
            <?php 
            if (!isset($_SESSION['id_membre'])) {    ?>
            <div class="d-flex justify-content-end">
                <div class="text-center">
                <button class="btn btn-outline-dark text-dark m-2 text-dark" type="button" style="background-color: #00FF00" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <strong>Se connecter</strong>
                </button>
                </div>
            </div>
            
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="row bg-secondary">
                            <div class="offcanvas-header">
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
                        </div>

      
                        <div class="offcanvas-body">

                            <h3>Connectez-vous</h3></br>


                            <form action="verifier-connexion.php" method="post">
                                <div class="form-group row">
                                    <label for="pseudo" class="col-sm-2 col-form-label">Pseudo</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo"><br>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="motdepasse" class="col-sm-2 col-form-label">Mdp</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" name="motdepasse" id="motdepasse" placeholder="Motdepasse"><br>
                                        </div>
                                </div>

                                <button class="btn btn-primary" type="submit">Valider</button>
                            </form>




                            <br><br>
                        Pas de compte ? 
                        <a href="inscription.php">Inscrivez-vous</a> 

                         </div>
                    </div>
            <?php } 
            else { ?>
            <div class="d-flex justify-content-end">
                <a class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25" href="membre-infos.php">
                    <i class="bi bi-person-square" style="font-size: 2rem; color: #00FF00;"></i>
                </a>
            </div>
            <?php }  ?>
        </div>

                
        <?php 
        $requete = "SELECT image,nom FROM actu
        "; 
        $reponse = $pdo->prepare($requete); 
        $reponse->execute();
        // récupérer tous les enregistrements dans un tableau 
        $enregistrements = $reponse->fetchAll();
        // connaitre le nombre d'enregistrements 
        $nombreReponses = count($enregistrements);
        ?>

        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?php echo $enregistrements[0]['image']; ?>" class="d-block w-100" style="max-height :650px">
                            <div class="carousel-caption d-none d-md-block">
                                <h4>Dany Boon prend du recul</h4>
                                <p>Après une longue carrière pleine de succès, l'acteur déclare vouloir se mettre en retrait et profiter de sa famille</p>
                            </div>
                        </div>
                <div class="carousel-item">
                    <img src="<?php echo $enregistrements[1]['image']; ?>" class="d-block w-100" style="max-height :650px">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Virginie Efira remporte un oscar pour son rôle dans Revoir Paris</h4>
                            <p>Revivez la remise des oscars avec nous</p>
                        </div>
                </div>
                <div class="carousel-item">
                    <img src="<?php echo $enregistrements[2]['image']; ?>" class="d-block w-100" style="max-height :650px">
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Adèle Exarchopoulos dans le nouveau film de Léa Mysius</h4>
                            <p>Prévue pour fin 2023, cette comédie romantique avec Léa Seydoux et Salim Kechiouche nous donne hâte d'y être</p>
                        </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> 
        </div>



        <p><br><br><br></p>
        </div class="d-flex flex-row">
            <h2>Les tops films de la semaine<br><br></h2>


            <?php 
             $requete2 = "SELECT realisateur,image,nom,id FROM film 
             ORDER BY id
             "; 
             $reponse2 = $pdo->prepare($requete2); 
             $reponse2->execute();
             // récupérer tous les enregistrements dans un tableau 
             $enregistrements2 = $reponse2->fetchAll();
             // connaitre le nombre d'enregistrements 
             $nombreReponses2 = count($enregistrements2);
            ?>

            <div class="card-group">
                <div class="card">
                    <img src="<?php echo $enregistrements2[6]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=7" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements2[6]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements2[6]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements2[5]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=6" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements2[5]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements2[5]['realisateur'] ?>.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements2[9]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=10" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements2[9]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements2[9]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements2[10]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=11" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements2[10]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements2[10]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements2[11]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=12" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements2[11]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements2[11]['realisateur'] ?>.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
            </div>
            <p><br><br><br></p>
            
            <h2>Les tops séries de la semaine<br><br></h2>

            <?php 
             $requete3 = "SELECT realisateur,image,nom,id FROM film 
             WHERE id_genre=2
             ORDER BY id
             "; 
             $reponse3 = $pdo->prepare($requete3); 
             $reponse3->execute();
             // récupérer tous les enregistrements dans un tableau 
             $enregistrements3 = $reponse3->fetchAll();
             // connaitre le nombre d'enregistrements 
             $nombreReponses3 = count($enregistrements3);
            ?>

            <div class="card-group">
                <div class="card">
                    <img src="<?php echo $enregistrements3[1]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=43" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements3[1]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements3[1]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements3[2]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=44" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements3[2]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements3[2]['realisateur'] ?>.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements3[3]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=45" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements3[3]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements3[3]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements3[4]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=46" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements3[4]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements3[4]['realisateur'] ?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
                <div class="card">
                    <img src="<?php echo $enregistrements3[5]['image'] ?>" class="card-img-top" style="max-height: 300px">
                    <div class="card-body">
                    <a href="detail-film.php?id=47" class="text-dark">
                        <h5 class="card-title"><?php echo $enregistrements3[5]["nom"] ?></h5>
                    </a>
                        <p class="card-text"><?php echo $enregistrements3[5]['realisateur'] ?>.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Dernière mise à jour il y a 21h</small>
                    </div>
                </div>
            </div>




        </div>

        




    </div>









<?php include "fin-page.inc.php"; ?>
