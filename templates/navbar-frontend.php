<!-- Navigation frontend -->
<header class="navbar navbar-expand-lg bg-light-subtle">
    <div class="container">
        <a href="index.php?action=home" class="navbar-brand">
            <img src="images/logo.png" width="47" alt="Blogger">
            blogger J
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse5" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav dropdown d-block order-lg-3 ms-4">




            <div class="d-flex align-items-center">
                <?php

                use App\Core\Auth;

                if (Auth::get('auth', 'role')) {
                ?>
                    <li class="nav-item">
                        <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>

                            <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">

                                <img src="images/profil-user-defaut-img.svg" class="rounded-circle" width="48" alt="Avatar">
                                <div class="ps-2">
                                    <div class="fs-xs lh-1 opacity-60">Hello,</div>
                                    <div class="fs-sm"><?= Auth::get('auth', 'username'); ?></div>
                                </div>

                            </div>




                        <?php } else { ?>


                            <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">

                                <img src="images/profil-user-defaut-img.svg" class="rounded-circle" width="48" alt="Avatar">
                                <div class="ps-2">
                                    <div class="fs-xs lh-1 opacity-60">Hello,</div>
                                    <div class="fs-sm"><?= Auth::get('auth', 'username'); ?></div>
                                </div>

                            </div>


                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="index.php?action=logout" class="btn btn-outline-secondary">
                        Se déconnecter
                    </a>
                </li>
            <?php } else { ?>
                <div class="d-flex flex-column flex-sm-row">
                    <a href="index.php?action=register" class="btn btn-primary mb-3 mb-sm-0 me-sm-3">S'inscrire</a>
                    <a href="index.php?action=login" class="btn btn-outline-primary">
                        Se connecter
                    </a>
                </div>
            <?php } ?>
            </div>
        </div>
        <nav id="navbarCollapse5" class="collapse navbar-collapse order-lg-2">
            <hr class="d-lg-none mt-3 mb-2">
            <ul class="navbar-nav me-auto">
                <li class="nav-item navigation">
                    <a href="index.php?action=home" class="nav-link active">Accueil</a>
                </li>
                <li class="nav-item navigation">
                    <a href="index.php?action=blog" class="nav-link">Blog</a>
                </li>
                <li class="nav-item navigation">
                    <a href="index.php?action=contact" class="nav-link">Contact</a>
                </li>


            </ul>
        </nav>
    </div>
</header>