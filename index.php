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
                    <input type="text" name="name" id="name" <?= isset($_SESSION['data']['name']) ? 'value="' . $_SESSION['data']['name'] . '"' : 'value=""' ?> required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'name'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                    <?php endif ?>
                </div>
                <div class="group-item">
                    <label for="firstname">Prénom *</label>
                    <input type="text" name="firstname" id="firstname" <?= isset($_SESSION['data']['firstname']) ? 'value="' . $_SESSION['data']['firstname'] . '"' : 'value=""' ?> required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'firstname'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="group-item">
                    <label for="email">E-mail *</label>
                    <input type="email" name="email" id="email" <?= isset($_SESSION['data']['email']) ? 'value="' . $_SESSION['data']['email'] . '"' : 'value=""' ?> required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'email'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                    <?php endif ?>
                </div>
                <div class="group-item">
                    <label for="phone">Téléphone *</label>
                    <input type="tel" name="phone" id="phone" <?= isset($_SESSION['data']['phone']) ? 'value="' . $_SESSION['data']['phone'] . '"' : 'value=""' ?> required>
                    <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'phone'): ?>
                        <p class="error">Ce champ n'est pas valide !</p>
                    <?php endif ?>
                </div>
            </div>
            <div class="group-item">
                <label for="subject">Sujet *</label>
                <select class="select" name="subject" id="subject" required>
                    <option value="emptySelect">--</option>
                    <option value="0">Demande de rendez-vous</option>
                    <option value="1" <?= (isset($_SESSION['data']['subject']) && $_SESSION['data']['subject'] == "1") ? 'selected' : "" ?> >Faire une réclamation</option>
                    <option value="2" <?= (isset($_SESSION['data']['subject']) && $_SESSION['data']['subject'] == "2") ? 'selected' : "" ?> >Demande de crédit</option>
                    <option value="3" <?= (isset($_SESSION['data']['subject']) && $_SESSION['data']['subject'] == "3") ? 'selected' : "" ?> >Demande d'information</option>
                </select>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'subject'): ?>
                    <p class="error">Ce champ n'est pas valide !</p>
                <?php endif ?>
            </div>
            <div class="group-item">
                <label for="message">Votre message *</label>
                <textarea name="message" id="message" rows="12" required> <?= isset($_SESSION['data']['message']) ? $_SESSION['data']['message'] . '"' : ""?></textarea>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] == 'message'): ?>
                    <p class="error">Ce champ n'est pas valide !</p>
                <?php endif ?>
            </div>
            <div class="group-item btn">
                <button class="btn-submit" type="submit" title="Envoyer le formulaire">Envoyer</button>
            </div>
        </form>
    </main>
</body>
</html>
<?php session_destroy() ?>