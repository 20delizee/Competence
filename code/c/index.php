<?php
    require('../assets/includes/bootstrap.php');
    $auth = App::getAuth();
    $db = App::getDatabase();

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $student = $auth->login($db, $_POST['username'], $_POST['password']);
        if ($student) {
            $auth->getSession()->sendFlash('success', "Authentification réussie");
            App::redirect('collab.php');
        } else {
            $auth->getSession()->sendFlash('danger', 'Identifiant ou mot de passe incorrecte');
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">	
        <title>Compétences</title>
        <link rel="stylesheet" type="text/css" href="../style.css">	
    </head>
    <video poster="road.jpg" id="bgvid" playsinline autoplay muted loop>
    <source src="../img/road.webm" type="video/webm">
    <source src="../img/road.mp4" type="video/mp4">
    </video>
    <body>
        <div class="marge">
            <h1>
                COMPETENCES
            </h1>
                <div class="centre">
                    <main>
                            <section class="login">
                                <?php if (Session::getInstance()->hasFlashed()) : ?>
                                <?php foreach (Session::getInstance()->getFlashes() as $type => $message) : ?>
                                    <div class="alert alert-<?= $type; ?>">
                                        <?= $message; ?>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger">
                                        Remplissez le formulaire d'inscription correctement:
                                        <?php foreach ($errors as $error) : ?>
                                            - <?= $error; ?> <br />
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <form action="" method="POST">
                                    <div>
                                        <span>Identifiant</span>
                                        <br>
                                        <input type="text" name="username">
                                    </div>
                                    <br>
                                    <div>
                                        <span>Mot de passe</span>
                                        <br>
                                        <input type="password" name="password">
                                    </div>
                                    <br>
                                    <input type="submit" value="Envoyer">
                                </form>
                                <br>
                                <p>identifiant: 20courtot, 20noizet, 20varnier, 20saintpere, 20delizee</p>
                                <p>mot de passe: 20courtot, 20noizet, 20varnier, 20saintpere, 20delizee</p>
                            </section>
                    </main>
                </div>
        </div>
    </body>
</html>

