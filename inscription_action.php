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

    $query = "INSERT INTO users (user, email, password) VALUES (:user, :email, :password)";
    $req_pre = $cnx->prepare($query);
    $req_pre->bindParam(':user', $user, PDO::PARAM_STR);
    $req_pre->bindParam(':email', $email, PDO::PARAM_STR);
    $req_pre->bindParam(':password', $password, PDO::PARAM_STR);
    try {
        $req_pre->execute($query);
        echo 'Entrée ajoutée dans la table';
    } catch(Error $e){
        $req_pre->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
 }

?>
