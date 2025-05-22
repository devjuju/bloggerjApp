<?php

use App\Core\Auth;

$title = "Modifier la photo de profil"; ?>
<?php ob_start();
?>



<aside>
    <div id="docsNav" class="offcanvas-aside offcanvas-lg offcanvas-start d-flex flex-column position-fixed top-0 start-0 vh-100 bg-dark border-end-lg">
        <div class="offcanvas-header d-none d-lg-flex justify-content-start">
            <a href="index.php?action=admin" class="navbar-brand d-none d-lg-flex py-0">
                <img src="images/logo-negatif.png" class="img-fluid" alt="Blogger">
                <span>blogger J</span>
            </a>
        </div>
        <div class="offcanvas-header d-block d-lg-none border-bottom">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="d-lg-none mb-0">Menu</h5>
                <button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#docsNav" aria-label="Close"></button>
            </div>
            <div class="list-group list-group-flush mx-n4">
                <a href="index.php?action=admin" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-2 px-4 active">
                    <i class="bi bi-speedometer2 fs-lg  me-2"></i>
                    Tableau de bord
                </a>
                <a href="index.php?action=home" class="list-group-item list-group-item-action d-flex align-items-center border-0 py-2 px-4">
                    <i class="bi bi-display fs-lg  me-2"></i>
                    Le blog
                </a>
            </div>
        </div>
        <div class="offcanvas-body p-4">
            <div class="swiper-wrapper">
                <div class="swiper-slide h-auto spacing-col-padding-top-100">

                    <div class="d-table position-relative mx-auto avatar-offcanvas">
                        <img src="images/avatar.png" class="d-block rounded-circle" width="120" alt="John Doe">
                    </div>
                    <div class="profil-offcanvas">
                        <h5><?= Auth::get('auth', 'username'); ?></h5>
                        <p><?= Auth::get('auth', 'email'); ?></p>
                    </div>

                    <!-- Flush list group -->
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">
                            <div class="box-icon-account">
                                <i class="bi bi-pin-fill"></i>
                            </div>

                            Articles
                        </a>

                        <a href="index.php?action=comments" class="list-group-item list-group-item-action d-flex align-items-center ">
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
            </div>
            <div class="swiper-scrollbar end-0">
            </div>
        </div>
        <div class="offcanvas-header border-top">
            <a href="https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/" class="btn btn-primary w-100" target="_blank" rel="noopener">
                <i class="bi bi-arrow-right me-2"></i>
                Se déconnecter
            </a>
        </div>
    </div>
</aside>

<main>

    <section class="container-fluid p-5 bg-light-subtle">
        <nav class="container py-4 mb-lg-2" aria-label="breadcrumb">
            <ol class="breadcrumb pt-lg-3 mb-0">
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=dashboard"><i class="bi bi-speedometer2 fs-lg me-1"></i>Tableau de bord</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=posts">Articles</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Modifier la photo de profil de : <strong> <?= $user->username ?> </strong></li>
            </ol>
        </nav>
        <div class="container pb-4 mt-n1 mt-lg-0">
            <h1 class="title-dasboard">Modifier la photo de profil de : <strong> <?= $user->username ?> </strong></h1>
        </div>
    </section>
    <section class="container-fluid p-5 ">
        <div class="container spacing-col-padding-top-100 spacing-col-padding-bottom-100">
            <form action="index.php?action=update_image_user&id=<?= $user->id ?>" method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row gy-4">
                    <!-- Content -->
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
                    <!-- Sharing -->
                    <div class="col-lg-5 position-relative">
                        <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                            <!-- Basic card example -->
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