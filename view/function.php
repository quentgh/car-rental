<?php

// FUNCTION
function debug($param)
{
    echo '<pre>';
    print_r($param);
    echo '</pre>';
}

function getBdd()
{
    $pdo = new PDO('mysql:host=localhost;dbname=location', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ));

    return $pdo;
}

function check_auth()
{
    if (empty($_SESSION['id_membre'])) {
        header('Location: connection.php');
        exit();
    }
}

function logout()
{
    $_SESSION['id_membre'] = null;
    unset($_SESSION['id_membre']);
}

function check_authAdm()
{
    if (empty($_SESSION['id_membre'] && $_SESSION['admin'])) {
        header('Location: ../view/admConnection.php');
        exit();
    }
}

function logoutAdm()
{
    $_SESSION['id_membre'] = null;
    $_SESSION['admin'] = null;
    unset($_SESSION['id_membre']);
    unset($_SESSION['admin']);
}

function getDateDiff(string $dt_debut, string $dt_fin)
{
    $q = getBdd()->query("SELECT DATEDIFF('$dt_fin', '$dt_debut')");
    return $q->fetch();
}


function editResa(int $id_voiture, string $dt_debut, string $dt_fin, int $prix_total, int $id, int $id_membre)
{
    $q = getBdd()->prepare("UPDATE reservation SET id_membre = ?, id_voiture = ?, dt_debut = ?, dt_fin = ?, prix_total = ? WHERE id = ?");
    return $q->execute(array($id_membre, $id_voiture, $dt_debut, $dt_fin, $prix_total, $id));
}

function validateResa(int $id_voiture, string $dt_debut, string $dt_fin, int $prix_total, int $id_membre = NULL)
{
    $q = getBdd()->prepare("INSERT INTO reservation (id_membre, id_voiture, dt_debut, dt_fin, prix_total) VALUES (?, ?, ?, ?, ?)");
    if (is_null($id_membre))
        return $q->execute(array($_SESSION['id'], $id_voiture, $dt_debut, $dt_fin, $prix_total));
    else
        return $q->execute(array($id_membre, $id_voiture, $dt_debut, $dt_fin, $prix_total));
}
