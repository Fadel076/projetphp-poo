<?php 
include 'connexion.php';


if (
    !empty($_POST['nom_article']) 
    && !empty($_POST['categorie'])
    && !empty($_POST['quantite'])
    && !empty($_POST['prix_unitaire'])
) {
    $sql = "INSERT INTO article(nom_article, categorie, quantite, prix_unitaire) VALUES(:nom_article, :categorie, :quantite, :prix_unitaire)";
    $req = $connexion->prepare($sql);

    $req->bindParam(':nom_article', $_POST['nom_article']);
    $req->bindParam(':categorie', $_POST['categorie']);
    $req->bindParam(':quantite', $_POST['quantite']);
    $req->bindParam(':prix_unitaire', $_POST['prix_unitaire']);

    $req->execute();

    if ( $req->rowCount() !=0) {
        $_SESSION['message']['text'] = "article ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    
    }else {
        $_SESSION['message']['text'] =  "une erreur s'est produité lors de l'ajout de l'article";
        $_SESSION['message']['type'] = "danger";
    }
   
} else {
    $_SESSION['message']['text'] =  "une information obligatoir non renseigner";
        $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/article.php');