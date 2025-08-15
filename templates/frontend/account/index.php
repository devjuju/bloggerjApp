<?php

use App\Core\Auth;

$title = "Mon compte"; ?>
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
                <div class="card card-shadow-account-active spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-eye"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Aperçu du compte</h5>
                            <p class="running-text mb-2">Détails du compte</p>
                        </div>
                    </div>
                </div>
                <a href="index.php?action=account_profil&id=<?= htmlspecialchars(Auth::get('auth', 'id'), ENT_QUOTES, 'UTF-8'); ?>" class="card card-shadow-account spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Profil du compte</h5>
                            <p class="running-text mb-2">Modifier la photo de profil</p>
                        </div>
                    </div>
                </a>
                <a href="index.php?action=account_settings&id=<?= htmlspecialchars(Auth::get('auth', 'id'), ENT_QUOTES, 'UTF-8'); ?>" class="card card-shadow-account spacing-content-marging-top-40">
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
                <a href="index.php?action=account_security&id=<?= htmlspecialchars(Auth::get('auth', 'id'), ENT_QUOTES, 'UTF-8'); ?>" class="card card-shadow-account spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Sécurité du compte</h5>
                            <p class="running-text mb-2">Modifier le mot de passe</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-6 col-lg-7 offset-xl-2">
                <div class="card-shadow">
                    <div class="card-header padding-bottom-20">
                        <div class="d-table flex-shrink-0 icon-box">
                            <i class="bi bi-eye"></i>
                        </div>
                        <h2 class="titre-h3">Aperçu du compte</h2>
                        <p class="running-text fs-5">Détails du compte</p>
                    </div>
                    <div class="card-body">
                        <div class="d-sm-flex align-items-center spacing-content-padding-bottom-40">
                            <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="d-block rounded-circle" width="80" alt="John Doe">
                            <div class="pt-3 pt-sm-0 ps-sm-3">
                                <h3 class="h5 mb-2"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8') ?><i class="ai-circle-check-filled fs-base text-success ms-2"></i></h3>
                                <div class="text-body-secondary fw-medium d-flex flex-wrap flex-sm-nowrap align-iteems-center">
                                    <div class="d-flex align-items-center me-3">
                                        <?= htmlspecialchars(Auth::get('auth', 'role'), ENT_QUOTES, 'UTF-8') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="border-0 text-body-secondary py-1 px-0">Nom</td>
                                    <td class="border-0 text-dark fw-medium py-1 ps-3"><?= htmlspecialchars(Auth::get('auth', 'lastname'), ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-0 text-body-secondary py-1 px-0">Prénom</td>
                                    <td class="border-0 text-dark fw-medium py-1 ps-3"><?= htmlspecialchars(Auth::get('auth', 'firstname'), ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-0 text-body-secondary py-1 px-0">Email</td>
                                    <td class="border-0 text-dark fw-medium py-1 ps-3"><?= htmlspecialchars(Auth::get('auth', 'email'), ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                                <tr>
                                    <td class="border-0 text-body-secondary py-1 px-0">Pseudo</td>
                                    <td class="border-0 text-dark fw-medium py-1 ps-3"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>