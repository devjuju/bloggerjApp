<?php

use App\Core\Auth;

$title = "Mon compte"; ?>
<?php ob_start();
?>

<!-- breadcrumb -->
<section class="container-fluid p-5 bg-light-subtle">
    <nav class="container py-4 mb-lg-2" aria-label="breadcrumb">
        <ol class="breadcrumb pt-lg-3 mb-0">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
        </ol>
    </nav>
    <div class="container pb-4 mt-n1 mt-lg-0">
        <h1 class="titre-page">Mon compte
        </h1>
    </div>
</section>



<section class="container pt-5">
    <div class="row">


        <!-- Sidebar (User info + Account menu) -->
        <aside class="col-lg-3 col-md-4  pb-5 mt-n5">
            <div class="position-sticky top-0">
                <div class="text-center pt-5">

                    <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                        <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="d-block rounded-circle" width="120" alt="">
                    </div>
                    <h2 class="h5 mb-1"><?= Auth::get('auth', 'username'); ?></h2>
                    <p class="mb-3 pb-3"><?= Auth::get('auth', 'email'); ?></p>


                    <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                        <i class="bi bi-lock fs-xl me-2"></i>
                        Compte menu
                        <i class="bi bi-lock fs-lg ms-1"></i>
                    </button>
                    <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active">
                            <div class="box-icon-account">
                                <i class="bi bi-person-fill"></i>
                            </div>

                            Aperçu du compte
                        </a>




                        <a href="index.php?action=account_settings&id=<?= Auth::get('auth', 'id'); ?>" class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="box-icon-account">
                                <i class="bi bi-gear-fill"></i>
                            </div>

                            Réglages du compte
                        </a>
                        <a href="index.php?action=accountsecurity" class="list-group-item list-group-item-action d-flex align-items-center ">
                            <div class="box-icon-account">
                                <i class="bi bi-lock-fill"></i>
                            </div>

                            Sécurité du compte
                        </a>




                        <a href="index.php?action=home" class="list-group-item list-group-item-action d-flex align-items-center exit-account">
                            <div class="box-icon-account">
                                <i class="bi bi-box-arrow-left"></i>
                            </div>
                            Se déconnecter
                        </a>



                    </div>

                </div>
            </div>



        </aside>


        <!-- Account details -->
        <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">



            <div class="card-shadow py-3 p-sm-4 p-md-5">
                <div class="card-header">
                    <div class="d-flex align-items-center mt-sm-n1 pb-4 mb-0 mb-lg-1 mb-xl-3">
                        <i class="bi bi-person-fill text-primary lead pe-1 me-2"></i>
                        <h2 class="h4 mb-0">Informations personnelles</h2>
                        <a class="btn btn-sm btn-secondary ms-auto" href="index.php?action=accountsettings">
                            <i class="bi bi-pencil-fill ms-n1 me-2"></i>
                            Editer le profil
                        </a>
                    </div>

                </div>

                <div class="card-body">


                    <div class="row py-4 mb-2 mb-sm-3">


                        <div class="col-md-6 mb-4 mb-md-0">

                            <div class="d-sm-flex align-items-center spacing-content-padding-bottom-40">
                                <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="d-block rounded-circle" width="80" alt="John Doe">

                                <div class="pt-3 pt-sm-0 ps-sm-3">
                                    <h3 class="h5 mb-2"><?= Auth::get('auth', 'username'); ?><i class="ai-circle-check-filled fs-base text-success ms-2"></i></h3>
                                    <div class="text-body-secondary fw-medium d-flex flex-wrap flex-sm-nowrap align-iteems-center">
                                        <div class="d-flex align-items-center me-3">

                                            <?= Auth::get('auth', 'role'); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="border-0 text-body-secondary py-1 px-0">Nom</td>
                                        <td class="border-0 text-dark fw-medium py-1 ps-3"><?= Auth::get('auth', 'lastname'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-body-secondary py-1 px-0">Prénom</td>
                                        <td class="border-0 text-dark fw-medium py-1 ps-3"><?= Auth::get('auth', 'firstname'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-body-secondary py-1 px-0">Email</td>
                                        <td class="border-0 text-dark fw-medium py-1 ps-3"><?= Auth::get('auth', 'email'); ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-body-secondary py-1 px-0">Pseudo</td>
                                        <td class="border-0 text-dark fw-medium py-1 ps-3"><?= Auth::get('auth', 'username'); ?></td>
                                    </tr>
                                </tbody>
                            </table>



                        </div>





                        <div class="col-md-6 d-md-flex justify-content-end">
                            <img src="images/bloggerj-img-01.svg" class="img-fluid" alt="image">

                        </div>
                    </div>














































                </div>
            </div>




        </div>
    </div>
</section>









<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>