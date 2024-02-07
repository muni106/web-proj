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

if (isset($_GET["update"])) {
   sec_session_start();
   $username = nullify_if_empty($username);
   $email = nullify_if_empty($email);
   $password = nullify_if_empty($password);
   $random_salt = nullify_if_empty($random_salt);
   $server_image_filename = $server_image_filename == "/images/defaultProfileImage.png" ? NULL : $server_image_filename;
   $bio = nullify_if_empty($bio);

   $update_stmt = $mysqli->prepare(
      "UPDATE members SET 
         username = COALESCE(?, username), 
         email = COALESCE(?, email), 
         password = COALESCE(?, password), 
         salt = COALESCE(?, salt), 
         profile_image = COALESCE(?, profile_image), 
         bio = COALESCE(?, bio)
      WHERE id = ?"
   );
   $update_stmt->bind_param('ssssssi', $username, $email, $password, $random_salt, $server_image_filename, $bio, $_SESSION["user_id"]);
   if ($update_stmt->execute()) {
      echo "Update successful";
   }

} else if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt, profile_image, bio) VALUES (?, ?, ?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('ssssss', $username, $email, $password, $random_salt, $server_image_filename, $bio);
   // Esegui la query ottenuta.
   if ($insert_stmt->execute()) {
         header('Location: login.php', true, 303);
         die();
   }
}

function nullify_if_empty(string $s) {
   if (strlen($s) == 0) {
      return NULL;
   }
   return $s;
}

?>