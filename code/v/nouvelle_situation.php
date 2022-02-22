<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">	
    <title>Compétences crème</title>
</head>
<body>
    <div class="marge">
        <h1>Competences</h1>
 
        <div class="Box">
            <div class="gauche">
                <div class="insidebox">
                    <a href="#"><img src="../img/home.png" height="50px" width="50px"></a>
                    <?php
                        print_r($_SESSION);
                    ?>
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
                    <form action="#" method="POST">
                    <label>Nom situation <input type="text" name="nom_si" /></textarea></label>
                    <br>
                    <br>
                    <label for="contexte-select">Contexte : </label>
                        <select name="contexte" id="contexte-select">
                            <option value="">--</option>
                            <option value="Atelier">Atelier</option>
                            <option value="Stage">Stage</option>
                            <option value="Stage 2">Stage 2</option>
                        </select>
                        <br>
                        <br>
                    <label for="start">Début :</label>

                    <input type="date" id="start" name="trip-start"
                        value=""
                        min="" max="">
                        <label for="duree-select">Durée : <input type="text"></label>
                        <select name="duree" id="duree-select">
                            <option value="">--</option>
                            <option value="Jour(s)">Jour(s)</option>
                            <option value="Mois">Mois</option>
                            <option value="Année(s)">Année(s)</option>
                        </select>
                    <br>
                    <br>
                    <label>Détails <input type="text" name="nom_si" /></textarea></label>
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
                    <!---------------------- Compétences mises en oeuvre -------------------------->
                    <div class="encadre">
                        <B>Compétences mises en oeuvre </B>
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

                                        <table>
                                            <tr>
                                    
                                                <input type="checkbox" id="competence_ajout" name="ajout" value="<?php echo $bloc_data['nom'] ?>"><label for="competence_ajout"><?php echo $bloc_data['id_bloc']?>.<?php echo $activite_data['id_activite'] ?>.<?php echo $competence_data['id_competence']?>-<?php echo $competence_data['nom'] ?>
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
                    
                        <input class="button" type="submit" style="vertical-align:middle">
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>