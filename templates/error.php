<?php

ob_start();

?>
<section class="container-fluid position-relative px-0">
    <div class="row g-0">
        <div class="col-xl-6 col-lg-5 pe-lg-5">
            <div class="d-flex h-100 pe-xl-4">
                <img src="images/bloggerj-exception-img.svg" class="img-fluid" alt="image">
            </div>
        </div>
        <div class="col-xl-6 col-lg-5 position-relative py-5">

            <div class="position-relative zindex-5 text-center text-lg-start px-3 px-lg-0 py-xl-4 py-xxl-5 mt-lg-3 mx-auto mx-lg-0" style="max-width: 530px;">

                <h1 class="heading-home">Une erreur est survenue !</h1>

                <div class="d-flex align-items-start spacing-content-padding-top-40 spacing-element-marging-bottom-20">
                    <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <div class="ps-3 ps-sm-4">
                        <h5 class="titre-h3 mb-2">Message</h5>
                        <p class="running-text mb-2"><strong class="text-primary">Erreur :</strong> <?= $message ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-start spacing-content-marging-bottom-40">
                    <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                        <i class="bi bi-search"></i>
                    </div>
                    <div class="ps-3 ps-sm-4">
                        <h5 class="titre-h3 mb-2">Ligne</h5>
                        <p class="running-text mb-2"><strong class="text-primary">sur la ligne :</strong> <?= $line ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-start spacing-element-marging-bottom-20">
                    <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                        <i class="bi bi-file-earmark"></i>
                    </div>
                    <div class="ps-3 ps-sm-4">
                        <h5 class="titre-h3 mb-2">Fichier</h5>
                        <p class="running-text mb-2"><strong class="text-primary">dans le fichier :</strong> <?= $file ?></p>
                    </div>
                </div>
                <div class="d-flex align-items-start">
                    <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <div class="ps-3 ps-sm-4">
                        <h5 class="titre-h3 mb-2">Code</h5>
                        <p class="running-text mb-2"><strong class="text-primary">avec le code suivant :</strong> <?= $code ?></p>
                    </div>
                </div>
            </div>
        </div>

</section>

<?php $content = ob_get_clean(); ?>
<?php require '../templates/layout_errors.php'; ?>