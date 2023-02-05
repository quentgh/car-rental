<?php

session_start();

$titlePage = "Confirmation de la réservation";

require_once 'function.php';
include '../inc/header.php';


//Inscription en BDD à cette étape de confirmation
$res = getBdd()->prepare("INSERT INTO reservation (dt_debut, dt_fin, prix_total, id_membre, id_voiture) VALUES (?, ?, ?, ?, ?)");
$res->execute(array(
    $_SESSION['dt_debut'], $_SESSION['dt_fin'], $_SESSION['prix_jour'], $_SESSION['id_membre'], $_SESSION['id_voiture']
));


?>
<!-- Au prix total de : //<?php echo $prixTotal['prix_total']; ?> </p> -->

<!-- ?> -->

<section class="confirmation">
    <h2 id="svc">Votre réservation a bien été prise en compte, merci !</h2>
    <div class="cards">
        <div class="card">
            <img src="<?php echo '../' . $_SESSION['img_voiture']; ?>" class="card-img" alt="Audit Modèle S6" />
            <h3 class="card-title"><?php echo $_SESSION['nom_voiture']; ?></h3>
            <a href="index.php" class="card-btn">Retourner à l'acceuil</a>
        </div>
    </div>
</section>

<?php include '../inc/footer.php'; ?>