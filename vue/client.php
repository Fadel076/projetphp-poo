<?php 
include 'entete.php';

if (!empty($_GET['id'])) {
    $client = getClient($_GET['id']);
}
?>
<div class="home-content container">
    <div class="overview-boxes d-flex align-items-start row justify-content-between">
        <div class="box col-4">
            <form action="<?= !empty($_GET['id']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="post" class="w-100" >
                <label for="nom" class="form-label mb-2">Nom</label>
                <input value="<?= !empty($_GET['id']) ? $client['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="veuillez saisir le nom" class="form-control mb-2">
                <input value="<?= !empty($_GET['id']) ? $client['id'] : "" ?>" type="hidden" name="id" id="id"  class="form-control mb-2">
                
                <label for="prenom" class="form-label mb-2">Prenom</label>
                <input value="<?= !empty($_GET['id']) ? $client['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom" class="form-control mb-2">

                <label for="telephone" class="form-label mb-2">N° de Téléphone</label>
                <input value="<?= !empty($_GET['id']) ? $client['telephone'] : "" ?>" type="text" name="telephone" class="form-control mb-2" id="telephone" placeholder="veuillez saisir le N° de telephone">
                
                <label for="adresse" class="form-label mb-2">Adresse</label>
                <input value="<?= !empty($_GET['id']) ? $client['adresse'] : "" ?>" type="text" name="adresse" class="form-control mb-2" id="adresse" placeholder="veuillez saisir l'adresse">
                
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
                    <th class="text-start">Nom</th>
                    <th class="text-start">Prenom</th>
                    <th class="text-start">N° de telephone</th>
                    <th class="text-start">Adresse</th>
                    <th class="text-start">Action</th>
                </tr>
                <?php 
                    $clients = getClient();

                    if (!empty($clients) && is_array($clients)) {
                        foreach ($clients as $key => $value) {
                ?>
                <tr>
                    <td><?= $value['nom'] ?></td>
                    <td><?= $value['prenom'] ?></td>
                    <td><?= $value['telephone'] ?></td>
                    <td><?= $value['adresse'] ?></td>
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
