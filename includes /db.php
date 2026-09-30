<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'vite_et_gourmand';
$username = 'root';
$password = '';

try {
     // Connexion avec PDO
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configuration pour afficher les erreurs en cas de problème
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERMODE_EXCEPTION);

} catch (PDOException $e) {
    // Si la connexion échoue, on arrete tout et on affiche l'erreur
    die("Erreur de connexion : " .$e->getMessage());
}
?>
  
