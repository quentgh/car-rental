<?php

session_start();

$userName = $_SESSION['username'];
$titlePage = "Page d'admin - Vue BDD";

require_once 'function.php';
include '../inc/headerAdm.php';

check_authAdm();

$resultResa = getBdd()->query("SELECT * FROM reservation");

$res = getBdd()->query(
    "SELECT *
    FROM reservation
    JOIN voiture
    ON reservation.id_voiture = voiture.id"
);

$donnees = $res->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="profil-adm">
    <h2 id="svc">Contenu de la table RESERVATION</h2>
    <div class="cards-adm">
        <div class="card-adm">
            <?php echo '<span class="gras">Nombre total des réservations : ' . $resultResa->rowCount() . '</span>';

            if (!empty($donnees)) {
                echo '<div class="card-profil-adm">';
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
                echo '</div>';
            } else {
                echo "BDD vide. <br/>";
            }
            ?>
        </div>
    </div>
</section>

<?php
include '../inc/footer.php';
?>