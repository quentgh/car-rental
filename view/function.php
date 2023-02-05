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