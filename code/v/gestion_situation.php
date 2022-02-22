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
if (isset($_POST['update'])){
    $q = $bdd->query('UPDATE situation WHERE id = ' . $_POST['update']);
}
require_once('head.html')
?>
<h1>Competences</h1>
    <div class="box">
        <div class="gauche">
            <div class="insidebox">
                <?php
                require_once('menuG.php');
                ?>
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
                            <form type="submit" action="modifier_situation.php" method="post"><button name="modif_situation" class="menuG" submit>modifier</button></form>
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