<?php
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../style.css">	
    <title>Compétences crème</title>
</head>
<body>
        <h1>Competences
        </h1>
 
        <div class="Box">
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
                    <!------------------ Description de la situation professionnelle --------------------->
                    <div class="encadre">
                        <B>Description de la situation professionnelle </B>
                    </div>




                    <form method="post" >
                    <?php 
                    
                    if(isset($_POST['valider'])){
                    $req = $bdd->prepare('INSERT INTO situation(nom, date_debut, duree, details) VALUES(:nom, :date_debut, :duree, :details)');
                    $req->execute(array(
                         'nom' => $_POST['nom'],
                         'date_debut' => $_POST['date_debut'],
                         'duree' => $_POST['duree'],
                         'details' => $_POST['details']
                          ));
                               ?>         
                    
                    <?php

                    $req = $bdd->prepare('INSERT INTO contexte(contexte) VALUES(:contexte)');
                    $req->execute(array(
                         'contexte' => $_POST['contexte'],
  
                          ));
                               ?>  

                    <?php
                         
                    $req1 = $bdd->prepare('INSERT INTO liens(URI, details) VALUES (:URI, :details)');
                    $req1->execute(array(
                         'URI' => $_POST['URI'],
                         'details' => $_POST['details'],));     
                    $sit = $bdd->query('SELECT id FROM situation WHERE details="'.$_POST['details'].'"');
                        while ($sit_data = $sit->fetch()){
                    $comp = $bdd->query('SELECT id_competence FROM competences WHERE nom="'.$_POST['competence_ajout'].'"');        
                        while ($comp_data = $comp->fetch()){
                            echo $comp_data['id_competence'];
                    $req2 = $bdd->prepare('INSERT INTO viser(id, id_competence) VALUES (:id,:id_competence)');
                    $req2->execute(array(
                    'id' => $sit_data['id'],
                    'id_competence' => $comp_data['id_competence'],
                    ));
                        }}}
                               ?>  
                   


                            
                         Nom : <input type="text" placeholder="nom" name="nom" />                   
                        <br>
                        <br>
      
                    <label for="start">Début : </label>

                    <input type="date" id="start" name="date_debut"
                        value=""
                        min="" max="">

                        <br><br>

                       Durée : <input type="text" name="duree" />

                       <br><br>

                    <label>Détails : <input type="text" name="details" /></textarea></label>
                

                 

                    

                    <br>
                    <br>

                        

                    
                     <label for="contexte-select">Contexte : </label>
                        <select name="contexte" id="contexte-select">
                            <option value="">--</option>
                            <option value="A">Atelier</option>
                            <option value="S">Stage</option>
                            <option value="S2">Stage 2</option>
                        </select>

                        
                
                        
                        
                        





                    <br>
                    <br>
                    <br>
                    <!--------------------- Accès aux éléments justificatifs ---------------------------->

                    

                    <div class="encadre">
                        <B>Accès aux éléments justificatifs </B>
                    </div>    
                    <div class="partie">
                        <div class="partieg">
                            <label>URI <input type="text" name="URI" /></textarea></label>
                            </br>
                            <br>
                            <label>Détails <input type="text" name="details" /></textarea></label>
                        </div>
                        <div class="partied">
                            <button class="icon-btn add-btn">  
                                <div class="btn-txt">Supprimer</div>
                            </button>  
                        </div>  
                        <br>    
                    </div>
                    <div class="add">
                        <button class="icon-btn add-btn">
                            <div class="add-icon"></div>
                            <div class="btn-txt">Ajouter</div>
                        </button>
                    </div>
                    <div class="partie">
                    <div class="partieg">
                    <?php
                            

                            try {
                                $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
                            } catch (Exception $e) {
                                exit('Erreur : '.$e->getMessage());
                            }
                            $bloc = $bdd->query('SELECT id_bloc,nom FROM bloc');
                            while ($bloc_data = $bloc->fetch()){
                            ?>


                                    
                                <br>
                                <h2>Bloc <?php echo $bloc_data['id_bloc'] ?> - <?php echo $bloc_data['nom'] ?></h2>
                                <?php 
                                $activite = $bdd->query('SELECT id_activite,activite.nom FROM activite JOIN bloc ON bloc.id_bloc = activite.id_bloc WHERE bloc.id_bloc = "'.$bloc_data['id_bloc'].'"'); 
                                while ($activite_data = $activite->fetch()){

                                ?>
                                            <br>
                                            <h3>Activité <?php echo $bloc_data['id_bloc']?>.<?php echo $activite_data['id_activite'] ?>.-<?php echo $activite_data['nom']?></h3>
                                            <br>



                                    <?php 
                                    $competence = $bdd->query('SELECT id_competence,competences.nom FROM competences JOIN activite ON activite.id_activite = competences.id_activite WHERE activite.id_activite ="'.$activite_data['id_activite'].'"'); 
                                    while ($competence_data = $competence->fetch()){
                                    ?>    
                                    <?php $competences = $competence_data['nom']?>
                                        <table>
                                            <tr>
                                    
                                                <input type="checkbox" id="competence_ajout" name="competence_ajout" value='<?php echo $competence_data['nom']?>'> <label for="competence_ajout"><?php echo $bloc_data['id_bloc']?>.<?php echo $activite_data['id_activite'] ?>.<?php echo $competence_data['id_competence']?>-<?php echo $competence_data['nom'] ?></label>
                                            </tr>
                                            </br>
                                        </table>
                                        </br>
                                        <?php
                                    }
                                }
                            }
                            ?>   
                            </div>
                            </div>

                    
                    
                    <div class="valider">
                        <input class="button" type="submit" style="vertical-align:middle" name="valider">
                    </div>
                   
                    
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>








                   
</body>
</html>