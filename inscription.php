<html>

<head>
<title>Register Page</title>
</head>

<body>
    <h1>Formulaire d'enregistrement</h1>
    <form action="inscription_action.php" method="POST">
        <div class="container">
            <label for="user"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="user" required>
        </div>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" name="email" required>
        </div>

        <div class="container">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>

        <div class="container">
            <label for="password_verif"><b>Password</b></label>
            <input type="password" placeholder="Répeter votre Password" name="password_verif" required>
        </div>

        <div>
        <button type="submit" name="submit">S'enregistrer</button>
        </div>
    </form>

</body>
</html>