<?php $title = "S'inscrire"; ?>
<?php ob_start();

?>


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
            <div class="col-xl-4 col-lg-5">
                <h2 class="titre-section">S'inscrire</h2>
                <p class="running-text fs-5">
                    Entrez vos coordonnées pour créer votre compte
                </p>
                <img src="images/featured-image-register.svg" class="img-fluid featured-image-post" alt="image">
            </div>
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
                                                        <input type="file" id="image" name="image" value="<?= isset($register) ? htmlspecialchars($register->getImage(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?= isset($controle["image"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["image"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                    </div>
                                </div>

                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="lastname">Nom</label>
                                    <input type="text" id="lastname" name="register[lastname]" placeholder="Entrer un nom" value="<?= isset($register) ? htmlspecialchars($register->getLastname(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["lastname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["lastname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>

                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="firstname">Prénom</label>
                                    <input type="text" id="firstname" name="register[firstname]" value="<?= isset($register) ? htmlspecialchars($register->getFirstname(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["firstname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["firstname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>

                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="sujet">Pseudo</label>
                                    <input type="text" id="sujet" name="register[username]" value="<?= isset($register) ? htmlspecialchars($register->getUsername(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["username"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["username"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>

                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="email">Email</label>
                                    <input type="email" id="email" name="register[email]" value="<?= isset($register) ? htmlspecialchars($register->getEmail(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["email"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>

                                <div class="col-12 mb-4 form-group-style">
                                    <label for="password" class="form-label fs-base">Mot de passe</label>
                                    <input type="password" id="password" name="register[password]" value="<?= isset($register) ? htmlspecialchars($register->getPassword(), ENT_QUOTES, 'UTF-8') : '' ?>">

                                    <?= isset($controle["password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["password"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-12 mb-4 form-group-style">
                                    <label for="confirm_password" class="form-label fs-base">Confirmer le mot de passe</label>
                                    <input type="password" id="confirm_password" name="confirm_password">
                                    <?= isset($controle["confirm_password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["confirm_password"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
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
    </div>
</section>






<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>