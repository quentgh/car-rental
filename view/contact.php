<?php

session_start();

$titlePage = "Page de contact";

require_once 'function.php';
include '../inc/header.php';

$contenu = '';

if ($_POST) {

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contenu .= "<br/>" . '<div style="color:crimson;">Désolé, adresse email non valide, votre message n\'a pas été envoyé.</div>';
    }

    if (empty($contenu)) {

        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur);
        }

        $query = getBdd()->prepare("INSERT INTO contact (email, contenu) VALUES (:email, :contenu)");

        $success = $query->execute(array(
            ':email' => $_POST['email'],
            ':contenu' => $_POST['contenu'],
        ));

        if ($success) {
            $contenu .= "<br/>" . '<div style="color:green;">Bien reçu, merci pour votre message.</div>';
        } else {
            $contenu .= "<br/>" . '<div style="color:crimson;">Erreur lors de l\'envoi du message.</div>';
        }
    }
}


?>

<section class="message">
    <h2>Laissez-nous un message !</h2>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="email">
                <label for="email">Votre email</label>
                <input type="email" id="email" placeholder="email" name="email">
            </div>
            <div class="contenu">
                <label for="contenu">Votre message</label>
                <div>
                    <textarea name="contenu" id="contenu" cols="60" rows=18"></textarea>
                </div>
            </div>
            <div class="btn">
                <input type="submit" value="Envoyer">
                <input type="reset" value="Réinitialiser">
            </div>
            <div>
            <?php echo $contenu; ?>
            </div>
        </form>
    </div>
</section>

<?php include  '../inc/footer.php'; ?>