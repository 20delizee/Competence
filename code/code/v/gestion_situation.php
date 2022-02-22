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
<div class="marge">
<h1>Competences</h1>

    <div class="box">
        <div class="gauche">
            <div class="insidebox">
                        <a href="#"><img src="../img/home.png" height="50px" width="50px"></a>
                        <?= $auth->getStudent()->id_EGNOM;?><br>
                            <?= $auth->getStudent()->nom;?>
                            <?= $auth->getStudent()->prenom;?>

                        <a href="logout.php"><img src="../img/logout.ico" height="50px" width="50px"></a>
                        <div class="encadre">
                            <B>Situation professionnelle</B>
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


        <div class="droite">
            <div class="insidebox">
                    <p>Gestion des situations professionnelles</p>
                    <table>
                        <tr>
                            <td>Date début</td>     
                            <td>Nom Situation</td>         
                            <td>Contexte</td>     
                            <td>Date création</td>
                            <td>Supprimer</td>
                            <td>Modifier</td>

                        </tr>
                        <?php
                        $q = $bdd->query('SELECT * FROM situation');
                        while ($data = $q->fetch()){
                            $id = $data['id'];
                            $nom = $data['nom'];
                            $date_debut = $data['date_debut'];
                            $details = $data['details'];
                            $date_creation = $data['date_creation'];
                        ?>
                        <tr>
                            <td><?php echo $date_debut; ?></td> 
                            <td><?php echo $nom; ?></td> 
                            <td><?php echo $details; ?></td>
                            <td><?php echo $date_creation; ?></td>
                            <td>
                            <form method="POST" action="../v/gestion_situation.php">
                                <input type="hidden" name="deleteId" value="<?php echo $id;?>" />
                                <input type="submit" value="Supprimer" />
                            </form>
                            </td>
                            <td>
                            <form method="POST" action="../v/upsituation.php">
                                <input type="hidden" name="update" value="<?php echo $id;?>" />
                                <input type="submit" value="modifier" />
                            </form>
                            </td>
                        </tr>
                        <?php
                        }
                        if(isset($_POST['deleteId'])){
                            header('Location: ../c/collab.php?=1');
                            }
                        ?>
                        

                    </table>
                    <form method="POST" action="../v/generate_pdf.php">
                        <input type="hidden" name="deleteId" value="<?php echo $id;?>" />
                        <input type="submit" value="Télécharger le tableau en PDF" />
                    </form>
                </div>
            </div>
    </div>
</div>
</body>
</html>