<?php include 'head.html'; 
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();
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
        <h2>Synthèse des compétences</h2>

<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'student');
} catch (Exception $e) {
    exit('Erreur : '.$e->getMessage());
}
$bloc = $bdd->query('SELECT id_bloc,nom FROM bloc');
while ($bloc_data = $bloc->fetch()){
?>


        
        <br>
        <p>Bloc <?php echo $bloc_data['id_bloc'] ?> - <?php echo $bloc_data['nom'] ?></p>
<?php 
$activite = $bdd->query('SELECT id_activite,activite.nom FROM activite JOIN bloc ON bloc.id_bloc = activite.id_bloc WHERE bloc.id_bloc = "'.$bloc_data['id_bloc'].'"'); 
while ($activite_data = $activite->fetch()){
?>
        <br>
        <p>Activité <?php echo $bloc_data['id_bloc']?>.<?php echo $activite_data['id_activite'] ?>.-<?php echo $activite_data['nom']?></p>
        <br>
        <h2>Compétence  Situation</h2>



<?php 
$competence = $bdd->query('SELECT id_competence,competences.nom FROM competences JOIN activite ON activite.id_activite = competences.id_activite WHERE activite.id_activite ="'.$activite_data['id_activite'].'"'); 

while ($competence_data = $competence->fetch()){
    ?>    


        <table>
            <tr>
       
                <td><?php echo $bloc_data['id_bloc']?>.<?php echo $activite_data['id_activite'] ?>.<?php echo $competence_data['id_competence']?>-<?php echo $competence_data['nom'] ?> </td><td>2</td>
            </tr>
        </table>
        <?php
}
}
}
?>
        </div>
    </div>