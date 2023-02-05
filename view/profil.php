<?php

session_start();

$userName = $_SESSION['username'];
$titlePage = "Page de profil - $userName";
$subscription = '';

require_once 'function.php';
include '../inc/header.php';

check_auth();

$resultResa = getBdd()->prepare("SELECT * FROM reservation WHERE id_membre = ? ");
$resultResa->execute(array(
    $_SESSION['id_membre']
));

$resDateResaD = getBdd()->prepare("SELECT dt_debut FROM reservation WHERE id_membre = ?");
$resDateResaD->execute(array(
    $_SESSION['id_membre']
));
$dtDebut = $resDateResaD->fetch(PDO::FETCH_ASSOC);

$resDateResaF = getBdd()->prepare("SELECT dt_fin FROM reservation WHERE id_membre = ?");
$resDateResaF->execute(array(
    $_SESSION['id_membre']
));
$dtFin = $resDateResaF->fetch(PDO::FETCH_ASSOC);

$resPrix = getBdd()->prepare("SELECT prix_total FROM reservation WHERE id_membre = ?");
$resPrix->execute(array(
    $_SESSION['id_membre']
));
$prixTotal = $resPrix->fetch(PDO::FETCH_ASSOC);

$res = getBdd()->prepare(
    "SELECT reservation.id AS 'Numéro de la réservation',
            reservation.id_voiture AS 'Voiture',
            -- voiture.image AS '',
            reservation.dt_debut AS 'Date de début',
            reservation.dt_fin AS 'Date de Fin',
            prix_total
    FROM reservation
    JOIN voiture
    ON reservation.id_voiture = voiture.id
    WHERE id_membre = ?"
);
$res->execute(array(
    $_SESSION['id_membre']
));

$donnees = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="profil">
    <h2 id="svc">Votre profil - <?php echo $userName ?> </h2>
    <div class="successMessage">
        <?php echo $subscription; ?>
    </div>
    <div class="hello">
        Bonjour <?php echo $_SESSION['username'];
                ?> et bienvenue !

        <?php if (!empty($_SESSION['id_membre'])) : ?>
            <a href="logout.php">Se déconnecter</a>
        <?php endif; ?>
    </div>
    <div class="cards">
        <div class="card card-profil">
            <?php echo '<span class="gras">Nombre de vos réservations : ' . $resultResa->rowCount() . '</span>';

            if (!empty($donnees)) {
                echo '<table>';
                echo '<tr>';
                foreach ($donnees[0] as $key => $value) { ?>
                    <th><?= $key ?></th>
            <?php
                }
                echo '</tr>';

                foreach ($donnees as $value) {
                    echo '<tr>';
                    foreach ($value as $cells) {
                        echo "<td>$cells</td>";
                    }
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "Retrouver vos prochaines réservations ici. <br/>";
            }
            ?>
        </div>
    </div>
    <div class="new-resa">
        <a href="index.php#svc">Faire une nouvelle réservation</a>
    </div>
</section>

<?php
include '../inc/footer.php';
?>