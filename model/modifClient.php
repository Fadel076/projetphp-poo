<?php 
include 'connexion.php';


if (
    !empty($_POST['nom']) 
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
    && !empty($_POST['id'])
) {
    $sql = "UPDATE article SET nom=?, prenom=?, telephone=?, adresse=? WHERE id=?";
    $req = $connexion->prepare($sql);

    $req->bindParam(':nom', $_POST['nom']);
    $req->bindParam(':prenom', $_POST['prenom']);
    $req->bindParam(':telephone', $_POST['telephone']);
    $req->bindParam(':adresse', $_POST['adresse']);
    $req->bindParam(':id', $_POST['id']);

    $req->execute();

    if ( $req->rowCount() !=0) {
        $_SESSION['message']['text'] = "client modifié avec succès";
        $_SESSION['message']['type'] = "success";
    
    }else {
        $_SESSION['message']['text'] =  "rien n'a été modifié";
        $_SESSION['message']['type'] = "warning";
    }
   
} else {
    $_SESSION['message']['text'] =  "une information obligatoir non renseigner";
        $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/client.php');