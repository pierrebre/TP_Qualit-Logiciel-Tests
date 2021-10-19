<?php
$title = 'Register';
?>
<?php ob_start() ?>
<h1>Register Form</h1>
<form class="g-3" name="inscription-form" action="index.php?action=register" method="POST">
    <div class="mb-3">
        <label class="form-label" for="username"><strong>Username</b></label>
        <input class="form-control" type="text" placeholder="Enter Username" id="username" name="username" onchange="checkUsername(this.value)" required>
        <br><div id="usernameCheck"></div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="email"><strong>Email</b></label>
        <input class="form-control" type="email" placeholder="Enter Email" id="email" name="email" onchange="checkEmail(this.value)" novalidate>
        <br><div id="emailCheck"></div>    
    </div>

    <div class="mb-3">
        <label class="form-label" for="password"><strong>Password</b></label>
        <input class="form-control" type="password" placeholder="Enter Password" id="password" name="password" onchange="checkPassword(this.value)" required>
        <br><div id="passwordCheck"></div>    
    </div>

    <div class="mb-3">
        <label class="form-label" for="password_verif"><strong>Password verification</b></label>
        <input class="form-control" type="password" placeholder="Enter Password again" id="password_verif" name="password_verif" onchange="matchPassword(this.value)" required>
        <br><div id="passwordVerifCheck"></div>    
    </div>

    <div>
        <button class="btn btn-primary" type="submit" id="btnsubmit" name="submit">Register</button>
    </div>
</form>
<a class="btn btn-secondary" href='index.php?action=login'>login</a>

<script type="text/javascript" src="public/js/inscription.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>