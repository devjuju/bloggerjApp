<?php

use App\Core\Auth;

$title = "Profil du compte"; ?>
<?php ob_start();
?>

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

<section class="pt-5 py-5 my-1 my-md-4 my-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <a href="index.php?action=account" class="card card-shadow-account spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-eye"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Aperçu du compte</h5>
                            <p class="running-text mb-2">Détails du compte</p>
                        </div>
                    </div>
                </a>
                <div class="card card-shadow-account-active spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Profil du compte</h5>
                            <p class="running-text mb-2">Modifier votre photo de profil</p>
                        </div>
                    </div>
                </div>
                <a href="index.php?action=account_settings&id=<?= Auth::get('auth', 'id'); ?>" class="card card-shadow-account spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-gear-fill"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Réglages du compte</h5>
                            <p class="running-text mb-2">Modifier vos informations personnelles</p>
                        </div>
                    </div>
                </a>
                <a href="index.php?action=account_security&id=<?= Auth::get('auth', 'id'); ?>" class="card card-shadow-account spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Sécurité du compte</h5>
                            <p class="running-text mb-2">Modifier votre mot de passe</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-7 offset-xl-2">
                <div class="card-shadow">
                    <div class="card-header">
                        <div class="d-table flex-shrink-0 icon-box">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <h2 class="titre-h3">Profil du compte</h2>
                        <p class="running-text fs-5">
                            Modifier la photo de profil
                        </p>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" enctype="multipart/form-data" novalidate="">
                            <div class="row g-4">
                                <div class="col-sm-12 form-group-style">
                                    <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3  spacing-content-padding-top-40">
                                        <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                                            <div class="d-flex align-items-center me-3">
                                                <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="img-fluid rounded-circle" width="100" alt="Image">
                                                <div class="ps-3">
                                                    <input type="hidden" name="account_profil[form]" value="ok">
                                                    <label for="image" class="form-label"> Photo de profil</label>
                                                    <input type="file" id="image" name="image">
                                                </div>
                                            </div>
                                            <?= isset($controle["image"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["image"] . "</p>" : '' ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-grid gap-2">
                                        <a href="index.php?action=account" class="btn btn-outline-primary mb-3">
                                            Annuler
                                        </a>
                                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
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