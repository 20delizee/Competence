<?php
class Manager{

    public function ConnexionBDD(){
        $_bdd = new PDO('mysql:host=localhost;dbname=competence;charset=utf8', 'root', 'root');
        return $_bdd;
    }

    // ---
    // Autres
    // ---

    public function DelSituation($bdd, $id){
        $q = $bdd->prepare('DELETE FROM situation WHERE id = :id');
        $q->bindValue(':id', $id);
        $q->execute();
    }

    // ---
    // Creation des tableaux
    // On utilise ses méthodes lors de la création d'un nouvel utilisateur, d'une nouvelle compétence / situation...
    // Pour les utiliser il faut mettre deux paramètres, $bdd : au début de la page ajoutez (1 seule fois par page):
    // ConnexionBDD();
    // $bdd = getBDD();
    // 2e paramètre c'est $data, crééez une variable aray ou vous mettez toutes les infos du nouvel objet genre :
    // $variable = ['icilenom', 'icileprenom', ...]
    // ---

    public function setActivite($bdd, Activite $data){
        $q = $bdd->prepare('INSERT INTO activite(id_activite, nom, id_bloc) VALUES (:ida, :nom, :idb');
        $q->bindValue(':ida', $data[0]);
        $q->bindValue(':nom', $data[1]);
        $q->bindValue(':idb', $data[2]);
        $q->execute();
    }

    public function setBloc($bdd, Bloc $data){
        $q = $bdd->prepare('INSERT INTO bloc(id_bloc, nom) VALUES (:idb, :nom)');
        $q->bindValue(':idb', $data[0]);
        $q->bindValue(':nom', $data[1]);
        $q->execute();
    }

    public function setCompetences($bdd, Competences $data){
        $q = $bdd->prepare('INSERT INTO competences(detail, id_activite, id_competence, nom) VALUES (:det, :ida, :idc, :nom');
        $q->bindValue(':det', $data[0]);
        $q->bindValue(':ida', $data[1]);
        $q->bindValue(':idc', $data[2]);
        $q->bindValue(':nom', $data[3]);
        $q->execute();
    }

    public function setContexte($bdd, Contexte $data){
        $q = $bdd->prepare('INSERT INTO contexte(contexte, id_contexte) VALUES (:con, :idc)');
        $q->bindValue(':con', $data[0]);
        $q->bindValue(':idc', $data[1]);
        $q->execute();
    }

    public function setLiens($bdd, Liens $data){
        $q = $bdd->prepare('INSERT INTO Liens(URl, details, id_liens) VALUES (:url, :det, :id');
        $q->bindValue(':url', $data[0]);
        $q->bindValue(':det', $data[1]);
        $q->bindValue(':id', $data[2]);
        $q->execute();
    }

    public function setOptions($bdd, Options $data){
        $q = $bdd->prepare('INSERT INTO Options(options, id_options) VALUES (:opt, ido');
        $q->bindValue(':opt', $data[0]);
        $q->bindValue(':ido', $data[1]);
        $q->execute();
    }

    public function setSituation($bdd, Situation $data){
        $q = $bdd->prepare('INSERT INTO Situation(date_creation, date_debut, details, duree, id, id_contexte, id_liens, nom, type_duree) VALUES (:dc, :db, :det, :dur, :id, :idc, :idl, :nom, :tyd)');
        $q->bindValue(':dc', $data[0]);
        $q->bindValue(':db', $data[1]);
        $q->bindValue(':det', $data[2]);
        $q->bindValue(':dur', $data[3]);
        $q->bindValue(':id', $data[4]);
        $q->bindValue(':idc', $data[5]);
        $q->bindValue(':idl', $data[6]);
        $q->bindValue(':nom', $data[7]);
        $q->bindValue(':tyd', $data[8]);
        $q->execute();
    }

    public function setTdc($bdd, Type_de_compte $data){
        $q = $bdd->prepare('INSERT INTO Type_de_compte(contexte, id_type_compte) VALUES (:con, :id');
        $q->bindValue(':con', $data[0]);
        $q->bindValue(':id', $data[1]);
        $q->execute();
    }

    public function setUtilisateur($bdd, Utilisateur $data){
        $q = $bdd->prepare('INSERT INTO Utilisateur(nom, prenom, mdp, type_de_compte, options, id_type_compte) VALUES (:nom, :pre, :mdp, :tdc, :opt, :itc)');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':pre', $data[1]);
        $q->bindValue(':mdp', $data[2]);
        $q->bindValue(':tdc', $data[3]);
        $q->bindValue(':opt', $data[4]);
        $q->bindValue(':itc', $data[5]);
        $q->execute();
    }

    // ---
    // Getters tableaux
    // On l'utilise pour obtenir et utiliser les données d'une table.
    // Pour les utiliser il faut mettre deux paramètres, $bdd : au début de la page ajoutez (1 seule fois par page):
    // ConnexionBDD();
    // $bdd = getBDD();
    // En deuxième $id, c'est le nom de la table.
    // En troisième $select, ce que vous voulez séléctionnez dans la table choisi. (Vous pouvez mettre * pour tout select)
    // ---

    public function getSituation($bdd, $query){
        $q = $bdd->query($query);
        return $q;
    }

    // ---
    // Update des tableaux
    // On utilise ses méthodes lorsqu'il faut changer les variables déja existante de la bdd.
    // Pour les utiliser il faut mettre deux paramètres, $bdd : au début de la page ajoutez (1 seule fois par page):
    // ConnexionBDD();
    // $bdd = getBDD();
    // 2e paramètre c'est $data, crééez une variable aray ou vous mettez toutes les infos modifiés:
    // $variable = ['icilenom', 'icileprenom', ...]
    // ---

    public function upActivite($bdd, $data){
        $q = $bdd->prepare('UPDATE Activite SET nom = :nom, id_bloc = :id_bloc WHERE id_activite = :id');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':id_bloc', $data[1]);
        $q->bindValue(':id', $data[2]);
        $q->execute();
    }

    public function upBloc($bdd, $data){
        $q = $bdd->prepare('UPDATE Bloc SET nom = :nom WHERE id_bloc = :id');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':id', $data[1]);
        $q->execute();
    }

    public function upCompetences($bdd, $data){
        $q = $bdd->prepare('UPDATE Competences SET nom = :nom, detail = :detail, id_activite = :ida WHERE id_competence = :id');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':detail', $data[1]);
        $q->bindValue(':ida', $data[2]);
        $q->bindValue(':id', $data[3]);
        $q->execute();
    }

    public function upContexte($bdd, $data){
        $q = $bdd->prepare('UPDATE Competences SET contexte = :contexte WHERE id_contexte = :id');
        $q->bindValue(':contexte', $data[0]);
        $q->bindValue(':id', $data[1]);
        $q->execute();
    }

    public function upLiens($bdd, $data){
        $q = $bdd->prepare('UPDATE Liens SET URl = :url, details = :details WHERE id_liens = :id');
        $q->bindValue(':url', $data[0]);
        $q->bindValue(':details', $data[1]);
        $q->bindValue(':id', $data[2]);
        $q->execute();
    }

    public function upOptions($bdd, $data){
        $q = $bdd->prepare('UPDATE Options SET options = :opt WHERE id_options = :id');
        $q->bindValue(':opt', $data[0]);
        $q->bindValue(':id', $data[1]);
        $q->execute();
    }

    public function upSituation($bdd, $data){
        $q = $bdd->prepare('UPDATE Situation SET nom = :nom, date_debut = :dd, details = :details, date_creation = :dc, duree = :duree, type_duree = :td, id_liens = :idl, id_contexte = :idc WHERE id = :id');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':dd', $data[1]);
        $q->bindValue(':details', $data[2]);
        $q->bindValue(':dc', $data[3]);
        $q->bindValue(':duree', $data[4]);
        $q->bindValue(':td', $data[5]);
        $q->bindValue(':idl', $data[6]);
        $q->bindValue(':idc', $data[7]);
        $q->bindValue(':id', $data[8]);
        $q->execute();
    }

    public function upTdc($bdd, $data){
        $q = $bdd->prepare('UPDATE Type_de_compte SET contexte = :contexte WHERE id_type_compte = :id');
        $q->bindValue(':contexte', $data[0]);
        $q->bindValue(':id', $data[1]);
        $q->execute();
    }

    public function upUtilisateur($bdd, $data){
        $q = $bdd->prepare('UPDATE Utilisateur SET nom = :nom, prenom = :prenom, mdp = :mdp, type_de_compte = :tdc, options = :options, id_type_compte = :idtc WHERE id_type_compte = :id');
        $q->bindValue(':nom', $data[0]);
        $q->bindValue(':prenom', $data[1]);
        $q->bindValue(':mdp', $data[2]);
        $q->bindValue(':tdc', $data[3]);
        $q->bindValue(':options', $data[4]);
        $q->bindValue(':idtc', $data[5]);
        $q->bindValue(':id', $data[6]);
        $q->execute();
    }

    // ---
    // Setters des associations
    // ---


}
