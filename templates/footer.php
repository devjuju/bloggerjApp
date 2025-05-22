<footer class="footer py-5 bg-dark">
    <div class="container pt-md-2 pt-lg-3 pt-xl-4">
        <div class="row pb-4 pb-md-5 pt-sm-2 mb-lg-2">
            <div class="colonne-1 col-md-4 col-lg-3 pb-2 pb-md-0 mb-4 mb-md-0">
                <a class="navbar-brand text-nav py-0 mb-3 mb-md-4" href="index.php?action=home">
                    <span class="text-primary flex-shrink-0 me-2">
                        <img src="images/logo-negatif.png" width="47" alt="Blogger">
                    </span>
                    <span>blogger J</span>
                </a>
                <p>Une développeuse web passionnée et créative en vue d’évolution </p>
                <div class="d-flex">
                    <!-- Facebook -->
                    <a href="#" class="btn btn-icon-social-secondary btn-facebook" aria-label="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <!-- Twitter -->
                    <a href="#" class="btn btn-icon-social-secondary btn-twitter" aria-label="Twitter">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <!-- Instagram -->
                    <a href="#" class="btn btn-icon-social-secondary btn-instagram" aria-label="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                </div>
            </div>
            <div class="colonne-2 col-md-7 col-lg-6 pb-2 pb-md-0 mb-4 mb-md-0">
                <!-- List group with icons -->
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-person fs-xl me-2"></i>
                        Justine Leleu
                    </li>
                    <li class="list-group-item d-flex align-items-center">
                        <i class="bi bi-envelope fs-xl me-2"></i>
                        jleleubellpro1994@gmail.com

                    </li>

                    <?php

                    use App\Core\Auth;

                    if (Auth::get('auth', 'role')) {
                    ?>
                        <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-wrench-adjustable-circle fs-xl me-2"></i>

                                <a class="text-secondary" href="index.php?action=dashboard"> Espace Administration</a>

                            </li>
                        <?php } else { ?>
                            <li class="list-group-item d-flex align-items-center">
                                <i class="bi bi-lock fs-xl me-2"></i>

                                <button type="button" class="btn btn-link-light" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1">
                                    Espace Administration
                                </button>

                                <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content modal-alert-danger ">
                                            <div class="modal-header">



                                                <!--begin::Close-->
                                                <div class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                                                    <i class="bi bi-x"><span class="path1"></span><span class="path2"></span></i>
                                                </div>
                                                <!--end::Close-->
                                            </div>

                                            <div class="modal-body">

                                                <!--begin::Icon-->
                                                <div class="d-table position-relative mx-auto icon-box">
                                                    <i class="bi bi-dash-circle"></i>
                                                </div>
                                                <!--end::Icon-->

                                                <!--begin::Wrapper-->
                                                <div class="text-center">
                                                    <!--begin::Title-->
                                                    <h1 class="fw-bold text-danger">Accès interdit</h1>
                                                    <!--end::Title-->

                                                    <!--begin::Content-->
                                                    <p class="running-text">
                                                        Vous ne disposez pas des droits d’administration.
                                                        L’accès à l’espace d’administration n’est pas autorisé. Pour plus d’infos, contacter l’administrateur.
                                                    </p>
                                                    <!--end::Content-->


                                                </div>
                                                <!--end::Wrapper-->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fermer</button>
                                                <a href="index.php?action=contact">
                                                    <button type="button" class="btn btn-danger">En savoir plus</button>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </li>
                        <?php } ?>
                    <?php } else { ?>
                        <li class="list-group-item d-flex align-items-center">
                            <i class="bi bi-lock fs-xl me-2"></i>

                            <button type="button" class="btn btn-link-light" data-bs-toggle="modal" data-bs-target="#kt_modal_stacked_1">
                                Espace Administration
                            </button>

                            <div class="modal fade" tabindex="-1" id="kt_modal_stacked_1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-alert-danger ">
                                        <div class="modal-header">



                                            <!--begin::Close-->
                                            <div class="btn btn-icon" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="bi bi-x"><span class="path1"></span><span class="path2"></span></i>
                                            </div>
                                            <!--end::Close-->
                                        </div>

                                        <div class="modal-body">

                                            <!--begin::Icon-->
                                            <div class="d-table position-relative mx-auto icon-box">
                                                <i class="bi bi-dash-circle"></i>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Wrapper-->
                                            <div class="text-center">
                                                <!--begin::Title-->
                                                <h1 class="fw-bold text-danger">Accès interdit</h1>
                                                <!--end::Title-->

                                                <!--begin::Content-->
                                                <p class="running-text">
                                                    Vous ne disposez pas des droits d’administration.
                                                    L’accès à l’espace d’administration n’est pas autorisé. Pour plus d’infos, contacter l’administrateur.
                                                </p>
                                                <!--end::Content-->


                                            </div>
                                            <!--end::Wrapper-->
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Fermer</button>
                                            <a href="index.php?action=contact">
                                                <button type="button" class="btn btn-danger">En savoir plus</button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>


                        </li>

                    <?php } ?>









                </ul>
            </div>
            <div class="colonne-3 col-md-4 col-lg-3 pb-2 pb-md-0 mb-4 mb-md-0">
                <form class="needs-validation" novalidate="">
                    <label for="subscr-email" class="form-label">
                    </label>
                    <div class="input-group">
                        <input type="email" id="subscr-email" class="form-control rounded-start" placeholder="Votre email" required="">
                        <div class="invalid-tooltip position-absolute top-100 start-0">Please provide a valid email address.</div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
        <p class="nav fs-sm mb-0">
            <span>© Tous droits réservés. Faite avec</span>
            <a class="nav-link d-inline fw-normal p-0 ms-1" href="https://getbootstrap.com/docs/5.0/getting-started/introduction/" target="_blank" rel="noopener">Bootstrap Creative Studio</a>
        </p>
    </div>
</footer>