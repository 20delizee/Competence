<?php
require('../assets/includes/bootstrap.php');
$auth = App::getAuth();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    exit('Erreur : '.$e->getMessage());
}


?>


<?php
if(isset($_POST['validermodif'])){

    if(isset($_POST['modifier'])){
        $q = $bdd->query('SELECT * FROM situation');
        while ($data = $q->fetch()){
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $date_debut = $_POST['date_debut'];
        $details = $_POST['details'];
        $date_creation = $_POST['date_creation'];
        }}
?>
<?php
    if (isset($_POST['validermodif'])){
        $q = $bdd->prepare('UPDATE `situation` SET `id`=:id `nom`=:nom,`date_debut`=:date_debut,`details`=:details,`date_creation`=:date_creation,`duree`=:duree,`type_duree`=:type_duree  WHERE 1');
        $q-> execute(array(

            $nom = $_POST['nom'],
            $date_debut = $_POST['date_debut'],
            $details = $_POST['details'],

        
        
    ));
}  
}
?>

<link rel="stylesheet" type="text/css" href="../style.css">	
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
<form method="post" action="upsituation.php">

Nom : <input type="text" placeholder="<?php echo $nom;   ?>" name="nom" />                   
                
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

            
            
            <div class="valider">
                <input class="button" type="submit" style="vertical-align:middle" name="validermodif">
            </div>
           
            
</form>

            </div>
        </div>
    </div>
</div>
</div>