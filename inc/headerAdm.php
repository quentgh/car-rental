<?php

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $titlePage; ?>
    </title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="stylesheet" href="../assets/css/resaVehicule.css" />
    <link rel="stylesheet" href="../assets/css/verifResa.css" />
    <link rel="stylesheet" href="../assets/css/confirmation.css" />
    <link rel="stylesheet" href="../assets/css/subscription.css" />
    <link rel="stylesheet" href="../assets/css/profil.css" />
    <link rel="stylesheet" href="../assets/css/connection.css" />
    <link rel="stylesheet" href="../assets/css/contact.css" />
    <link rel="stylesheet" href="../assets/css/adm.css" />
    <link rel="stylesheet" href="../assets/css/admR.css" />
</head>

<body>
    <div class="container-up">
        <a href="#">UP</a>
    </div>
    <header>
        <div class="home">
            <a href="../tools/adm.php">Accueil Admin</a>
            <a href="../view/index.php" style="font-style:italic; color:teal">Accueil Client</a>
        </div>
        <nav>
            <a href="../view/admC.php">Injection BDD Location</a>
            <a href="../view/admR.php">Vue BDD Location</a>
        </nav>
        <div class="navProfil">
            <a href="../view/logoutAdm.php">Se déconnecter</a>
        </div>
    </header>
    <main>