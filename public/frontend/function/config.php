<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'membre-msa');
 
// Connexion � la base de donn�es MySQL 
$connect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// V�rifier la connexion
if($connect === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>