<?php

$titlePage = "Page d'inscription";

require_once 'function.php';
include '../inc/header.php';

$subscription = '';

if ($_POST) {

    if (!isset($_POST['username']) || strlen($_POST['username']) < 2 || strlen($_POST['username']) > 50) {
        $subscription .= '<div style="color:crimson;">Le nom utilisateur doit comporter entre 2 et 50 caractères</div>';
    }

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $subscription .= '<div style="color:crimson;">Adresse email non valide. Merci de réessayer. </div>';
    }

    if (empty($subscription)) {

        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur);
        }

        $query = getBdd()->prepare("INSERT INTO membre (username, mdp,email) VALUES (:username, :mdp, :email)");

        $success = $query->execute(array(
            ':username' => $_POST['username'],
            ':mdp' => $_POST['mdp'],
            ':email' => $_POST['email']
        ));

        if ($success) {
            $subscription .= '<div style="color:forestgreen;">Votre inscription a bien été réalisée, merci.</div>';

            $_SESSION['username'] = $_POST['username'];

            header("Location:connection.php");
        } else {
            $subscription .= '<div style="color:crimson;">Erreur lors de l\'inscription.</div>';
        }
    }
}

?>

<section class="subscription">
    <h2>Formulaire d'inscription.</h2>
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
            <div class="email">
                <label for="email">Votre email</label>
                <input type="email" id="email" placeholder="Saisissez un email" name="email">
            </div>
            <div class="btn">
                <input type="submit" value="Envoyer">
                <input type="reset" value="Réinitialiser">
            </div>
        </form>
    </div>
    <div>
        <?php echo $subscription; ?>
    </div>
    </div>
</section>
<?php include  '../inc/footer.php'; ?>