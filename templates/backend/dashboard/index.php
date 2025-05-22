<?php $title = "Tableau de bord";

use App\Core\Auth;
?>
<?php ob_start();
?>


<aside>
    <div id="docsNav" class="offcanvas-aside offcanvas-lg offcanvas-start d-flex flex-column position-fixed top-0 start-0 vh-100 bg-dark border-end-lg">
        <div class="offcanvas-header d-none d-lg-flex justify-content-start">
            <a href="index.php?action=dashboard" class="navbar-brand d-none d-lg-flex py-0">
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
                        <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="d-block rounded-circle" width="120" alt="">
                    </div>
                    <div class="profil-offcanvas">
                        <h5><?= Auth::get('auth', 'username'); ?></h5>
                        <p><?= Auth::get('auth', 'email'); ?></p>
                    </div>
                    <!-- Flush list group -->
                    <div class="list-group list-group-flush">
                        <a href="index.php?action=posts" class="list-group-item list-group-item-action d-flex align-items-center">
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

    <section class="container-fluid p-5 bg-light-subtle ">



        <div class="container spacing-col-padding-top-100 spacing-col-padding-bottom-150">

            <div class="d-table position-relative mx-auto spacing-element-marging-bottom-20">
                <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="d-block rounded-circle" width="100" alt="">
            </div>
            <div class="text-center spacing-content-marging-bottom-40">
                <!-- Page title -->
                <h1 class="titre-section">Bienvenue <?= Auth::get('auth', 'username') . ' ' . Auth::get('auth', 'email'); ?></h1>



                <h2 class="titre-h3">Outils pour gérer votre blog</h2>
                <p class="running-text pb-4 mb-2 mb-lg-3">Mise en place d’une interface vous accordant la possibilité de gérer
                    tout le contenu publié du blog.</p>

            </div>


            <!-- Services grid -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 pb-sm-3 pb-md-4 pb-xl-5">

                <!-- Item -->
                <div class="col">
                    <a class="card card-light  border-0 h-100 text-decoration-none" href="index.php?action=posts">
                        <div class="card-body pb-0">
                            <div class="d-table flex-shrink-0 icon-box">
                                <i class="bi bi-pin"></i>
                            </div>
                            <h3 class="titre-h5 mt-0">Articles</h3>
                            <p class="running-text">Créez, modifier et gérer les contenus publiés du blog</p>
                        </div>

                    </a>
                </div>
                <!-- Item -->
                <div class="col">
                    <a class="card card-light border-0 h-100 text-decoration-none" href="index.php?action=comments">
                        <div class="card-body pb-0">
                            <div class="d-table flex-shrink-0 icon-box">
                                <i class="bi bi-chat-square fs-lg"></i>
                            </div>
                            <h3 class="titre-h5 mt-0">Commentaires</h3>
                            <p class="running-text">Supprimer ou valider les commentaires de vos utilisateurs</p>
                        </div>

                    </a>
                </div>

                <!-- Item -->
                <div class="col">
                    <a class="card card-light border-0 h-100 text-decoration-none" href="index.php?action=users">
                        <div class="card-body pb-0">
                            <div class="d-table flex-shrink-0 icon-box">
                                <i class="bi bi-person fs-lg"></i>
                            </div>
                            <h3 class="titre-h5 mt-0">Utilisateurs</h3>
                            <p class="running-text">Créer, supprimer et gérer vos utilisateurs</p>

                        </div>

                    </a>
                </div>


            </div>

        </div>



    </section>



</main>












<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-backend.php') ?>