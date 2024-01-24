<?php

require_once("../db/db_connect.php");

$username = $_POST["username"];
$email = $_POST["email"];
// Recupero la password criptata dal form di inserimento.
$password = $_POST['password']; 
// Crea una chiave casuale
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Crea una password usando la chiave appena creata.
$password = hash('sha512', $password.$random_salt);
// Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
// Assicurati di usare statement SQL 'prepared'.
if ($insert_stmt = $mysqli->prepare("INSERT INTO members (username, email, password, salt) VALUES (?, ?, ?, ?)")) {    
   $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt); 
   // Esegui la query ottenuta.
   if ($insert_stmt->execute()) {
      echo "Sign up successful";
   }
}

?>