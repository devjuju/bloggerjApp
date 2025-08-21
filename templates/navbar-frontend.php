  <!-- Navbar frontend -->
  <?php

    use App\Core\Auth;

    if (Auth::get('auth', 'role')) {
    ?>
      <!-- Navbar frontend for admin -->
      <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>
          <header class="navbar-frontend navbar navbar-expand-lg bg-light-subtle">
              <div class="container">
                  <a class="navbar-brand pe-sm-3" href="index.php?action=home">
                      <img src="images/logo.png" width="47" alt="Blogger">
                      blogger J
                  </a>
                  <div class="d-none d-sm-block order-lg-3">
                      <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">
                          <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                          <div class="ps-2">
                              <div class="fs-xs lh-1 opacity-60">Hello,</div>
                              <div class="fs-sm"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></div>
                          </div>
                      </div>
                  </div>
                  <a class="btn btn-outline-primary btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex" href="index.php?action=logout">

                      Se déconnecter
                  </a>
                  <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation" aria-expanded="true">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <nav class="navbar-collapse collapse show" id="navbarNav">
                      <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">

                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=home">Accueil</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=blog">Blog</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=contact">Contact</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=dashboard">Tableau de bord</a>
                          </li>
                      </ul>
                      <hr>
                      <div class="d-sm-none">
                          <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">
                              <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                              <div class="ps-2">
                                  <div class="fs-xs lh-1 opacity-60">Hello,</div>
                                  <div class="fs-sm"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></div>
                              </div>
                          </div>
                          <hr>
                          <a class="btn btn-outline-primary w-100 mb-1" href="index.php?action=logout">
                              Se déconnecter
                          </a>
                      </div>
                  </nav>
              </div>
          </header>

      <?php } else { ?>
          <!-- Navbar frontend for user -->
          <header class="navbar-frontend navbar navbar-expand-lg bg-light-subtle">
              <div class="container">
                  <a class="navbar-brand pe-sm-3" href="index.php?action=home">
                      <img src="images/logo.png" width="47" alt="Blogger">
                      blogger J
                  </a>
                  <div class="d-none d-sm-block order-lg-3">
                      <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">
                          <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                          <div class="ps-2">
                              <div class="fs-xs lh-1 opacity-60">Hello,</div>
                              <div class="fs-sm"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></div>
                          </div>
                      </div>
                  </div>
                  <a class="btn btn-outline-primary btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex" href="index.php?action=logout">

                      Se déconnecter
                  </a>
                  <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation" aria-expanded="true">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <nav class="navbar-collapse collapse show" id="navbarNav">
                      <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=home">Accueil</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=blog">Blog</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="index.php?action=contact">Contact</a>
                          </li>
                      </ul>
                      <hr>
                      <div class="d-sm-none">
                          <div class="d-flex align-items-center position-relative ps-md-3 pe-lg-3 mb-2">
                              <img src="uploads/<?= htmlspecialchars(Auth::get('auth', 'image'), ENT_QUOTES, 'UTF-8') ?>" class="rounded-circle" width="48" alt="Avatar">
                              <div class="ps-2">
                                  <div class="fs-xs lh-1 opacity-60">Hello,</div>
                                  <div class="fs-sm"><?= htmlspecialchars(Auth::get('auth', 'username'), ENT_QUOTES, 'UTF-8'); ?></div>
                              </div>
                          </div>
                          <hr>
                          <a class="btn btn-outline-primary w-100 mb-1" href="index.php?action=logout">

                              Se déconnecter
                          </a>
                      </div>
                  </nav>
              </div>
          </header>
      <?php } ?>
  <?php } else { ?>
      <!-- Navbar frontend for visitor -->
      <header class="navbar-frontend navbar navbar-expand-lg bg-light-subtle">
          <div class="container">
              <a class="navbar-brand pe-sm-3" href="index.php?action=home">
                  <img src="images/logo.png" width="47" alt="Blogger">
                  blogger J
              </a>
              <a class="btn btn-primary btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex mb-3 mb-sm-0 me-sm-3" href="index.php?action=register">
                  S'incrire
              </a>
              <a class="btn btn-outline-primary btn-sm fs-sm order-lg-3 d-none d-sm-inline-flex" href="index.php?action=login">
                  Se connecter
              </a>
              <button class="navbar-toggler ms-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation" aria-expanded="true">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <nav class="navbar-collapse collapse show" id="navbarNav">
                  <ul class="navbar-nav navbar-nav-scroll me-auto" style="--ar-scroll-height: 520px;">
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?action=home">Accueil</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?action=blog">Blog</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.php?action=contact">Contact</a>
                      </li>
                  </ul>
                  <hr>
                  <div class="d-sm-none">
                      <a class="btn btn-primary w-100 mb-3" href="index.php?action=register">
                          S'inscire
                      </a>
                      <a class="btn btn-outline-primary w-100 mb-1" href="index.php?action=login">
                          Se connecter
                      </a>
                  </div>
              </nav>
          </div>
      </header>
  <?php } ?>