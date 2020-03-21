<?php
session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Envoyer un message</title>
</head>
<body>
    <main class="main">
        <div class="jumbotron">
            <h1>Formulaire de contact</h1>
        </div>
        <form action="formController.php" method="post" class="form">
            <p class="required">Les champs marqués d'un * sont obligatoire.</p>
            <div class="form-group">
                <div class="group-item">
                    <label for="name">Nom *</label>
                    <input type="text" name="name" id="name" required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'name'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                </div>
                <div class="group-item">
                    <label for="firstname">Prénom *</label>
                    <input type="text" name="firstname" id="firstname" required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'firstname'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="group-item">
                    <label for="email">E-mail *</label>
                    <input type="email" name="email" id="email" required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'email'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                </div>
                <div class="group-item">
                    <label for="phone">Téléphone *</label>
                    <input type="tel" name="phone" id="phone" required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'phone'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                        <?php unset($_SESSION['error']) ?>
                    <?php endif ?>
                </div>
            </div>
            <div class="group-item">
                <label for="subject">Sujet *</label>
                <select class="select" name="subject" id="subject" required>
                    <option value="emptySelect">--</option>
                    <option value="0">Demande de rendez-vous</option>
                    <option value="1">Faire une réclamation</option>
                    <option value="2">Demande de crédit</option>
                    <option value="3">Demande d'information</option>
                </select>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'subject'): ?>
                    <p class="error">Ce champ n'est pas valide !</p>
                    <?php unset($_SESSION['error']) ?>
                <?php endif ?>
            </div>
            <div class="group-item">
                <label for="message">Votre message *</label>
                <textarea name="message" id="message" rows="12" required></textarea>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'message'): ?>
                    <p class="error">Ce champ n'est pas valide !</p>
                    <?php unset($_SESSION['error']) ?>
                <?php endif ?>
            </div>
            <div class="group-item btn">
                <button class="btn-submit" type="submit" title="Envoyer le formulaire">Envoyer</button>
            </div>
        </form>
    </main>
</body>
</html>
