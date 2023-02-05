<?php

session_start();

$titlePage = "Page de connexion Admin";

require_once 'function.php';
include '../inc/headerAdm.php';

$message = '';
// $subscription = '';


if (isset($_POST['username'])) {
    $isSuccess = 0;
    $sql = "SELECT * FROM membre WHERE username = :username ";
    $query = getBdd()->prepare($sql);
    $query->execute(array(
        ':username' => $_POST['username']
    ));

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC)) {
        // echo "Je rentre dans le WHILE";
        if (!empty($donnees) && ($donnees['admin'] == 1)) {
            // echo "Je rentre dans IF du while <br/>";
            $hashedPassword = $donnees['mdp'];
            if ($_POST['mdp'] == $hashedPassword) {
                $isSuccess = 1;
            }
        }
    }
    if ($isSuccess == 1) {
        $message = "<br/>" . '<div style="color:forestgreen;">Authentification Admin réussie, merci !</div>' . "<br/>";

        $query = getBdd()->prepare("SELECT id FROM membre WHERE username = ?");
        $query->execute(array(
            $_POST['username']
        ));

        $id_membre = $query->fetch(PDO::FETCH_ASSOC);

        // echo "Je suis id_membre <hr/>";
        // print_r($id_membre) ;
        // echo "<br/>";

        $query = getBdd()->prepare("SELECT username,
                                            admin
                                    FROM membre
                                    WHERE username = ?");
        $query->execute(array(
            $_POST['username']
        ));

        $userName = $query->fetch(PDO::FETCH_ASSOC);
        // echo "Je suis username <hr/>";
        // print_r($userName) ;
        $_SESSION['username'] = $userName['username'];
        $_SESSION['admin'] = $userName['admin'];
        $_SESSION['id_membre'] = $id_membre['id'];

        // echo "<hr/>";
        // print_r($_SESSION['username']);
        // echo "<hr/>";
        // print_r($_SESSION['admin']);
        // echo "<hr/>";
        // print_r($_SESSION['id_membre']);

        header("Location:../tools/adm.php");

    } else {
        $message = "<br/>" . '<div style="color:crimson;">Identifiant ou mot de passe erroné, merci de réessayer.</div>' . "<br/>";
    }
}

?>
<section class="connection">
    <h2>Authentification "Administrateur" demandée.</h2>
    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="pseudo">
                <label for="username">Nom utilisateur</label>
                <input type="text" id="username" placeholder="Saisissez un nom utilisateur ou pseudo" name="username">
            </div>
            <div class="pwd">
                <label for="mdp">Mot de passe</label>
                <input type="password" id="mdp" placeholder="Saisissez un mot de passe" name="mdp">
            </div>
            <div class="btn">
                <input type="submit" value="Envoyer">
                <input type="reset" value="Réinitialiser">
            </div>
            <div>
                <?php echo $message; ?>
            </div>
        </form>
    </div>
</section>
<?php include '../inc/footer.php'; ?>