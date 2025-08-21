<?php

use App\Core\DateFormatter;

$title = "Post"; ?>
<?php ob_start();
?>

<!-- 1. Breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <!-- 1.1 navigation -->
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=blog">Blog</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8') ?></li>
        </ol>
    </nav>
    <!-- 1.2 page title -->
    <div class="container">
        <h1 class="titre-page"> <?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8') ?></h1>
        <div class="d-flex flex-row bd-highlight mb-3 spacing-content-marging-top-40">
            <div class="meta-list-blog bd-highlight">
                <i class="bi bi-person-fill fs-base me-1"></i>
                <span class="fs-sm"><?= htmlspecialchars($post->author, ENT_QUOTES, 'UTF-8') ?></span>
            </div>
            <div class="meta-list-blog bd-highlight">
                <i class="bi bi-clock-fill fs-base me-1"></i>
                <span class="fs-sm"><?= DateFormatter::enFrancais($post->updated_at); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- 2. Section content -->
<section class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
    <div class="container  spacing-col-padding-top-50 spacing-col-padding-bottom-50">
        <div class="row gy-4">
            <!-- 2.1 article infos -->
            <div class="col-lg-7">
                <img src="uploads/<?= htmlspecialchars($post->image, ENT_QUOTES, 'UTF-8') ?>" class="img-fluid featured-image-post" alt="image">
                <div class="content-post-blog spacing-content-padding-top-40">
                    <h2 class="titre-h4">A propos de l'article</h2>
                    <p class="highlighted-text">
                        <?= htmlspecialchars($post->excerpt, ENT_QUOTES, 'UTF-8') ?>
                    </p>
                    <p class="running-text"><?= htmlspecialchars($post->content, ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="bloc-comments mt-5">
                    <h3 class="titre-h4 mb-3">Commentaires</h3>
                    <?php foreach ($comments as $comment): ?>
                        <div class="py-4">
                            <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                                <div class="d-flex align-items-center me-3">
                                    <img src="uploads/<?= htmlspecialchars($comment->avatar, ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                                    <div class="ps-3">
                                        <h6 class="titre-h6 mb-0"><?= htmlspecialchars($comment->author, ENT_QUOTES, 'UTF-8') ?></h6>
                                        <div class="meta-list-blog bd-highlight">
                                            <i class="bi bi-clock-fill fs-base me-1"></i>
                                            <span class="fs-sm"><?= DateFormatter::enFrancais($comment->created_at); ?></span>
                                        </div>
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
                            <p class="running-text mb-0"><?= htmlspecialchars($comment->content, ENT_QUOTES, 'UTF-8') ?></p><br>
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
                                                    <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                                                    <div class="ps-3">
                                                        <h6 class="titre-h6 mb-0"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8') ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group-style2">
                                                <label class="form-label fs-base" for="content">Commentaire</label>
                                                <textarea class="form-control" rows="6" name="add_comment[content]" id="content"><?= isset($addComment) ? htmlspecialchars($addComment->getContent(), ENT_QUOTES, 'UTF-8') : '' ?></textarea>
                                                <?= isset($controle["content"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["content"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
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
                                                    <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                                                    <div class="ps-3">
                                                        <h6 class="titre-h6 mb-0"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8') ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 form-group-style2">
                                                <label class="form-label fs-base" for="content">Commentaire</label>
                                                <textarea class="form-control" rows="6" name="add_comment[content]" id="content"><?= isset($addComment) ? htmlspecialchars($addComment->getContent(), ENT_QUOTES, 'UTF-8') : '' ?></textarea>
                                                <?= isset($controle["content"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["content"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
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
                        <div class="card card-background">
                            <div class="card-body">
                                <h4 class="titre-h4">Votre avis compte !</h4>
                                <p class="running-text pb-4 mb-0 mb-lg-3">Les utilisateurs ont la possibilité de commenter mon blog. Donner un avis utile qui contribue à l'amélioration du contenu du blog.</p>
                                <div class="d-flex flex-sm-row flex-column">
                                    <a href="index.php?action=register" class="btn btn-sm btn-primary me-2 mb-2">S'inscrire</a>
                                    <a href="index.php?action=login" class="btn btn-sm btn-outline-primary me-2 mb-2">Se connecter</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- 2.2 post category & share -->
            <div class="col-lg-5 position-relative">
                <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
                    <div class="card card-light-shadow mb-5">
                        <div class="card-body pb-0">
                            <div class="d-table flex-shrink-0 icon-box">
                                <i class="bi bi-bookmark"></i>
                            </div>
                            <h3 class="titre-h5 mt-0">Catégorie</h3>
                            <p class="running-text"><?= htmlspecialchars($post->category, ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </div>
                    <div class="card card-background">
                        <div class="card-body">
                            <h4 class="titre-h4">Partager avec :</h4>
                            <br>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>