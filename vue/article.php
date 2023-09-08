<?php 
include 'entete.php';

if (!empty($_GET['id'])) {
    $article = getArticle($_GET['id']);
}
?>
<div class="home-content container">
    <div class="overview-boxes d-flex align-items-start row justify-content-between">
        <div class="box col-4">
            <form action="<?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php" ?>" method="post" class="w-100" >
                <label for="nom_article" class="form-label mb-2">Nom Article</label>
                <input value="<?= !empty($_GET['id']) ? $article['nom_article'] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="veuillez saisir le nom" class="form-control mb-2">
                <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" name="id" id="id"  class="form-control mb-2">

                <label for="categorie" class="form-label mb-2">Catégorie</label>
                <select name="categorie" id="categorie" class="form-select mb-2" aria-label="Default select example">
                    <option <?= !empty($_GET['id']) && $article['categorie']== "Ordinateur" ? "selected" : "" ?> value="Ordinateur">Ordinateur</option>
                    <option <?= !empty($_GET['id']) && $article['categorie']== "Imprimante" ? "selected" : "" ?> value="Imprimante">Imprimante</option>
                    <option <?= !empty($_GET['id']) && $article['categorie']== "Accessoir" ? "selected" : "" ?> value="Accessoire">Accessoire</option>
                </select>

                <label for="quantite" class="form-label mb-2">Quantité</label>
                <input value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>" type="number" name="quantite" class="form-control mb-2" id="quantite" placeholder="veuillez saisir la quantité">
                
                <label for="prix_unitaire" class="form-label mb-2">Prix unitaire</label>
                <input value="<?= !empty($_GET['id']) ? $article['prix_unitaire'] : "" ?>" type="number" name="prix_unitaire" class="form-control mb-2" id="prix_unitaire" placeholder="veuillez saisir le prix">
                
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
                    <th class="text-start">Nom Article</th>
                    <th class="text-start">Catégorie</th>
                    <th class="text-start">Quantité</th>
                    <th class="text-start">Prix Unitaire</th>
                    <th class="text-start">Action</th>
                </tr>
                <?php 
                    $articles = getArticle();

                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                ?>
                <tr>
                    <td><?= $value['nom_article'] ?></td>
                    <td><?= $value['categorie'] ?></td>
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
