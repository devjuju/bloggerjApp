<?php

use App\Core\Auth;
use App\Core\DateFormatter;

$title = "Commentaires"; ?>
<?php ob_start();
?>

<!-- 1. Side menu -->
<aside data-bs-theme="dark">
    <div id="componentsNav" class="offcanvas-lg offcanvas-start d-flex flex-column position-fixed top-0 start-0 vh-100 bg-dark border-end-lg" style="width: 21rem; z-index: 1045;">
        <!-- 1.1 logo & title -->
        <div class="offcanvas-header d-none d-lg-flex justify-content-start">
            <a href="index.php?action=dashboard" class="navbar-brand text-dark d-none d-lg-flex py-0">
                <img src="images/logo-negatif.png" class="img-fluid" alt="Blogger">
                <span>blogger J</span>
            </a>
        </div>
        <!-- 1.2 menu mobile -->
        <div class="offcanvas-header d-block d-lg-none border-bottom">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="d-lg-none mb-0">Menu</h5>
                <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#componentsNav" aria-label="Close"></button>
            </div>
            <div class="list-group list-group-flush mx-n4">
                <a href="index.php?action=dashboard" class="list-group-item list-group-item-action active d-flex align-items-center border-0 py-2 px-4">
                    <i class="bi bi-speedometer2 fs-lg opacity-80 me-2"></i>
                    Tableau de bord
                </a>
                <a href="index.php?action=blog" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-2 px-4">
                    <i class="bi bi-box-arrow-up-right fs-lg opacity-80 me-2"></i>
                    Voir le blog en direct
                </a>
            </div>
        </div>
        <!-- 1.3 user info & navigations links -->
        <div class="offcanvas-body w-100 p-4 ">
            <div class="list-group list-group-flush">
                <!-- 1.3.1 user info -->
                <div class="d-table mx-auto spacing-col-padding-top-50 spacing-col-padding-bottom-50">
                    <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8'); ?>" class="d-block rounded-circle" width="120" alt="">
                    <div class="avatar-offcanvas">
                        <h5><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p><?= htmlspecialchars(Auth::get('auth', 'email'), ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
                <!-- 1.3.2 navigations links -->
                <a href="index.php?action=posts" class="list-group-item list-group-item-action d-flex align-items-center">
                    <div class="box-icon-account">
                        <i class="bi bi-pin-fill"></i>
                    </div>
                    Articles
                </a>
                <div class="list-group-item list-group-item-action d-flex align-items-center active">
                    <div class="box-icon-account">
                        <i class="bi bi-chat-square-dots-fill"></i>
                    </div>
                    Commentaires
                </div>
                <a href="index.php?action=users" class="list-group-item list-group-item-action d-flex align-items-center ">
                    <div class="box-icon-account">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    Utilisateurs
                </a>
            </div>
        </div>
        <!-- 1.4 logout button -->
        <div class="offcanvas-header border-top">
            <a href="index.php?action=logout" class="btn btn-primary w-100">
                Se déconnecter
            </a>
        </div>
    </div>
</aside>

<!-- 2. Main content -->
<main>
    <!-- 2.1 section breadcrumb -->
    <section class="container-fluid bg-light-subtle px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
        <!-- 2.1.1 navigation-->
        <nav class="container spacing-col-padding-top-50" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=dashboard"><i class="bi bi-speedometer2 fs-lg me-1"></i>Tableau de bord</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Les commentaires</li>
            </ol>
        </nav>
        <!-- 2.1.2 page title -->
        <div class="container spacing-col-padding-bottom-50">
            <h1 class="title-dasboard">Les commentaires</h1>
        </div>
    </section>
    <!-- 2.2 section comment -->
    <section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4 ">
        <div class="container spacing-col-padding-top-50 spacing-col-padding-bottom-50">
            <div class="row gy-4">
                <!-- 2.2.1 list of comments -->
                <div class="col-lg-7">
                    <?php foreach ($comments as $comment): ?>
                        <div class="py-4">
                            <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3  spacing-content-padding-top-40">
                                <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="uploads/<?= htmlspecialchars($comment->avatar, ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                                        <div class="ps-3">
                                            <h6 class="titre-h6 mb-0"><?= htmlspecialchars($comment->author, ENT_QUOTES, 'UTF-8') ?></h6>
                                            <p class="running-text"><?= htmlspecialchars($comment->email, ENT_QUOTES, 'UTF-8') ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center position-relative ps-md-3  mb-2">
                                    <div class="d-flex">
                                        <?php if ($comment->status  === "rejeté"): ?>
                                            <a href="" class="btn btn-icon-primary">
                                                <i class="bi bi-hand-thumbs-down"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="index.php?action=reject_comment&id=<?= (int) $comment->id ?>" class="btn btn-icon-outline-primary">
                                                <i class="bi bi-hand-thumbs-down"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ($comment->status  === "approuvé"): ?>
                                            <a href="" class="btn btn-icon-primary">
                                                <i class="bi bi-hand-thumbs-up"></i>
                                            </a>
                                        <?php else: ?>
                                            <a href="index.php?action=validate_comment&id=<?= (int) $comment->id ?>" class="btn btn-icon-outline-primary">
                                                <i class="bi bi-hand-thumbs-up"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="index.php?action=delete_comment&id=<?= (int) $comment->id ?>" class="btn btn-icon-secondary">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-comment mb-3">
                                <div class="row g-0">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="d-flex flex-row bd-highlight mb-3">
                                                <div class="meta-comment bd-highlight">
                                                    <i class="bi bi-pin-fill fs-base me-1"></i>
                                                    <span class="fs-sm">Avis sur: <strong><?= htmlspecialchars($comment->title, ENT_QUOTES, 'UTF-8') ?></strong></span>
                                                </div>
                                            </div>
                                            <p class="running-text">
                                                <?= htmlspecialchars($comment->content, ENT_QUOTES, 'UTF-8') ?></p>
                                            <hr>
                                            <p class="running-text">Le commentaire publié le <?= DateFormatter::enFrancais($comment->created_at); ?> est <strong><?= htmlspecialchars($comment->status, ENT_QUOTES, 'UTF-8') ?> </strong>. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- 2.2.2 additional information -->
                <div class="col-lg-5 position-relative">
                    <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                        <div class="card card-light-shadow mb-5">
                            <div class="card-body pb-0">
                                <div class="d-table flex-shrink-0 icon-box">
                                    <i class="bi bi-chat-square"></i>
                                </div>
                                <h3 class="titre-h5 mt-0">Commentaires</h3>
                                <p class="running-text">Supprimer, valider ou rejeter les commentaires de vos utilisateurs</p>
                            </div>
                        </div>
                        <div class="card card-background">
                            <div class="card-body">
                                <h4 class="titre-h4">Infos</h4>
                                <p class="running-text pb-4 mb-0 mb-lg-3">Seuls les utilisateurs ont la possibilité de commenter le blog.
                                </p>
                                <a href="index.php?action=blog" class="d-grid gap-2 btn btn-outline-primary mb-3">
                                    Voir le blog en direct
                                </a>
                                <a href="index.php?action=users" class="d-grid gap-2 btn btn-primary">
                                    Voir les utilisateurs
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>



<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-backend.php') ?>