<?php $title = 'LogIn'; ?>
<?php ob_start(); ?>
<h1>Login Form</h1>
<form class="g-3" action="index.php?action=login" method="post">
    <div class="mb-3">
        <label class="form-label" for="email"><strong>Email</b></label>
        <input class="form-control" type="text" placeholder="Enter email" name="email" required>
    </div>
    <div class="mb-3">
        <label class="form-label" for="password"><strong>Password</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" name="password" required>
    </div>
    <div>
        <button class="btn btn-primary" type="submit" name="submit">Login</button>
    </div>
</form>

<a class="btn btn-secondary" href='index.php?action=register'>register</a>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>