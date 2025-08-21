<?php

use App\Core\Auth;
use App\Core\DateFormatter;

$title = "Développement de sites web";
?>

<?php ob_start(); ?>

<!-- Section breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home">
                    <i class="bi bi-house-door fs-lg me-1"></i>Accueil
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Développement de sites web</li>
        </ol>
    </nav>
    <div class="container">
        <h1 class="titre-page">Développement de sites web</h1>
    </div>
</section>

<!-- 2. Section content -->
<section class="container spacing-col-padding-top-50">
    <div class="row">
        <!-- 2.1 list of posts web development -->
        <div class="col-lg-7 mb-lg-0">
            <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1 gy-md-4 gy-2">
                <?php foreach ($posts as $post): ?>
                    <div class="col pb-3">
                        <article class="card card-article border-0">
                            <div class="position-relative">
                                <?php if (Auth::get('auth', 'role') === 'administrateur'): ?>
                                    <a href="index.php?action=update_post&id=<?= $post->id ?>"
                                        class="btn btn-icon-pencil-circle-secondary position-absolute top-0 end-0 zindex-5 me-3 mt-3">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                <?php endif; ?>
                                <img src="uploads/<?= htmlspecialchars($post->image, ENT_QUOTES, 'UTF-8') ?>" class="card-img-top" alt="Image">
                            </div>
                            <div class="card-body">
                                <div class="marging-top-20 marging-bottom-10">
                                    <span class="fs-sm text-primary"><?= htmlspecialchars($post->category, ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <h3>
                                    <a class="card-post-title" href="index.php?action=post&id=<?= $post->id ?>">
                                        <?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8') ?>
                                    </a>
                                </h3>
                                <div class="d-flex flex-row bd-highlight mb-3">
                                    <div class="meta-content-blog bd-highlight">
                                        <i class="bi bi-person-fill fs-base me-1"></i>
                                        <span class="fs-sm"><?= htmlspecialchars($post->author, ENT_QUOTES, 'UTF-8') ?></span>
                                    </div>
                                    <div class="meta-content-blog bd-highlight">
                                        <i class="bi bi-clock-fill fs-base me-1"></i>
                                        <span class="fs-sm"><?= DateFormatter::enFrancais($post->updated_at); ?></span>
                                    </div>
                                </div>
                                <p class="running-text"><?= htmlspecialchars($post->excerpt, ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- 2.2 categories & social networks column -->
        <div class="col-lg-5 col-xl-4 offset-xl-1 border-start-lg">
            <div class="card card-shadow">
                <div class="card-body">
                    <h4 class="titre-h4">Catégories</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="pb-2 mb-2"><a href="index.php?action=blog" class="blog-postlist-content"><span class="blog-postlist-title">Tous</span></a></li>
                        <li class="pb-2 mb-2">
                            <div class="blog-postlist-content"><span class="blog-postlist-title-active">Développement de sites web</span></div>
                        </li>
                        <li class="pb-2 mb-2">
                            <a href="index.php?action=blog_posts_apps" class="blog-postlist-content"><span class="blog-postlist-title">Développement d'applications web</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card card-background">
                <div class="card-body">
                    <h4 class="titre-h4">Suivez-moi !</h4>
                    <p class="running-text">Retrouver les dernières nouvelles et inspirations sur le blog.</p>
                    <div class="d-flex">
                        <a href="https://www.facebook.com/?locale=fr_FR" class="btn btn-icon-social-secondary">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://fr.pinterest.com/" class="btn btn-icon-social-secondary">
                            <i class="bi bi-pinterest"></i>
                        </a>
                        <a href="https://fr.linkedin.com/" class="btn btn-icon-social-secondary">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require('../templates/layout-frontend.php');
?>