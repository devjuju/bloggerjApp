<?php
$title = "Se connecter"; ?>
<?php ob_start();
?>

<!-- 1. Section breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <!-- 1.1 navigation-->
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Se connecter</li>
        </ol>
    </nav>
    <!-- 1.2 page title -->
    <div class="container">
        <h1 class="titre-page">Se connecter</h1>
    </div>
</section>

<!-- 2. Section content -->
<section class="pt-5 py-5 my-1 my-md-4 my-lg-5">
    <div class="container">
        <div class="row">
            <!-- 2.2 page info -->
            <div class="col-xl-4 col-lg-5 ">
                <h2 class="titre-section">
                    Accéder à votre compte</h2>
                <p class="running-text fs-5">
                    Vous n'avez pas encore de compte ?
                    <a href="index.php?action=register" class="color-link-primary">Créer un compte</a>
                </p>
                <img src="images/featured-image-login.svg" class="img-fluid featured-image-post" alt="image">
            </div>
            <!-- 2.1 login form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
                <div class="card-shadow">
                    <div class="card-header">
                        <h2 class="titre-h3">Formulaire de connexion</h2>
                        <p class="running-text fs-5">
                            Entrez votre identifiant et votre mot de passe pour vous connectez à votre compte
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            <div class="row g-4">
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="email">Email</label>
                                    <input type="email" placeholder="" id="email" name="login[email]"
                                        value="<?= isset($login) ? htmlspecialchars($login->getEmail(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["email"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-sm-12 form-group-style">
                                    <div class="form-group-password">
                                        <label for="password" class="form-label fs-base">Mot de passe</label>
                                        <input type="password" id="password" name="login[password]"
                                            value="<?= isset($login) ? htmlspecialchars($login->getPassword(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                        <?= isset($controle["password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["password"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                    </div>
                                </div>
                                <div class="col-sm-12 pt-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Se connecter</button>
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