<?php

require_once 'Model.php';

class ModelExaminateur
{
    private $id , $nom , $prenom , $label , $groupe , $creneau;
    
    public function __construct($id=NULL, $nom=NULL, $prenom=NULL, $label=NULL, $groupe=NULL , $creneau=NULL) {
        if(!is_null($id))
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->label = $label;
            $this->groupe = $groupe;
            $this->creneau = $creneau;
        }
    }
   
    public function getCreneau() {
        return $this->creneau;
    }

    public function setCreneau($creneau) {
        $this->creneau = $creneau;
    }

        public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getGroupe() {
        return $this->groupe;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setLabel($label){
        $this->label = $label;
    }

    public function setGroupe($groupe){
        $this->taille = $groupe;
    }

    public static function getAllprojetID($id) 
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select distinct projet_id as id , label, nom , prenom , groupe from infocreneaux where examinateur_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id'=>$id]);
            $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelExaminateur");
            return $resultat;
        } 
        catch (PDOException $ex) {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
        
    }
    
    public static function getAllcreneau($id)
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select label , creneau from infocreneaux where examinateur_id =:id";
            $statement = $database->prepare($query);
            $statement->execute(['id'=>$id]);
            $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelExaminateur");
            return $resultat;
        } 
        catch (PDOException $ex)
        {
          printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function getProjetCreneau($id,$label)
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select label , creneau from infocreneaux where label=:label and examinateur_id =:id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id'=>$id,
                'label'=>$label ]);
            
            $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelExaminateur");
            return $resultat;
        } 
        catch (PDOException $ex)
        {
          printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function getAllprojet() 
    {
        try
        {
           $database = Modele::getInstance();
           $query = "select label from projet";
           $statement = $database->prepare($query);
           $statement->execute();
           $resultat = $statement->fetchAll(PDO::FETCH_COLUMN,0);
           return $resultat;
        }
        catch (PDOException $ex) 
        {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function SetOneCreneau($id,$label,$creneau)
    {
        try
       {
            $database = Modele::getInstance();
            $requete1 = "select max(id) from creneau";
            $state1 = $database->prepare($requete1);
            $state1->execute();
            $resultat1 = $state1->fetch();
            $max_id = $resultat1['0'];
            $max_id++;
            
            $requete2 = "select id from projet where label = :label";
            $state2 = $database->prepare($requete2);
            $state2->execute(['label'=>$label]);
            $resultat2 = $state2->fetch();
            $id_projet = $resultat2['0'];

            $query = "insert into creneau values (:id,:projet,:examinateur,:creneau)";
            $statement = $database->prepare($query);
            $statement->execute([
                "id" => $max_id,
                "projet" => $id_projet,
                "examinateur" => $id,
                "creneau"=>$creneau]);
            $validation = 1;
            return $validation;
        } 
       catch (PDOException $ex)
       {
           printf("%s--%s \n",$ex->getCode(),$ex->getMessage());     
       }
    }

}
