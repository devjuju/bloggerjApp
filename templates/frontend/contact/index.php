<?php $title = "Contact";
?>
<?php ob_start();
?>

<!-- 1. Section breadcrumb -->
<section class="container-fluid bg-light-subtle spacing-col-padding-top-50 spacing-col-padding-bottom-50">
    <!-- 1.1 navigation -->
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a class="breadcrumb-links" href="index.php?action=home"><i class="bi bi-house-door fs-lg me-1"></i>Accueil</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
    </nav>
    <!-- 1.2 page title -->
    <div class="container">
        <h1 class="titre-page">Contact</h1>
    </div>
</section>

<!-- 2. Section content -->
<section class="pt-5 py-5 my-1 my-md-4 my-lg-5">
    <div class="container">
        <div class="row">
            <!-- 2.1 author info -->
            <div class="col-xl-4 col-lg-5 ">
                <h2 class="titre-section">
                    Me contacter</h2>
                <p class="running-text fs-5">
                    N'hésitez pas à m'écrire. je vous répondrai dans les plus brefs délais.
                </p>
                <img src="images/featured-image-page-contact.svg" class="img-fluid featured-image-post" alt="image">
                <div class="card card-shadow-contact spacing-content-marging-top-40">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Justine Leleu</h5>
                            <p class="running-text mb-2">Développeuse web </p>
                        </div>
                    </div>
                </div>
                <div class="card card-shadow-contact spacing-element-marging-top-20">
                    <div class="d-flex align-items-start ">
                        <div class="box-icon flex-shrink-0 fs-3 lh-1 p-3">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="ps-3 ps-sm-4">
                            <h5 class="titre-h5 mb-2">Me contacter</h5>
                            <p class="running-text">jleleubellpro1994@gmail.com </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex spacing-col-padding-top-50 spacing-col-padding-bottom-50">
                    <h5 class="text-bold spacing-element-marging-right-10">Réseaux sociaux :</h5>
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
            <!-- 2.2 contact form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
                <div class="card-shadow">
                    <div class="card-header">
                        <h3 class="titre-h3">
                            Envoyez-moi un message</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            <div class="row g-4">
                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="lastname">Nom</label>
                                    <input type="text" id="lastname" name="contact[lastname]" placeholder=""
                                        value="<?= isset($contact) ? htmlspecialchars($contact->getLastname(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["lastname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["lastname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-sm-6 form-group-style">
                                    <label class="form-label fs-base" for="firstname">Prénom</label>
                                    <input type="text" id="firstname" name="contact[firstname]" placeholder=""
                                        value="<?= isset($contact) ? htmlspecialchars($contact->getFirstname(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["firstname"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["firstname"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="email">Email</label>
                                    <input type="email" placeholder="" id="email" name="contact[email]"
                                        value="<?= isset($contact) ? htmlspecialchars($contact->getEmail(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["email"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["email"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="subject">Sujet</label>
                                    <input type="text" placeholder="" id="subject" name="contact[subject]"
                                        value="<?= isset($contact) ? htmlspecialchars($contact->getSubject(), ENT_QUOTES, 'UTF-8') : '' ?>">
                                    <?= isset($controle["subject"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["subject"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
                                </div>
                                <div class="col-sm-12 form-group-style">
                                    <label class="form-label fs-base" for="message">Message</label>
                                    <textarea rows="6" placeholder="" name="contact[message]" id="message"><?= isset($contact) ? htmlspecialchars($contact->getMessage(), ENT_QUOTES, 'UTF-8') : '' ?></textarea>
                                    <?= isset($controle["message"]) ? '<p><i class="bi bi-arrow-right-short"></i>' . htmlspecialchars($controle["message"], ENT_QUOTES, 'UTF-8') . "</p>" : '' ?>
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
            </div>
        </div>
    </div>
</section>



<?php $content = ob_get_clean(); ?>
<?php require('../templates/layout-frontend.php') ?>