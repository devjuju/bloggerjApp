<!-- Footer -->
<footer class="footer py-5 bg-dark">
    <div class="container pt-lg-4">
        <div class="row pb-5">
            <div class="colonne-1 col-lg-4 col-md-6">
                <a class="navbar-brand text-nav py-0 mb-3 mb-md-4" href="index.php?action=home">
                    <span class="text-primary flex-shrink-0 me-2">
                        <img src="images/logo-negatif.png" width="47" alt="Blogger">
                    </span>
                    <span>blogger J</span>
                </a>
                <p>Une développeuse web passionnée et créative en vue d’évolution </p>
                <div class="d-flex">
                    <a href="https://www.facebook.com/?locale=fr_FR" class="btn btn-icon-social-secondary">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="https://fr.pinterest.com/" class="btn btn-icon-social-secondary">
                        <i class="bi bi-pinterest"></i>
                    </a>
                    <a href="https://fr.linkedin.com/" class="btn btn-icon-social-secondary">
                        <i class="bi bi-linkedin"></i>
                    </a>
                </div>
            </div>
            <div class="colonne-2 col-xl-6 col-lg-7 col-md-5 offset-xl-2 offset-md-1 pt-4 pt-md-1 pt-lg-0">
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-person fs-xl me-2"></i>
                        Justine Leleu
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-envelope fs-xl me-2"></i>
                        jleleubellpro1994@gmail.com
                    </li>
                    <div class="d-flex align-items-center">
                        <?php

                        use App\Core\Auth;

                        if (Auth::get('auth', 'role')) {
                        ?>
                            <li class="list-group-item d-flex align-items-center">
                                <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>

                                    <a href="index.php?action=dashboard">
                                        <i class="bi bi-lock fs-xl me-2"></i>
                                        Espace Administration
                                    </a>
                                <?php } else { ?>
                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-lock fs-xl me-2"></i>
                            Espace Administration
                        </li>
                    <?php } ?>
                    </div>
                </ul>
            </div>
        </div>
        <p class="nav fs-sm mb-0">
            <span>© Tous droits réservés. Faite avec</span>
            <a class="nav-link d-inline fw-normal p-0 ms-1" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/" target="_blank" rel="noopener">Bootstrap Creative Studio</a>
        </p>
    </div>
</footer>