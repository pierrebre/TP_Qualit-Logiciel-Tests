<?php

include 'database.php';


 // Vérifier si le formulaire est soumis 
 if ( isset( $_POST['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant 
       la valeur des attributs
      */
    $user = $_POST['user']; 
    $email = $_POST['email']; 
    $password = $_POST['password'];
    $password_verif = $_POST['password_verif'];

    

    /*$sql = "INSERT INTO users (user, email, password)
    VALUES ('$user', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
    $conn->close();*/
    $sql = "INSERT INTO users (user, email, password) VALUES ('$user', '$email', '$password')";

        try{
            
            $cnx->exec($sql);
            echo 'Entrée ajoutée dans la table';
            }
            catch(PDOException $e){
                $cnx->rollBack();
              echo "Erreur : " . $e->getMessage();
            }



 }

?>
