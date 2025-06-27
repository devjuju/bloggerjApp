        <?php

        use App\Core\Auth;

        if (Auth::get('auth', 'role')) {
        ?>

            <?php if (Auth::get('auth', 'role') === 'administrateur') { ?>

                <div class="fs-sm px-0">

                    <?php if ($comment->status  === "rejeté"): ?>
                        <a href="" class="btn btn-icon-primary">
                            <i class="bi bi-hand-thumbs-down"></i>
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=reject_comment&id=<?= $comment->id ?>" class="btn btn-icon-outline-primary">
                            <i class="bi bi-hand-thumbs-down"></i>
                        </a>
                    <?php endif; ?>


                    <?php if ($comment->status  === "approuvé"): ?>
                        <a href="" class="btn btn-icon-primary">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                    <?php else: ?>
                        <a href="index.php?action=validate_comment&id=<?= $comment->id ?>" class="btn btn-icon-outline-primary">
                            <i class="bi bi-hand-thumbs-up"></i>
                        </a>
                    <?php endif; ?>

                </div>

            <?php } else { ?>

                <?php if ($comment->status  === "rejeté"): ?>
                    <p class="btn btn-icon-primary">
                        <i class="bi bi-hand-thumbs-down"></i>
                    </p>
                <?php else: ?>
                    <p class="btn btn-icon-outline-primary">
                        <i class="bi bi-hand-thumbs-down"></i>
                    </p>
                <?php endif; ?>


                <?php if ($comment->status  === "approuvé"): ?>
                    <p class="btn btn-icon-primary">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </p>
                <?php else: ?>
                    <p class="btn btn-icon-outline-primary">
                        <i class="bi bi-hand-thumbs-up"></i>
                    </p>
                <?php endif; ?>

            <?php } ?>

        <?php } else { ?>

        <?php } ?>