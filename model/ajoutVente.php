<?php 
include 'connexion.php';
include_once 'function.php';


if (
    !empty($_POST['id_article']) 
    && !empty($_POST['id_cient'])
    && !empty($_POST['quantite'])
    && !empty($_POST['prix'])
) {
    $article = getArticle($_POST['id_article']);

    if (!empty($article) && is_array($article)) {
        if ($_POST['quantite']>$article['quantité']) {
            $_SESSION['message']['text'] =  "la quantite a vendre n'espas disponible";
            $_SESSION['message']['type'] = "danger";
        }else {
            $sql = "INSERT INTO vente(id_article, id_cient, quantite, prix) VALUES(:id_article, :id_cient, :quantite, :prix)";
            $req = $connexion->prepare($sql);

            
            $req->bindParam(':id_article', $_POST['id_article']);
            $req->bindParam(':id_client', $_POST['id_client']);
            $req->bindParam(':quantite', $_POST['quantite']);
            $req->bindParam(':prix', $_POST['prix']);
            
            
            $req->execute(array());
        }
    }

    if ( $req->rowCount() !=0) {

        $sql="UPDATE article SET quantite=quantite-? wHERE id=?";
        
        $req->bindParam(':quantite', $_POST['quantite']);
        $req->bindParam(':id_article', $_POST['id_article']);
       

        $req->execute();

        if ( $req->rowCount() !=0) {
            $_SESSION['message']['text'] =  "Vente effectuer avec success";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] =  "impossible de faire cette vente";
            $_SESSION['message']['type'] = "danger";
        }

    } else {
        $_SESSION['message']['text'] =  "une erreur s'est produité lors de la vente";
        $_SESSION['message']['type'] = "danger";
    }
   
} else {
    $_SESSION['message']['text'] =  "une information obligatoir non renseigner";
        $_SESSION['message']['type'] = "danger";
}

header('Location:../vue/vente.php');