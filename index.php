<html>
<head>
    <title>Authentification</title>
</head>
<body>
    <h1>Information</h1>
    <form action="login_action.php" method="post">
        <div class="container">
            <label for="user"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="user" required>
        </div>
        <div class="container">
            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>