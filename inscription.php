<html>

<head>
<title>Register Page</title>

</head>

<body>
    <h1>Formulaire d'enregistrement</h1>
    <form name="inscription-form" action="inscription_action.php" method="POST">
        <div class="container">
            <label for="user"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" id="user"  name="user" required>
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="email" name="email" required>
        </div>

        <div class="container">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" id="password" name="password" required>
        </div>

        <div class="container">
            <label for="password_verif"><b>Password</b></label>
            <input type="password" placeholder="Répeter votre Password" id="password_verif" name="password_verif" required>
        </div>

        <div>
        <button type="submit" id="btnsubmit" name="submit">S'enregistrer</button>
        </div>
    </form>

    <script type="text/javascript" src="inscription.js"></script>
</body>
</html>