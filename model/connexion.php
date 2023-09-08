<?php 
session_start();
$nom_server = "localhost";
$nom_base_de_donne = "gestion_de_stock";
$utilisateur = "root";
$motpass = "";

try {
     // Connect to the database using PDO
    $connexion = new PDO("mysql:host=localhost;dbname=gestion_de_stock","root", "");

    // Set the PDO error mode to exception
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : ". $e->getMessage());
}
