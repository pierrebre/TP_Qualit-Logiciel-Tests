<?php $title = 'Error' ?>
<?php ob_start() ?>

<div class="jumbotron jumbotron-fluid text-center">
    <h1 class="display-4">error: <?= $errorMessage ?></h1>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href='index.php?action=login'>login</a>
        <a class="btn btn-secondary btn-lg" href='index.php?action=register'>register</a>
    </p>
</div>
<?php $content = ob_get_clean() ?>
<?php require('template.php') ?>