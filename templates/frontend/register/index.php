<?php $title = "S'inscrire"; ?>
<?php ob_start();

?>

<!-- breadcrumb -->
<section class="container-fluid p-5 bg-light-subtle">
    <nav class="container py-4 mb-lg-2" aria-label="breadcrumb">
        <ol class="breadcrumb pt-lg-3 mb-0">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">S'inscrire</li>
        </ol>
    </nav>
    <div class="container pb-4 mt-n1 mt-lg-0">
        <h1 class="titre-page">Créer un compte</h1>
    </div>
</section>

<section class="container py-5 my-1 my-md-4 my-lg-5">
    <div class="row gx-5">
        <div class="col-6">
            <div class="col-left-content">

                <img src="images/featured-image-register.svg" class="img-fluid featured-image-post" alt="image">
            </div>
        </div>
        <div class="col-6">
            <div class="card-shadow py-3 p-sm-4 p-md-5">
                <div class="card-header">
                    <h2 class="titre-section">S'inscrire</h2>
                    <p class="text-muted fw-semibold fs-5">
                        Entrez vos coordonnées pour créer votre compte
                    </p>
                </div>
                <div class="card-body">

                    <form method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="row g-4">

                            <div class="col-sm-12 form-group-style">

                                <div class="py-4">

                                    <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3  spacing-content-padding-top-40">
                                        <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                                            <div class="d-flex align-items-center me-3">
                                                <img src="images/avatar-image-register.svg" class="img-fluid rounded-circle" width="100" alt="Image">
                                                <div class="ps-3">
                                                    <label for="image" class="form-label"> Photo de profil</label>
                                                    <input type="file" id="image" name="image" value="">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-6 form-group-style">
                                <label class="form-label fs-base" for="lastname">Nom</label>
                                <input type="text" id="lastname" name="" placeholder="Entrer un nom" value="">
                            </div>

                            <div class="col-sm-6 form-group-style">
                                <label class="form-label fs-base" for="firstname">Prénom</label>
                                <input type="text" id="firstname" name="" placeholder="" value="">
                            </div>

                            <div class="col-sm-12 form-group-style">
                                <label class="form-label fs-base" for="username">Pseudo</label>
                                <input type="text" placeholder="" id="username" name="" value="">

                            </div>

                            <div class="col-sm-12 form-group-style">
                                <label class="form-label fs-base" for="email">Email</label>
                                <input type="email" placeholder="" id="email" name="">
                            </div>

                            <div class="col-sm-12 form-group-style">
                                <div class="form-group-password"> <label for="password" class="form-label fs-base">Mot de passe</label>
                                    <input type="password" id="password" name="" value="">
                                </div>
                            </div>

                            <div class="col-sm-12 pt-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>




<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>