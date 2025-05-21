<?php $title = "Accueil";
?>

<?php ob_start(); ?>

<section class="container-fluid bg-light-subtle">
    <div class="container pb-4 mt-n1 mt-lg-0">
        <div class="row">

            <div class="col-md-6 spacing-col-padding-top-100">

                <div class="spacing-content-padding-bottom-40">
                    <h1 class="heading-home">
                        Une développeuse web passionnée et créative en vue d’évolution
                    </h1>
                    <p class="running-text">Avec une soif d’apprentissage assidue vous offrant des solutions adaptées à votre domaine d’activité sans limites ni contraintes
                        au delà de vos espérances.</p>

                </div>

                <div class="d-flex flex-column flex-sm-row">
                    <a href="index.php?action=blog" class="btn btn-primary mb-3 mb-sm-0 me-sm-3">Voir le blog</a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="bi bi-file-pdf-fill fs-xl ms-2 me-n1"></i>
                        Me contacter
                    </a>
                </div>
            </div>
            <div class="col-md-6 pb-2 pb-md-0 mb-4 mb-md-0">
                <div class="pe-lg-5">
                    <img src="images/featured-image-home.svg" class="img-fluid" alt="image">
                </div>
            </div>
        </div>

    </div>

</section>


<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>