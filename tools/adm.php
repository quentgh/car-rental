<?php

session_start();

$titlePage = "Page d'accueil Admin";

$injection = '';

require_once '../view/function.php';
include '../inc/headerAdm.php';

check_authAdm();

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

</section>

<?php include '../inc/footer.php'; ?>
