<?php

session_start();

$titlePage = "Page de vérification de la réservation";
$nom_voiture = $_SESSION['nom_voiture'];
$img_voiture = $_SESSION['img_voiture'];
$prix_jour = $_SESSION['prix_jour'];

require_once 'function.php';
include '../inc/header.php';


if ($_POST) {

    $_SESSION['dt_debut'] = htmlspecialchars($_POST['dt_debut']);
    $_SESSION['dt_fin'] = htmlspecialchars($_POST['dt_fin']);

}

?>

<section class="validation">
    <h2 id="svc">Vérification de la réservation</h2>
    <div class="cards">
        <div class="card card-verif">
            <img src="<?php echo '../' . $img_voiture; ?>" class="card-img" alt="modèle de voiture" />
            <h3 class="card-title"><?php echo $nom_voiture ?></h3>
            <p class="card-text">
                La réservation est comprise pour la période suivante : <?php echo " de " . $_SESSION['dt_debut'] . " à " . $_SESSION['dt_fin'] . "<br/><br/>"; ?>
                Au prix total de : <?php echo $prix_jour; ?>
            </p>
            <a href="confirmation.php" class="card-btn">Payer la réservation</a>
        </div>
    </div>
</section>

<?php include '../inc/footer.php'; ?>