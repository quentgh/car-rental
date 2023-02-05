<?php
$titlePage = "Location de voiture";

require_once 'function.php';
include '../inc/header.php';

$resCar = getBdd()->query("SELECT
                        id,
                        nom,
                        description,
                        image
                        FROM voiture 
                        ORDER BY id DESC");

?>

<section class="hero">
    <h1>Location de voitures</h1>
    <a href="#svc">Toutes nos voitures à louer !</a>
</section>
<section class="svc-loc">
    <h2 id="svc">Nos voitures à réserver dès à présent</h2>
    <div class="cards">
        <?php
        while ($card = $resCar->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="card">
                <img src=<?php echo "../" . $card['image'] ?> class="card-img" alt="modèle de voiture" />
                <h3 class="card-title"><?php echo $card['nom'] ?></h3>
                <p class="card-text">
                    <?php echo $card['description'] ?>
                </p>
                <a href="resaVehicule.php?id=<?php echo $card['id'] ?>" class="card-btn">Réserver cette voiture</a>
            <?php echo '</div>';
        }
        echo '</div>';
        echo '</section>';
        include '../inc/footer.php'; ?>