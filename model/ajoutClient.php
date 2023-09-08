<?php 
include 'connexion.php';


if (
    !empty($_POST['nom']) 
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
) {
    $sql = "INSERT INTO client(nom, prenom, telephone, adresse) VALUES(:nom, :prenom, :telephone, :adresse)";
    $req = $connexion->prepare($sql);

    $req->bindParam(':nom', $_POST['nom']);
    $req->bindParam(':prenom', $_POST['prenom']);
    $req->bindParam(':telephone', $_POST['telephone']);
    $req->bindParam(':adresse', $_POST['adresse']);

    $req->execute();

    if ( $req->rowCount() !=0) {
        $_SESSION['message']['text'] = "client ajouté avec succès";
        $_SESSION['message']['type'] = "success";
    
    }else {
        $_SESSION['message']['text'] =  "une erreur s'est produité lors de l'ajout du client";
        $_SESSION['message']['type'] = "danger";
    }
   
} else {
    $_SESSION['message']['text'] =  "une information obligatoir non renseigner";
        $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/client.php');