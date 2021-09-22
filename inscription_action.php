<?php

include 'database.php';


 // Vérifier si le formulaire est soumis
 if ( isset( $_POST['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant
       la valeur des attributs
      */
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $password_verif = hash('sha256', $_POST['password_verif']);

    $query = "INSERT INTO users (user, email, password) VALUES ('".$user."', '".$email."', '".$password."')";
    if (!$cnx->exec($query)) {
        $erreur = $cnx->errorInfo()[2];
        if (strpos($erreur, "for key 'user'") !== false ) {
            echo 'Username déjà existant, veuillez en choisir un autre.';
        } else if (strpos($erreur, "for key 'email'") !== false ) {
            echo 'Email déjà existant, veuillez en choisir un autre.';
        } 
    }
    else {
        echo 'Entrée ajoutée dans la table';
    }
 }

?>
