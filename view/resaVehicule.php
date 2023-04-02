<?php

session_start();
$titlePage = "Page de réservation";
require_once 'function.php';
include '../inc/header.php';

check_auth();

$resultPrix = getBdd()->prepare("SELECT 
                                nom,
                                description,
                                image,
                                prix_journalier
                                FROM voiture
                                WHERE id = ?");

$resultPrix->execute([
    $_GET['id']
]);

$donnees = $resultPrix->fetch(PDO::FETCH_ASSOC);

$_SESSION['nom_voiture'] = $donnees['nom'];
$_SESSION['img_voiture'] = $donnees['image'];
$_SESSION['id_voiture'] = $_GET['id'];

$_SESSION['prix_jour'] = $donnees['prix_journalier'];

?>

<section class="reservation">
    <h2 id="svc">Votre réservation en cours</h2>
    <div class="cards">
        <div class="card card-resa">
            <img src=<?php echo "../" . $donnees['image'] ?> class="card-img" alt="modèle de voiture" />
            <h3 class="card-title"> <?php echo $donnees['nom'] ?> </h3>
            <p class="card-text">
                <?php
                echo $donnees['description'] . "<br/><br/>";
                echo '<div style="font-weight:bold;"> Prix par jour : ' . $donnees['prix_journalier'] . ' euros</div>';
                ?>
            </p>
            <div class="form-resa">
                <form action="verifResa.php" method="post" enctype="multipart/form-data">
                    <div>
                        <tr>
                            <td><label for="dt_debut">Date de début : </label></td>
                            <td><input type="date" id="dt_debut" name="dt_debut"></td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <td><label for="dt_fin">Date de fin : </label></td>
                            <td><input type="date" id="dt_fin" name="dt_fin"></td>
                        </tr>
                    </div>
                    <div class="btn">
                        <input type="submit" value="Vérifier la réservation">
                        <input type="reset" value="Réinitialiser">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include '../inc/footer.php'; ?>