<?php
$title = 'Register';
?>
<?php ob_start() ?>
<h1>Register Form</h1>
<form class="g-3" name="inscription-form" action="index.php?action=register" method="POST">
    <div class="mb-3">
        <label class="form-label" for="username"><b>Username</b></label>
        <input class="form-control" type="text" placeholder="Enter Username" id="username" name="username" required>
        <small class="form-text text-muted">Username must have at least 6 characters and can only contain letters and numbers</small>
    </div>

    <div class="mb-3">
        <label class="form-label" for="email"><b>Email</b></label>
        <input class="form-control" type="email" placeholder="Enter Email" id="email" name="email" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password"><b>Password</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" id="password" name="password" required>
        <small class="form-text text-muted">password must have at least 6 characters</small>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password_verif"><b>Password verification</b></label>
        <input class="form-control" type="password" placeholder="Enter Password again" id="password_verif" name="password_verif" required>
    </div>

    <div>
        <button class="btn btn-primary" type="submit" id="btnsubmit" name="submit">Register</button>
    </div>
</form>
<a class="btn btn-secondary" href='index.php?action=login'>login</a>

<script type="text/javascript" src="public/js/inscription.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>