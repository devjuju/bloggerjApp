<!-- Top navbar de connection admin -->
<?php

use App\Core\Auth;

if (Auth::get('auth', 'role')) {
?>

    <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>
        <nav class="navbar bg-extra-light-subtle">
            <div class="container-fluid d-flex justify-content-between align-items-center w-100">
                <div class="nav-link d-flex align-items-center p-0">
                    <a class="my-lg-0 running-text" href="index.php?action=dashboard"><i class="bi bi-chevron-left"></i> Retour à l'espace administration</a>
                </div>
                <!-- Justified horizontal list group (starting sm screen) -->
                <ul class="list-group list-group-horizontal-sm">
                    <li class="list-group-item flex-fill text-center p-3"> <i class="bi bi-eye-fill fs-xl me-2"></i> Aperçu du blog</li>
                    <li class="list-group-item flex-fill text-center">

                        <button type="button" class="btn btn-icon-modal-warning" data-bs-toggle="modal" data-bs-target="#posts">
                            <i class="bi bi-pin-fill"></i>
                        </button>

                        <div class="modal fade" tabindex="-1" id="posts">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content modal-alert-warning ">
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
                                            <i class="bi bi-pin-fill"></i>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="text-center">
                                            <!--begin::Title-->
                                            <h1 class="fw-bold text-warning">Les articles</h1>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <p class="running-text">
                                                Créez, modifier et gérer les contenus publiés du blog
                                            </p>
                                            <!--end::Content-->


                                        </div>
                                        <!--end::Wrapper-->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Fermer</button>
                                        <a href="index.php?action=create_post">
                                            <button type="button" class="btn btn-warning">Ajouter un article</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item flex-fill text-center">

                        <button type="button" class="btn btn-icon-modal-secondary" data-bs-toggle="modal" data-bs-target="#comments">
                            <i class="bi bi-chat-dots-fill"></i>
                        </button>

                        <div class="modal fade" tabindex="-1" id="comments">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content modal-alert-secondary ">
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
                                            <i class="bi bi-chat-dots-fill"></i>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="text-center">
                                            <!--begin::Title-->
                                            <h1 class="fw-bold text-secondary">Les commentaires</h1>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <p class="running-text">
                                                Supprimer ou valider les commentaires de vos utilisateurs
                                            </p>
                                            <!--end::Content-->


                                        </div>
                                        <!--end::Wrapper-->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Fermer</button>
                                        <a href="index.php?action=comments">
                                            <button type="button" class="btn btn-secondary">Valider les commentaires</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item flex-fill text-center">

                        <button type="button" class="btn btn-icon-modal-primary" data-bs-toggle="modal" data-bs-target="#users">
                            <i class="bi bi-people-fill"></i>
                        </button>

                        <div class="modal fade" tabindex="-1" id="users">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content modal-alert-primary ">
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
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Wrapper-->
                                        <div class="text-center">
                                            <!--begin::Title-->
                                            <h1 class="fw-bold text-primary">Les utilisateurs</h1>
                                            <!--end::Title-->

                                            <!--begin::Content-->
                                            <p class="running-text">
                                                Créer, supprimer et gérer vos utilisateurs
                                            </p>
                                            <!--end::Content-->


                                        </div>
                                        <!--end::Wrapper-->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Fermer</button>
                                        <a href="index.php?action=create_user">
                                            <button type="button" class="btn btn-primary">Ajouter un utilisateur</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

                <div class="nav-link d-flex align-items-center p-0 running-text">
                    Créez votre premier blog en PHP avec Bootstrap

                </div>

            </div>
        </nav>

    <?php } else { ?>

    <?php } ?>

<?php } else { ?>

<?php } ?>