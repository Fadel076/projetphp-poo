<?php 
include 'connexion.php';


if (
    !empty($_POST['nom_article']) 
    && !empty($_POST['categorie'])
    && !empty($_POST['quantite'])
    && !empty($_POST['prix_unitaire'])
    && !empty($_POST['id'])
) {
    $sql = "UPDATE article SET nom_article=?, categorie=?, quantite=?, prix_unitaire=? WHERE id=?";
    $req = $connexion->prepare($sql);

    $req->bindParam(':nom_article', $_POST['nom_article']);
    $req->bindParam(':categorie', $_POST['categorie']);
    $req->bindParam(':quantite', $_POST['quantite']);
    $req->bindParam(':prix_unitaire', $_POST['prix_unitaire']);
    $req->bindParam(':id', $_POST['id']);

    $req->execute();

    if ( $req->rowCount() !=0) {
        $_SESSION['message']['text'] = "article modifié avec succès";
        $_SESSION['message']['type'] = "success";
    
    }else {
        $_SESSION['message']['text'] =  "rien n'a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
   
} else {
    $_SESSION['message']['text'] =  "une information obligatoir non renseigner";
        $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/article.php');