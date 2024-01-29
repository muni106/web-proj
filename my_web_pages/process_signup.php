<?php

require('db_connect.php');

$username = $_POST["username"];
$email = $_POST["email"];
// Recupero la password criptata dal form di inserimento.
$password = $_POST['password']; 
// Crea una chiave casuale
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Crea una password usando la chiave appena creata.
$password = hash('sha512', $password.$random_salt);

$image = $_FILES["image"];
if ($image["error"] == 0) { // if the image was loaded correctly
   $server_image_filename = "/images/".pathinfo($image["tmp_name"])["basename"];
   move_uploaded_file($image["tmp_name"], $server_image_filename);
} else {
   $server_image_filename = "/images/defaultProfileImage.png";
}

$bio = $_POST["bio"];

// Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
// Assicurati di usare statement SQL 'prepared'.
if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, profile_image, bio) VALUES (?, ?, ?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('ssssss', $username, $email, $password, $random_salt, $server_image_filename, $bio);
   // Esegui la query ottenuta.
   if ($insert_stmt->execute()) {
      echo "Sign up successful";
   }
}

?>