<?php 
include 'entete.php';

if (!empty($_GET['id'])) {
    $article = getVente($_GET['id']);
}
?>
<div class="home-content container">
    <div class="overview-boxes d-flex align-items-start row justify-content-between">
        <div class="box col-4">
            <form action="<?= !empty($_GET['id']) ? "../model/modifVente.php" : "../model/ajoutVente.php" ?>" method="post" class="w-100" >
                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id"  class="form-control mb-2">

                <label for="id_article" class="form-label mb-2">Vente</label>
                <select name="id_article" id="id_article" class="form-select mb-2" aria-label="Default select example">
                <?php 

                    $articles = getVente();
                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nom_article']. "-" .$value['quantite']. "disponible" ?></option>
                             <?php 
                        }
                    }

                ?>
                </select>
                <label for="id_client" class="form-label mb-2">Client</label>
                <select name="id_client" id="id_client" class="form-select mb-2" aria-label="Default select example">
                <?php 

                    $clients = getVente();
                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                            ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nom']. "" .$value['prenom'] ?></option>
                             <?php 
                        }
                    }

                ?>
                </select>

                <label for="quantite" class="form-label mb-2">Quantité</label>
                <input value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>" type="number" name="quantite" class="form-control mb-2" id="quantite" placeholder="veuillez saisir la quantité">
                
                <label for="prix" class="form-label mb-2">Prix</label>
                <input value="<?= !empty($_GET['id']) ? $article['prix'] : "" ?>" type="number" name="prix" class="form-control mb-2" id="prix_unitaire" placeholder="veuillez saisir le prix">
                
                <button type="submit" class="btn btn-primary col-6" > Valider </button>

                <?php 
                if (!empty($_SESSION['message']['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message']['type']?> ">
                    <?= $_SESSION['message']['text']?>
                    </div>

                
                <?php 
                    # code...
                };
                ?>
            </form>
            
        </div>
        <div class="box col-8 w-75 rounded">
            <table class="mtable table table-hover  px-5">
                <tr class="justify-items-between border border-secondary ">
                    <th class="text-start">Article</th>
                    <th class="text-start">Client</th>
                    <th class="text-start">Quantité</th>
                    <th class="text-start">Prix</th>
                    <th class="text-start">Action</th>
                </tr>
                <?php 
                    $articles = getVente();

                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                ?>
                <tr>
                    <td><?= $value['nom_article'] ?></td>
                    <td><?= $value['nom']. " ".$value['prenom'] ?></td>
                    <td><?= $value['quantite'] ?></td>
                    <td><?= $value['prix_unitaire'] ?></td>
                    <td><a href="?id<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a></td>
                </tr>
                <?php 
                        }
                }
                ?>
            </table>
        </div>

    

      </div>
    </section>

<?php 
include 'pied.php';
?>
