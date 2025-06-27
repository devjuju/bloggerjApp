<header class="header-backend navbar navbar-expand fixed-top" data-scroll-header="">
    <div class="container-fluid pe-lg-4">
        <div class="d-flex align-items-center">
            <a href="index.php?action=dashboard" class="navbar-brand flex-shrink-0 py-1 py-lg-2">
                <img src="images/logo.png" alt="Blogger">
                <span>blogger J</span>
            </a>
        </div>
        <div class="d-flex align-items-center w-100">
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item">
                    <a href="index.php?action=dashboard" class="nav-link active">
                        <i class="bi bi-speedometer2 fs-lg opacity-80 me-2"></i>
                        Tableau de bord
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?action=blog" class="nav-link">
                        <i class="bi bi-box-arrow-up-right fs-lg opacity-80 me-2"></i>
                        Voir le blog en direct
                    </a>
                </li>
            </ul>
            <button type="button" class="navbar-toggler d-block d-lg-none ms-auto" data-bs-toggle="offcanvas" data-bs-target="#componentsNav" aria-controls="componentsNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="pe-lg-1 ms-lg-auto">
                <a href="index.php?action=logout" class="btn btn-primary btn-sm fs-sm rounded ms-4 d-none d-lg-inline-flex">
                    Se déconnecter
                </a>
            </div>

            <div class="display-alerts position-absolute 
            start-50 translate-middle">
                <?php

                use App\Core\Auth;

                if (Auth::has('message')) : ?>
                    <div class="alert alert-<?= Auth::get('message', 'class') ?> " role="alert">
                        <?php Auth::delete('message', 'class'); ?>
                        <?php echo Auth::get('message', 'content');
                        Auth::delete('message', 'content'); ?>
                    </div>
                <?php endif; ?>


            </div>

        </div>
    </div>
</header>