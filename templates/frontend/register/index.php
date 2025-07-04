<?php $title = "S'inscrire"; ?>
<?php ob_start();

?>




<!-- breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">S'inscrire</li>
        </ol>
    </nav>
    <div class="container">
        <h1 class="titre-page">Créer un compte</h1>
    </div>
</section>

<section class="pt-5 py-5 my-1 my-md-4 my-lg-5">
    <div class="container">
        <div class="row">

            <!-- Contact links -->
            <div class="col-xl-4 col-lg-5">
                <h2 class="titre-section">S'inscrire</h2>
                <p class="running-text fs-5">
                    Entrez vos coordonnées pour créer votre compte
                </p>

                <img src="images/featured-image-register.svg" class="img-fluid featured-image-post" alt="image">

            </div>




            <!-- Contact form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
                <div class="card-shadow">
                    <div class="card-header">
                        <h2 class="titre-h3">Formulaire d'inscription</h2>
                        <p class="running-text fs-5">

                            Vous avez déjà un compte ?
                            <a href="index.php?action=login" class="color-link-primary">Connecter vous !</a>
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
                                                        <input type="file" id="image" name="image" value="<?= isset($registerUser) ? $registerUser->getImage() : '' ?>">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <?= isset($controle["image"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["image"] . "</p>" : '' ?>
                                    </div>

                                </div>
                                <!--begin::Form group-->
                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="lastname">Nom</label>
                                    <input type="text" id="lastname" name="register[lastname]" placeholder="Entrer un nom" value="<?= isset($register) ? $register->getLastname() : '' ?>">
                                    <?= isset($controle["lastname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["lastname"] . "</p>" : '' ?>
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="firstname">Prénom</label>
                                    <input type="text" id="firstname" name="register[firstname]" placeholder="" value="<?= isset($register) ? $register->getFirstname() : '' ?>">
                                    <?= isset($controle["firstname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["firstname"] . "</p>" : '' ?>
                                </div>

                                <!--begin::Form group-->
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="sujet">Pseudo</label>
                                    <input type="text" placeholder="" id="sujet" name="register[username]" value="<?= isset($register) ? $register->getUsername() : '' ?>">
                                    <?= isset($controle["username"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["username"] . "</p>" : '' ?>
                                </div>
                                <!--begin::Form group-->
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="email">Email</label>
                                    <input type="email" placeholder="" id="email" name="register[email]" value="<?= isset($register) ? $register->getEmail() : '' ?>">
                                    <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["email"] . "</p>" : '' ?>
                                </div>
                                <!--begin::Form group-->
                                <div class="col-sm-12 form-group-style">
                                    <div class="form-group-password"> <label for="password" class="form-label fs-base">Mot de passe</label>
                                        <input type="password" id="password" name="register[password]" value="<?= isset($register) ? $register->getPassword() : '' ?>">
                                        <?= isset($controle["password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["password"] . "</p>" : '' ?>
                                    </div>
                                </div>
                                <!--begin::Form group-->





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
    </div>


</section>






<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>