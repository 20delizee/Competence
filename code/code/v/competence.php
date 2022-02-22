<?php
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    exit('Erreur : '.$e->getMessage());
}
if (isset($_POST['deleteId'])){
    $q = $bdd->query('DELETE FROM situation WHERE id = ' . $_POST['deleteId']);
}

?>
<h1>Competences</h1>

<div class="gauche">
            <div class="insidebox">
                        <a href="#"><img src="../img/home.png" height="50px" width="50px"></a>
                            <?= $auth->getStudent()->id_EGNOM;?><br>
                            <?= $auth->getStudent()->nom;?>
                            <?= $auth->getStudent()->prenom;?>

                        <a href="logout.php"><img src="../img/logout.ico" height="50px" width="50px"></a>
                        <div class="encadre">
                            <B> professionnelle</B>
                        </div>
                        <form type="submit" action="#" method="post"><button name="nvl_situation" class="menuG" submit>Nouvelle situation</button></form>
                        <form type="submit" action="#" method="post"><button name="gest_situation" class="menuG" submit>Gestion situation</button></form>
                        <div class="encadre">
                            <B>Synthèse</B>
                        </div>
                        <form type="submit" action="#" method="post"><button name="competence" class="menuG" submit>Compétences</button></form>
                        <form type="submit" action="#" method="post"><button name="tab_synth" class="menuG" submit>Tableau synthèse</button></form>
                        <div class="encadre">
                            <B>Divers</B>
                        </div>
                        <form type="submit" action="#" method="post"><button name="parametre" class="menuG" submit>Paramètres</button></form>
                        <form type="submit" action="#" method="post"><button name="contact" class="menuG" submit>Contact admin</button></form>
            </div>
        </div>
<?php
echo 'page competence';
