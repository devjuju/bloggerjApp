<?php

use App\Core\Auth;
use App\Core\DateFormatter;

$title = "Blog"; ?>
<?php ob_start();
?>



<!-- breadcrumb -->
<section class="container-fluid p-5 bg-light-subtle">
    <nav class="container py-4 mb-lg-2" aria-label="breadcrumb">
        <ol class="breadcrumb pt-lg-3 mb-0">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
        </ol>
    </nav>
    <div class="container pb-4 mt-n1 mt-lg-0">
        <h1 class="titre-page">Blog</h1>
    </div>
</section>

<section class="container py-5 my-1 my-md-4 my-lg-5">
    <div class="row">
        <div class="col-lg-7  mb-lg-0">



            <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1 gy-md-4 gy-2">

                <!-- Item -->
                <?php foreach ($posts as $post): ?>
                    <div class="col pb-3">
                        <article class="card card-article border-0 ">
                            <div class="position-relative">




                                <?php


                                if (Auth::get('auth', 'role')) {
                                ?>

                                    <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>
                                        <a href="index.php?action=update_post&id=<?= $post->id ?>" class="btn btn-icon-pencil-circle-secondary  position-absolute top-0 end-0 zindex-5 me-3 mt-3">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                    <?php } else { ?>

                                    <?php } ?>

                                <?php } else { ?>

                                <?php } ?>

                                <img src="uploads/<?= $post->image ?>" class="card-img-top" alt="Image">
                            </div>
                            <div class="card-body">
                                <div class="marging-top-20 marging-bottom-10">
                                    <span class="fs-sm text-primary"><?= $post->category ?></span>
                                </div>
                                <h3>
                                    <a class="card-post-title" href="index.php?action=post&id=<?= $post->id ?>"><?= $post->title ?></a>
                                </h3>
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="meta-content-blog bd-highlight">
                                        <i class="bi bi-person-fill fs-base me-1"></i>
                                        <span class="fs-sm"><?= $post->users_id ?></span>
                                    </div>
                                    <div class="meta-content-blog bd-highlight">
                                        <i class="bi bi-clock-fill fs-base me-1"></i>
                                        <span class="fs-sm"><?= DateFormatter::enFrancais($post->created_at); ?></span>
                                    </div>
                                </div>
                                <p class="running-text"><?= $post->excerpt ?></p>
                            </div>


                        </article>
                    </div>
                <?php endforeach; ?>










            </div>

        </div>
        <div class="col-lg-5 col-xl-4 offset-xl-1 border-start-lg">
            <div class="card card-shadow mb-5">
                <div class="card-body">
                    <h4 class="titre-h4">Suivez-moi :</h4>
                    <p class="running-text">Retrouver les dernières nouvelles et inspirations sur le blog.</p>
                    <div class="d-flex">
                        <!-- Facebook -->
                        <a href="#" class="btn btn-icon-social-secondary btn-facebook" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <!-- Twitter -->
                        <a href="#" class="btn btn-icon-social-secondary btn-twitter" aria-label="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="btn btn-icon-social-secondary btn-instagram" aria-label="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>

                </div>
            </div>
            <!-- Basic card example -->
            <div class="card card-background">
                <div class="card-body">
                    <h4 class="titre-h4">Votre avis compte !</h4>
                    <p class="running-text pb-4 mb-0 mb-lg-3">Les utilisateurs ont la possibilité de commenter mon blog. Donner un avis utile qui contribue à l'amélioration du contenu du blog.</p>
                    <?php
                    $session = &$_SESSION;
                    if (isset($session['auth']['role'])) {
                    ?>

                        <?php if ($session['auth']['role'] === 'admin') { ?>
                            <a href="index.php?action=account" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20"">Mon compte</a>
            <?php } else { ?>
              <a href=" index.php?action=account" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20"">Mon compte</a>


            <?php } ?>

            <a href=" index.php?action=logout" class="d-grid gap-2 btn btn-outline-primary spacing-element-marging-bottom-20"">Se déconnecter</a>

            <?php } else { ?>
              <a href=" index.php?action=register" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20">
                                S'inscire
                            </a>
                            <a href="index.php?action=login" class="d-grid gap-2 btn btn-outline-primary">
                                Se connecter
                            </a>
                        <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>