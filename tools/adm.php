<?php

session_start();

$titlePage = "Page d'accueil Admin";
// $message = '';
$injection = '';

require_once '../view/function.php';
include '../inc/headerAdm.php';

check_authAdm();

// if ($_POST) {


//     if (!isset($_POST['car-name-bdd']) || strlen($_POST['car-name-bdd']) < 2 || strlen($_POST['car-name-bdd']) > 50) {
//         $injection .= '<span style="color:crimson;">Le champ "Nom voiture" doit comporter entre 2 et 50 caractères</span> <br/>';
//     }

//     if (!isset($_POST['car-desc-bdd']) || strlen($_POST['car-desc-bdd']) < 2) {
//         $injection .= '<span style="color:crimson;">Le champ "Description" doit comporter au moins 2 caractères</span><br/>';
//     }

//     if (empty($injection)) {

//         $res = getBdd()->prepare("INSERT INTO voiture (nom, description, image, prix_journalier) VALUES (?, ?, ?, ?)");
//         $res->execute(array(
//             $_POST['car-name-bdd'],
//             $_POST['car-desc-bdd'],
//             $_POST['car-img-bdd'],
//             $_POST['car-prixj-bdd'],
//         ));

//         if ($res) {
//             $injection .= '<span style="color:forestgreen; font-weight:bold;">Données envoyées, merci.</span>';
//         } else {
//             $injection .= '<span style="font-weight:bold;"> Merci de remplir le formulaire.</span>';
//         }
//     }
// }

?>

<section class="dashboard">
    <h2>Page d'accueill Administrateur</h2>
    <div class="dashboard-inject">
        <h3>Lien vers la page d'injection en BDD Location</h3>
        <a href="../view/admC.php">Cliquer ici</a>
    </div>
    <div class="dashboard-view">
        <h3>Lien vers la page de vue de la BDD Location</h3>
        <a href="../view/admR.php">Cliquer ici</a>
    </div>


    <!-- <div>
        <p>
            <?php // echo $injection; 
            ?>
        </p>
    </div>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="pseudo">
                <label for="car-name-bdd">Nom voiture</label>
                <input type="text" id="car-name-bdd" placeholder="Saisissez un nom de voiture" name="car-name-bdd">
            </div>
            <div class="pseudo">
                <label for="car-desc-bdd">Description</label>
                <input type="text" id="car-desc-bdd" placeholder="Saisissez un descriptif" name="car-desc-bdd">
            </div>
            <div class="pseudo">
                <label for="car-img-bdd">Chemin vers une image</label>
                <input type="text" id="car-img-bdd" placeholder="Saisissez un path" name="car-img-bdd">
            </div>
            <div class="pseudo">
                <label for="car-prixj-bdd">Prix jour</label>
                <input type="text" id="car-prixj-bdd" placeholder="Saisissez un prix jour " name="car-prixj-bdd">
            </div>
            <div class="btn">
                <input type="submit" value="Envoyer">
                <input type="reset" value="Réinitialiser">
            </div>
        </form>
    </div> -->
</section>

<?php include '../inc/footer.php'; ?>