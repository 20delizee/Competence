<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">	
        <title>Compétences</title>
        <link rel="stylesheet" type="text/css" href="../style.css">	
    </head>
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
                            </section>
                    </main>
                </div>
        </div>
    </body>
</html>