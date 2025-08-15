<?php

use App\Core\Auth; // Importation de la classe Auth pour gérer les données utilisateur connectées

$title = "Modifier les privilèges de l'utilisateur"; // Titre de la page 

?>
<?php ob_start(); // Démarre la temporisation de sortie pour capturer le contenu de la page
?>


<aside data-bs-theme="dark">
    <div id="componentsNav" class="offcanvas-lg offcanvas-start d-flex flex-column position-fixed top-0 start-0 vh-100 bg-dark border-end-lg" style="width: 21rem; z-index: 1045;">
        <!-- Logo + lien tableau de bord -->
        <div class="offcanvas-header d-none d-lg-flex justify-content-start">
            <a href="index.php?action=dashboard" class="navbar-brand text-dark d-none d-lg-flex py-0">
                <img src="images/logo-negatif.png" class="img-fluid" alt="Blogger">
                <span>blogger J</span>
            </a>
        </div>
        <!-- Menu mobile -->
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
                <!-- Zone utilisateur -->
                <div class="d-table mx-auto spacing-col-padding-top-50 spacing-col-padding-bottom-50">
                    <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8'); ?>" class="d-block rounded-circle" width="120" alt="">
                    <div class="avatar-offcanvas">
                        <h5><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p><?= htmlspecialchars(Auth::get('auth', 'email'), ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
                <!-- Liens navigation -->
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
        <!-- Bouton déconnexion -->
        <div class="offcanvas-header border-top">
            <a href="index.php?action=logout" class="btn btn-primary w-100">
                Se déconnecter
            </a>
        </div>
    </div>
</aside>

<!-- ===================== CONTENU PRINCIPAL ===================== -->
<main>
    <!-- Fil d’Ariane -->
    <section class="container-fluid bg-light-subtle px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
        <nav class="container spacing-col-padding-top-50" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=dashboard"><i class="bi bi-speedometer2 fs-lg me-1"></i>Tableau de bord</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Modifier les privilèges de l'utilisateur <strong><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?></strong></li>
            </ol>
        </nav>
        <div class="container spacing-col-padding-bottom-50">
            <h1 class="title-dasboard">Modifier les privilèges de l'utilisateur <strong><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?></strong></h1>
        </div>
    </section>
    <!-- Formulaire création utilisateur -->
    <section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4 ">
        <div class="container  spacing-col-padding-top-50 spacing-col-padding-bottom-50">
            <form method="post" class="needs-validation" novalidate="">
                <div class="row gy-4">
                    <!-- Colonne gauche : infos principales -->
                    <div class="col-lg-7">
                        <h2 class="titre-h3">Formulaire de modifications</h2>
                        <p class="running-text mb-4 pb-2">Veillez changer le role de l'utilisateur <strong><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?></strong> pour lui permettre d'administrer le blog.</p>
                        <!-- Infos principales -->
                        <div class="row g-4">
                            <h3 class="titre-h5">Informations principales</h3>

                            <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3  ">
                                <div class="d-flex align-items-center flex-wrap text-muted ">
                                    <div class="d-flex align-items-center me-3">
                                        <img src="uploads/<?= htmlspecialchars($user->image, ENT_QUOTES, 'UTF-8') ?>" class="d-block rounded-circle" class="img-fluid rounded-circle" width="80" alt="Image">
                                        <div class="ps-3">
                                            <h4 class="titre-h5"><?= htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8') ?></h4>
                                            <p class="running-text"><?= htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8') ?></p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Rôle -->
                            <div class="col-sm-12 form-group-style2">


                                <label class="form-label fs-base" for="role">Rôle</label>
                                <select class="form-select" id="role" name="update_user[role]">
                                    <?php
                                    $roles = ['utilisateur', 'administrateur'];
                                    $currentRole = isset($updateUser) ? $updateUser->getRole() : $user->role;
                                    foreach ($roles as $roleOption):
                                    ?>
                                        <option value="<?= htmlspecialchars($roleOption, ENT_QUOTES, 'UTF-8') ?>"
                                            <?= $currentRole === $roleOption ? 'selected' : '' ?>>
                                            <?= htmlspecialchars(ucfirst($roleOption), ENT_QUOTES, 'UTF-8') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <?= isset($controle['role']) ? '<p class="text-danger"><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["role"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>



                            </div>

                        </div>

                    </div>
                    <!-- Colonne droite : résumé et image -->
                    <div class="col-lg-5 position-relative">
                        <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                            <!-- Carte validation -->
                            <div class="card card-background">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="titre-h4">Mettre à jour</h4>
                                        <br>
                                    </div>



                                    <div class="d-grid gap-2">
                                        <a href="index.php?action=users" class="btn btn-outline-primary mb-3">
                                            Annuler
                                        </a>
                                        <button type="submit" class="btn btn-primary">Modifier les privilèges</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Carte image -->

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- ===================== FIN DE PAGE ===================== -->
<?php $content = ob_get_clean(); // Stocke le contenu HTML généré 
?>
<?php require('../templates/layout-backend.php') // Inclut le layout principal du back-office 
?>