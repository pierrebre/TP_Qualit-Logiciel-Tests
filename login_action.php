
<?php
include 'database.php';

$user = htmlspecialchars($_POST["user"]);
$password = hash('sha256', htmlspecialchars($_POST["password"]));

$query = "SELECT * from users WHERE user = :user";
$req_pre = $cnx->prepare($query);
$req_pre->bindParam(':user', $user, PDO::PARAM_STR);
$req_pre->execute();

$ligne=$req_pre->fetch(PDO::FETCH_OBJ);

if ($ligne->password === $password) {
    echo 'Bonjour '.$user.' !';
} else {
    echo 'Mauvaise information de connection';
}
?>
