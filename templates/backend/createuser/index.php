<?php

use App\Core\Auth;

$title = "Créer un utilisateur";

?>
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
                <a href="index.php?action=comments" class="list-group-item list-group-item-action d-flex align-items-center">
                    <div class="box-icon-account">
                        <i class="bi bi-chat-square-dots-fill"></i>
                    </div>
                    Commentaires
                </a>
                <div class="list-group-item list-group-item-action d-flex align-items-center active">
                    <div class="box-icon-account">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    Utilisateurs
                </div>
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
        <!-- 2.1.1 navigation -->
        <nav class="container spacing-col-padding-top-50" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=dashboard"><i class="bi bi-speedometer2 fs-lg me-1"></i>Tableau de bord</a>
                </li>
                <li class="breadcrumb-item">
                    <a class="breadcrumb-links" href="index.php?action=users">Les utilisateurs</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Ajouter un utilisateur</li>
            </ol>
        </nav>
        <!-- 2.1.2 page title -->
        <div class="container spacing-col-padding-bottom-50">
            <h1 class="title-dasboard">Ajouter un utilisateur</h1>
        </div>
    </section>

    <!-- 2.2 section user creation form  -->
    <section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4 ">
        <div class="container  spacing-col-padding-top-50 spacing-col-padding-bottom-50">
            <form method="post" class="needs-validation" enctype="multipart/form-data" novalidate>
                <div class="row gy-4">
                    <!-- 2.2.1 user info -->
                    <div class="col-lg-7">
                        <h2 class="titre-h3">Formulaire de création</h2>
                        <p class="running-text mb-4 pb-2">Veillez remplir le formulaire de création pour créer un nouvel utilisateur.</p>
                        <div class="row g-4">
                            <h3 class="titre-h5">Informations principales</h3>
                            <div class="col-sm-12 form-group-style2">
                                <label class="form-label fs-base" for="role">Role</label>
                                <select class="form-select" id="role" name="create_user[role]" value="<?= isset($createUser) ? $createUser->getRole() : '' ?>">
                                    <option <?= (isset($createUser) && $createUser->getRole() === 'utilisateur') ? 'selected' : '' ?>>utilisateur</option>
                                    <option <?= (isset($createUser) && $createUser->getRole() === 'administrateur') ? 'selected' : '' ?>>administrateur</option>
                                    <?= isset($controle["role"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["role"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group-style">
                                <label class="form-label fs-base" for="lastname">Nom</label>
                                <input class="form-control" type="text" placeholder="" id="lastname" name="create_user[lastname]" value="<?= isset($createUser) ? htmlspecialchars($createUser->getLastname(), ENT_QUOTES, 'UTF-8') : '' ?>">

                                <?= isset($controle["lastname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["lastname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                            <div class="col-sm-6 form-group-style">
                                <label class="form-label fs-base" for="firstname">Prénom</label>
                                <input class="form-control" type="text" placeholder="" id="firstname" name="create_user[firstname]" value="<?= isset($createUser) ? htmlspecialchars($createUser->getFirstname(), ENT_QUOTES, 'UTF-8') : '' ?>">

                                <?= isset($controle["firstname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["firstname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                            <div class="col-sm-12 form-group-style">
                                <label class="form-label fs-base" for="username">Pseudo</label>
                                <input class="form-control" type="text" placeholder="" id="username" name="create_user[username]" value="<?= isset($createUser) ? htmlspecialchars($createUser->getUsername(), ENT_QUOTES, 'UTF-8') : '' ?>">

                                <?= isset($controle["username"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["username"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                            <div class="col-sm-12 form-group-style">
                                <label class="form-label fs-base" for="email">Email</label>
                                <input type="email" placeholder="" id="email" name="create_user[email]" value="<?= isset($createUser) ? htmlspecialchars($createUser->getEmail(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["email"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                        </div>
                        <div class="row g-4 pt-5">
                            <h3 class="titre-h5">Sécurité du compte</h3>
                            <div class="col-12 mb-4 form-group-style">
                                <label for="password" class="form-label fs-base">Mot de passe</label>
                                <input type="password" id="password" name="create_user[password]" value="<?= isset($createUser) ? htmlspecialchars($createUser->getPassword(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                <?= isset($controle["password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["password"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                            <div class="col-12 mb-4 form-group-style">
                                <label for="confirm_password" class="form-label fs-base">Confirmer le mot de passe</label>
                                <input type="password" id="confirm_password" name="confirm_password">
                                <?= isset($controle["confirm_password"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["confirm_password"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                            </div>
                        </div>
                    </div>
                    <!-- 2.2.2 user publication & avatar -->
                    <div class="col-lg-5 position-relative">
                        <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                            <div class="card card-background">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h4 class="titre-h4">Ajouter l'utilisateur</h4>
                                        <br>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="index.php?action=posts" class="btn btn-outline-primary mb-3">
                                            Annuler
                                        </a>
                                        <button type="submit" class="btn btn-primary">Ajouter l'utilisateur</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-light-shadow mb-5">
                                <div class="card-header">
                                    <img src="images/avatar-image-register.svg" class="card-img-profil" alt="Image">
                                </div>
                                <div class="card-body text-center pt-0">
                                    <div class="col-sm-12 form-group-style">
                                        <label for="image" class="form-label"> Photo de profil</label>
                                        <input type="file" id="image" name="image" value="<?= isset($createUser) ? htmlspecialchars($createUser->getImage(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                        <?= isset($controle["image"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["image"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
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


<?php $content = ob_get_clean();
?>
<?php require('../templates/layout-backend.php')
?>