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
require_once('head.html')
?>
<body>
        <h1>Competences</h1>
        <div class="Box">
            <div class="gauche">
                <div class="insidebox">
                    <?php
                    require_once('menuG.php');
                    ?>
                </div>
            </div>
            <div class="droite">
                <div class="insidebox">
                    <!------------------ Description de la situation professionnelle --------------------->
                    <div class="encadre">
                        <B>Description de la situation professionnelle </B>
                    </div>

                        <form id="frm" method="post" >
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
                                }
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
                            
                            
                            <label for="contexte-select">Contexte : </label>
                                <select name="contexte" id="contexte-select">
                                    <option value="">--</option>
                                    <option value="A">Atelier</option>
                                    <option value="S">Stage</option>
                                    <option value="S2">Stage 2</option>
                                </select>

                                

                            <br>
                            <br>
                            <!--------------------- Accès aux éléments justificatifs ---------------------------->
                                           
                        <div class="encadre">
                            <B>Accès aux éléments justificatifs </B>
                        </div>    
                            <div id="cadre" style="padding: 1%;">
                            <label>URI <input type="text" name="URI" /></label>
                            <label>Détails <input type="text" name="details" /></label>
                            </div>
                            <div id="bou">
                            <input id="plus" type="button" value="+"/>
                            </div>
                            <div class="valider">
                        <input class="button" type="submit" style="vertical-align:middle" name="valider">
                    </div>
                        </form>
                </div>
            </div>
        </div>   
<script>
    addEventListener("load",()=>{
	const d=document.getElementById("cadre");
	document.getElementById("plus").addEventListener("click",(e)=>{
		if(document.querySelectorAll('[name="URI"]').length <20){
			const bis=d.cloneNode(true);
			bis.removeAttribute("id");
			const t=bis.querySelectorAll(["label > input"]);
			for(let i=0;i<t.length;i++){
				t[i].value=""
			}
 
			const b=e.target.cloneNode();
			b.value= " - ";
			b.title="supprimer ce champ";
			bis.appendChild(b);
 
			b.addEventListener("click",(e)=>{
				document.getElementById("frm").removeChild(e.target.parentElement);
				e.preventDefault()
			},false);
			document.getElementById("frm").insertBefore(bis,document.getElementById("bou"));
		}
 	},false);
},false);
</script>         
</body>
</html>