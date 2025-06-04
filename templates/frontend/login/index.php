<?php $title = "Se connecter"; ?>
<?php ob_start();

?>

<!-- breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Se connecter</li>
        </ol>
    </nav>
    <div class="container">
        <h1 class="titre-page">Se connecter</h1>
    </div>
</section>




<section class="pt-5 py-5 my-1 my-md-4 my-lg-5">
    <div class="container">
        <div class="row">

            <!-- Contact links -->
            <div class="col-xl-4 col-lg-5 ">
                <h2 class="titre-section">
                    Accéder à votre compte</h2>

                <p class="running-text fs-5">

                    Vous n'avez pas encore de compte ?
                    <a href="index.php?action=register" class="color-link-primary">Créer un compte</a>
                </p>


                <img src="images/featured-image-login.svg" class="img-fluid featured-image-post" alt="image">

            </div>




            <!-- Contact form -->
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



                                <!--begin::Form group-->
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="email">Email</label>
                                    <input type="email" placeholder="" id="email" name="login[email]" value="<?= isset($login) ? $login->getEmail() : '' ?>">
                                    <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["email"] . "</p>" : '' ?>
                                </div>
                                <!--begin::Form group-->
                                <div class="col-sm-12 form-group-style">
                                    <div class="form-group-password"> <label for="password" class="form-label fs-base">Mot de passe</label>
                                        <input type="password" id="password" name="login[password]" value="<?= isset($login) ? $login->getPassword() : '' ?>">
                                        <?= isset($controle["password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["password"] . "</p>" : '' ?>
                                    </div>
                                </div>
                                <!--begin::Form group-->





                                <div class="col-sm-12 pt-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Envoyer</button>
                                    </div>

                                    <br>


                                    <a href="#" class="btn btn-link btn-lg w-100 text-primary">Oubli du mot de passe ? (x)</a>

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