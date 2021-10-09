<?php $title = 'Welcome' ?>
<?php ob_start() ?>

<div class="jumbotron jumbotron-fluid text-center">
    <h2 class="display-4">Welcome <?= $_SESSION['username'] ?></h2>
    <p class="lead">
        <a class="btn btn-primary" href='index.php?action=logout'>Logout</a>
    </p>
</div>
<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>