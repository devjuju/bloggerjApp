<?php $title = "Accueil";

use App\Core\Auth;
?>

<?php ob_start(); ?>
<!-- home-->

<section class="container-fluid bg-light-subtle">
    <div class="container pb-4 mt-n1 mt-lg-0">
        <div class="row">
            <?php if (Auth::has('message')) : ?>
                <div class="alert alert-<?= Auth::get('message', 'class') ?> " role="alert">
                    <?php Auth::delete('message', 'class'); ?>
                    <?php echo Auth::get('message', 'content');
                    Auth::delete('message', 'content'); ?>
                </div>
            <?php endif; ?>

            <!-- Contact links -->
            <div class="col-xl-6 col-lg-5 spacing-col-padding-top-100">
                <div class="spacing-content-padding-bottom-40">
                    <h1 class="heading-home">
                        Une développeuse web passionnée et créative en vue d’évolution
                    </h1>

                    <p class="text-muted fw-semibold fs-5">Avec une soif d’apprentissage assidue vous offrant des solutions adaptées à votre domaine d’activité sans limites ni contraintes
                        au delà de vos espérances.</p>



                </div>
                <div class="d-flex flex-column flex-sm-row">
                    <a href="index.php?action=blog" class="btn btn-primary mb-3 mb-sm-0 me-sm-3">Voir le blog</a>
                    <a href="index.php?action=contact" class="btn btn-outline-primary">

                        Me contacter
                    </a>
                </div>




            </div>




            <!-- Contact form -->
            <div class="col-xl-6 col-lg-7 spacing-col-padding-top-50">
                <div class="pe-lg-5">
                    <img src="images/featured-image-home.svg" class="img-fluid" alt="image">
                </div>
            </div>
        </div>
    </div>


</section>






<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>