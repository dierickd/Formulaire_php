<?php
session_start();
if (isset($_SESSION) && empty($_SESSION)) {
    header('Location: index.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main class="main">
        <div class="jumbotron success">
            <h1>Message envoyé avec succès</h1>
        </div>
        <div class="container_fluid">
            <p>
                Merci <b><?= $_SESSION['data']['firstname'] ?> <?= $_SESSION['data']['name'] ?></b> de nous avoir contacté à propos de “<?= $_SESSION['data']['subject'] ?>”.
            </p>
            <p>
                Un de nos conseiller vous contactera soit à l’adresse <?= $_SESSION['data']['email'] ?> ou par téléphone au <?= $_SESSION['data']['phone'] ?> dans les plus brefs délais pour traiter votre demande :
            </p>
            <p>
                <b><?= $_SESSION['data']['message'] ?></b>
            </p>
            <div class="btn">
                <a href="index.php" class="btn-home" title="Retourner vers la page d'accueil">Retour à l'accueil</a>
            </div>
        </div>
    </main>
</body>
</html>
<?php session_destroy() ?>
