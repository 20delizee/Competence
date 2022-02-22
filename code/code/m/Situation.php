<?php
class Situation {

    private $_bdd;
    private $_id;
    private $_nom;
    private $_date_debut;
    private $_details;
    private $_date_creation;

    public function getBdd(){ return $this->$_bdd; }
    public function getId(){ return $this->$_id; }
    public function getNom(){ return $this->$_nom; }
    public function getDateDebut(){ return $this->$_date_debut; }
    public function getDetails(){ return $this->$_details; }
    public function getDateCreation(){ return $this->$_date_creation; }

    public function __construct(){
        
    }

    public function nom(){
        // TODO implement here
    }

    public function date_debut()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function details()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function date_creation()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function duree()
    {
        // TODO implement here
    }

    /**
     * 
     */
    public function type_duree()
    {
        // TODO implement here
    }

}
