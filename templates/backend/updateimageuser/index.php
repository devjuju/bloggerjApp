<?php

use App\Core\Auth;

$title = "Modifier la photo de profil"; ?>
<?php ob_start();
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
                <a href="index.php?action=posts" class="list-group-item list-group-item-action d-flex align-items-center">
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
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">
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
                <li class="breadcrumb-item active" aria-current="page">Modifier la photo de profil de : <strong> <?= $user->username ?></li>
            </ol>
        </nav>
        <div class="container spacing-col-padding-bottom-50">
            <h1 class="title-dasboard">Modifier la photo de profil de : <strong> <?= $user->username ?></h1>
        </div>
    </section>

    <section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4 ">
        <div class="container  spacing-col-padding-top-50 spacing-col-padding-bottom-50">
            <form action="index.php?action=update_image_user&id=<?= $user->id ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row gy-4">
                    <div class="col-lg-7">
                        <h2 class="titre-h3">Formulaire de modification</h2>
                        <p class="running-text mb-4 pb-2">Veillez remplir le formulaire de modification pour mettre à jour l'image mise en avant de l'article.</p>
                        <div class="row g-4">
                            <h3 class="titre-h5">Aperçu de l'image</h3>
                            <div class="card card-light-shadow mb-5">
                                <div class="card-body pt-0">
                                    <div class=" col-sm-12 form-group-style">
                                        <img src="uploads/<?= $user->image ?>" class="card-img-top img-fluid" alt="Image">
                                        <br><br>
                                        <input type="hidden" name="update_image_user[form]" value="ok">
                                        <label for="image" class="form-label"> Image mise en avant</label>
                                        <input type="file" id="image" name="image">
                                        <?= isset($controle["image"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["image"] . "</p>" : '' ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-5 position-relative">
                        <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                            <div class="card card-background">
                                <div class="card-body">
                                    <div class="text-center spacing-element-marging-bottom-20">
                                        <h4 class="titre-h4">Mettre à jour</h4>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="index.php?action=update_user&id=<?= $user->id ?>" class="btn btn-outline-primary mb-3">
                                            Retour au compte
                                        </a>
                                        <button type="submit" class="btn btn-primary">Modifier la photo de profil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-backend.php') ?>