<?php

use App\Core\DateFormatter;

$title = "Post"; ?>
<?php ob_start();
?>

<!-- breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=blog">Blog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?= $post->title ?></li>
        </ol>
    </nav>
    <div class="container">
        <h1 class="titre-page"> <?= $post->title ?></h1>
        <div class="d-flex flex-row bd-highlight mb-3 spacing-content-marging-top-40">
            <div class="meta-list-blog bd-highlight">
                <i class="bi bi-person-fill fs-base me-1"></i>
                <span class="fs-sm"><?= $post->author ?></span>
            </div>
            <div class="meta-list-blog bd-highlight">
                <i class="bi bi-clock-fill fs-base me-1"></i>
                <span class="fs-sm"><?= DateFormatter::enFrancais($post->created_at); ?></span>
            </div>
        </div>

    </div>
</section>



<section class="container py-5 my-1 my-md-4 my-lg-5">
    <div class="row">

        <div class="col-lg-7  mb-lg-0">


            <img src="uploads/<?= $post->image ?>" class="img-fluid featured-image-post" alt="image">

            <div class="content-post-blog spacing-content-padding-top-40">
                <h2 class="titre-h4">A propos du projet</h2>
                <p class="highlighted-text">
                    <?= $post->excerpt ?>
                </p>
                <p class="running-text"><?= $post->content ?></p>

            </div>

            <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3  spacing-content-padding-top-40">
                <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
                    <div class="fs-xs  pe-2 me-2 mb-2">
                        <h5 class="titre-h6">Catégorie:</h5>
                    </div>
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="bd-highlight">

                            <span class="fs-sm text-primary text-bold"><?= $post->category ?> </span>
                        </div>
                    </div>

                </div>
                <div class="d-flex align-items-center position-relative ps-md-3  mb-2">
                    <h5 class="titre-h6 me-3">Partager avec :</h5>


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
            </div>
            <hr class="separateur-page-blog">
            <div class="bloc-comments mt-5">
                <div class="d-md-flex align-items-center justify-content-between text-center text-md-start pb-1 pb-lg-0 mb-4 mb-lg-5 mt-5">
                    <h3 class="titre-h4 mb-md-0">Commentaires</h3>

                </div>
                <!-- Comment -->


                <hr class="my-2">

                <!-- Comment -->
                <?php foreach ($comments as $comment): ?>
                    <div class="py-4">
                        <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                            <div class="d-flex align-items-center me-3">
                                <img src="uploads/<?= $comment->avatar ?>" class="rounded-circle" width="48" alt="Avatar">
                                <div class="ps-3">
                                    <h6 class="titre-h6 mb-0"><?= $comment->author ?></h6>
                                    <span class="running-text fs-sm text-muted">
                                        <?= DateFormatter::enFrancais($comment->created_at); ?>
                                    </span>



                                </div>
                            </div>

                            <div class="d-flex align-items-center position-relative ps-md-3  mb-2">



                                <?php if ($comment->status  === "approuvé"): ?>
                                    <p class="square-icon-primary">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                    </p>
                                <?php else: ?>
                                    <p class="square-icon-outline-primary">
                                        <i class="bi bi-hand-thumbs-up"></i>
                                    </p>
                                <?php endif; ?>




                            </div>










                        </div>
                        <p class="running-text mb-0"><?= $comment->content ?></p><br>


                    </div>

                <?php endforeach; ?>

                <?php

                use App\Core\Auth;

                if (Auth::get('auth', 'role')) {
                ?>

                    <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>

                        <div class="card-shadow py-3 p-sm-4 p-md-5">
                            <div class="card-header">
                                <h3 class="titre-h3">
                                    Ajouter un commentaire</h3>

                            </div>

                            <div class="card-body">

                                <form method="post" class="needs-validation" novalidate="">
                                    <input type="hidden" name="add_comment[posts_id]" value="<?= $post->id ?>">
                                    <div class="row g-4">
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                                            <div class="d-flex align-items-center me-3">
                                                <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="rounded-circle" width="48" alt="Avatar">
                                                <div class="ps-3">
                                                    <h6 class="titre-h6 mb-0"><?= Auth::get('auth', 'username'); ?></h6>


                                                </div>
                                            </div>

                                        </div>



                                        <!--begin::Form group-->
                                        <div class="col-sm-12 form-group-style2">
                                            <label class="form-label fs-base" for="content">Commentaire</label>
                                            <textarea class="form-control" rows="6" placeholder="" name="add_comment[content]" id="content"><?= isset($addComment) ? $addComment->getContent() : '' ?></textarea>
                                            <?= isset($controle["content"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["content"] . "</p>" : '' ?>

                                        </div>

                                        <div class="col-sm-12 pt-4">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>






                    <?php } else { ?>

                        <div class="card-shadow py-3 p-sm-4 p-md-5">
                            <div class="card-header">
                                <h3 class="titre-h3">
                                    Ajouter un commentaire</h3>

                            </div>

                            <div class="card-body">




                                <form method="post" class="needs-validation" novalidate="">
                                    <input type="hidden" name="add_comment[posts_id]" value="<?= $post->id ?>">
                                    <div class="row g-4">
                                        <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                                            <div class="d-flex align-items-center me-3">
                                                <img src="uploads/<?= Auth::get('auth', 'image') ?>" class="rounded-circle" width="48" alt="">
                                                <div class="ps-3">
                                                    <h6 class="titre-h6 mb-0"><?= Auth::get('auth', 'username'); ?></h6>
                                                    <p>Crée le :
                                                        <span class="running-text fs-sm text-muted"><?php $today = date('M j Y'); // année, mois et jour actuels
                                                                                                    $message =  $today;
                                                                                                    echo $message; ?></span>
                                                    </p>

                                                </div>
                                            </div>

                                        </div>



                                        <!--begin::Form group-->
                                        <div class="col-sm-12 form-group-style2">
                                            <label class="form-label fs-base" for="content">Commentaire</label>
                                            <textarea class="form-control" rows="6" placeholder="" name="add_comment[content]" id="content"><?= isset($addComment) ? $addComment->getContent() : '' ?></textarea>
                                            <?= isset($controle["content"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . $controle["content"] . "</p>" : '' ?>

                                        </div>

                                        <div class="col-sm-12 pt-4">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                    <?php } ?>

                <?php } else { ?>

                <?php } ?>











            </div>
        </div>
        <div class="col-lg-5 col-xl-4 offset-xl-1 border-start-lg">

            <div class="card card-shadow mb-5">
                <div class="card-body">
                    <h4 class="titre-h4">Articles liés</h4>
                    <ul class="list-unstyled mb-0">
                        <!-- Item -->
                        <?php foreach ($relatedPosts as $relatedPost): ?>
                            <li class="pb-3 mb-3">
                                <a href="#" class="blog-postlist-content">

                                    <span class="blog-postlist-title"><?= $relatedPost->title ?></span>
                                    <p class="blog-postlist-intro">
                                        <?= $relatedPost->excerpt ?>
                                    </p>
                                    <div class="meta-lists"><span class="meta-date"><i aria-hidden="true" class="bi bi-clock-fill"></i><?= DateFormatter::enFrancais($relatedPost->created_at); ?></span> </div>

                                </a>
                            </li>
                        <?php endforeach; ?>


                    </ul>
                    <a href="index.php?action=blog" class="d-grid gap-2 btn btn-outline-primary">
                        Voir tout
                    </a>



                </div>
            </div>





            <!-- Basic card example -->
            <div class="card card-background">
                <div class="card-body">
                    <h4 class="titre-h4">Votre avis compte !</h4>
                    <p class="running-text pb-4 mb-0 mb-lg-3">Les utilisateurs ont la possibilité de commenter mon blog. Donner un avis utile qui contribue à l'amélioration du contenu du blog.</p>



                    <?php



                    if (Auth::get('auth', 'role')) {
                    ?>

                        <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>


                            <a href=" index.php?action=account" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20">
                                Voir mon compte
                            </a>






                        <?php } else { ?>


                            <a href=" index.php?action=account" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20">
                                Voir mon compte
                            </a>



                        <?php } ?>

                    <?php } else { ?>


                        <a href=" index.php?action=register" class="d-grid gap-2 btn btn-primary spacing-element-marging-bottom-20">
                            S'inscire
                        </a>
                        <a href="index.php?action=login" class="d-grid gap-2 btn btn-outline-primary">
                            Se connecter
                        </a>

                    <?php } ?>



                </div>
            </div>













        </div>
    </div>
</section>










<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>