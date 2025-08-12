<?php

use App\Core\Auth;
use App\Core\DateFormatter;

$title = "Articles";

ob_start();
?>


<aside data-bs-theme="dark">
    <div id="componentsNav" class="offcanvas-lg offcanvas-start d-flex flex-column position-fixed top-0 start-0 vh-100 bg-dark border-end-lg" style="width: 21rem; z-index: 1045;">
        <div class="offcanvas-header d-none d-lg-flex justify-content-start">
            <a href="index.php?action=dashboard" class="navbar-brand text-dark d-none d-lg-flex py-0">
                <img src="images/logo-negatif.png" class="img-fluid" alt="Blogger">
                <span>blogger J</span>
            </a>
        </div>
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
        <div class="offcanvas-body w-100 p-4 ">
            <div class="list-group list-group-flush">
                <div class="d-table mx-auto spacing-col-padding-top-50 spacing-col-padding-bottom-50">
                    <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8'); ?>" class="d-block rounded-circle" width="120" alt="">
                    <div class="avatar-offcanvas">
                        <h5><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p><?= htmlspecialchars(Auth::get('auth', 'email'), ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
                <a href="" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <div class="box-icon-account">
                        <i class="bi bi-pin-fill"></i>
                    </div>
                    Articles
                </a>
                <a href="index.php?action=comments" class="list-group-item list-group-item-action d-flex align-items-center">
                    <div class="box-icon-account">
                        <i class="bi bi-chat-square-dots-fill"></i>
                    </div>
                    Commentaires
                </a>
                <a href="index.php?action=users" class="list-group-item list-group-item-action d-flex align-items-center ">
                    <div class="box-icon-account">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    Utilisateurs
                </a>
            </div>
        </div>
        <div class="offcanvas-header border-top">
            <a href="index.php?action=logout" class="btn btn-primary w-100">
                Se déconnecter
            </a>
        </div>
    </div>
</aside>

<main>
    <section class="container-fluid bg-light-subtle px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
        <nav class="container spacing-col-padding-top-50" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=dashboard"><i class="bi bi-speedometer2 fs-lg me-1"></i>Tableau de bord</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Les articles</li>
            </ol>
        </nav>
        <div class="container spacing-col-padding-bottom-50">
            <h1 class="title-dasboard">Les articles</h1>
        </div>
    </section>
    <section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
        <div class="container  spacing-col-padding-top-50 spacing-col-padding-bottom-50">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1 gy-md-4 gy-2">
                        <?php foreach ($posts as $post): ?>
                            <div class="col pb-3">
                                <article class="card card-article border-0 ">
                                    <div class="position-relative">
                                        <span class="badge bg-primary text-white position-absolute top-0 start-0 zindex-5 me-3 mt-3 running-text"><?= $post->status ?></span>
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
                                                <span class="fs-sm"><?= $post->author ?></span>
                                            </div>
                                            <div class="meta-content-blog bd-highlight">
                                                <i class="bi bi-clock-fill fs-base me-1"></i>
                                                <span class="fs-sm"><?= DateFormatter::enFrancais($post->created_at); ?></span>
                                            </div>
                                        </div>
                                        <p class="running-text"><?= $post->excerpt ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex">
                                            <?php if ($post->status  === "Désactivé"): ?>
                                                <div class="box-show-icon">
                                                    <i class="bi bi-eye-slash"></i>
                                                </div>
                                                <a href="index.php?action=active_post&id=<?= $post->id ?>" class="box-hide-outline-icon">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                            <?php else: ?>
                                                <div class="box-show-outline-icon">
                                                    <i class="bi bi-eye"></i>
                                                </div>
                                                <a href="index.php?action=desactive_post&id=<?= $post->id ?>" class="box-hide-icon">
                                                    <i class="bi bi-eye-slash"></i>
                                                </a>
                                            <?php endif; ?>

                                            <a href="index.php?action=update_post&id=<?= $post->id ?>" class="btn btn-icon-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="index.php?action=delete_post&id=<?= $post->id ?>" class="btn btn-icon-secondary">
                                                <i class="bi bi-trash3"></i>
                                            </a>
                                        </div>
                                        <br>
                                        <form action="" method="POST">
                                            <div class="mb-3 visually-hidden">
                                                <label for="id" class="form-label">Identifiant de la recette</label>
                                                <input type="hidden" class="form-control" id="id" name="id" value="">
                                            </div>
                                        </form>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-5 position-relative">
                    <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                        <div class="card card-light-shadow mb-5">
                            <div class="card-body pb-0">
                                <div class="d-table flex-shrink-0 icon-box">
                                    <i class="bi bi-pin"></i>
                                </div>
                                <h3 class="titre-h5 mt-0">Articles</h3>
                                <p class="running-text">Créez, modifier et gérer les contenus publiés du blog</p>
                            </div>
                        </div>
                        <div class="card card-background">
                            <div class="card-body">
                                <h4 class="titre-h4">Le blog</h4>
                                <p class="running-text pb-4 mb-0 mb-lg-3">Une succession d’articles à propos de sujets précis sur le développement web,les applications…</p>
                                <a href="index.php?action=blog" class="d-grid gap-2 btn btn-outline-primary mb-3">
                                    Le blog en direct
                                </a>
                                <a href="index.php?action=create_post" class="d-grid gap-2 btn btn-primary">
                                    Ajouter un article
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