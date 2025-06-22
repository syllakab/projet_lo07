<?php

require_once 'Model.php';

class ModelEtudiant
{
    private $id , $label , $nom , $prenom , $creneau;
    
    public function __construct($id=NULL, $label=NULL, $nom=NULL, $prenom=NULL, $creneau=NULL)
    {
        if(!is_null($id))
        {
           $this->id = $id;
           $this->label = $label;
           $this->nom = $nom;
           $this->prenom = $prenom;
           $this->creneau = $creneau; 
        } 
    }
    
    public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getCreneau() {
        return $this->creneau;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setCreneau($creneau) {
        $this->creneau = $creneau;
    }
    
    
    public static function getAllRDV($id)
    {
      try
        {
            $database = Modele::getInstance();
            $query = "select rdv_id as id, projet_label as label, examinateur_nom as nom , examinateur_prenom as prenom , creneau from infordv where etudiant_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id'=>$id]);
            $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelEtudiant");
            return $resultat; 
        }
        catch (PDOException $ex) 
        {
          printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
        
    }
    
    public static function getAllprojet($id) // Tous les projets où l'étudiant n'a pas de RDV
    {
        try
        {
           $database = Modele::getInstance();
           $query = "select label from projet where label not in (select projet_label from infordv where etudiant_id = :id)";
           $statement = $database->prepare($query);
           $statement->execute(['id'=>$id]);
           $resultat = $statement->fetchAll(PDO::FETCH_COLUMN,0);
           return $resultat;
        }
        catch (PDOException $ex) 
        {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function getCreneauDisponible($label)
    {
        try
        {
           $database = Modele::getInstance();
           $query = "select creneau_id as id, creneau , nom , prenom from infocreneaux where infocreneaux.label = :label";
           $statement = $database->prepare($query);
           $statement->execute(['label'=>$label]);
           $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelEtudiant");
           return $resultat;
        }
        catch (PDOException $ex) 
        {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function SetOneRDV($id,$creneau)
    {
        try
       {
            $database = Modele::getInstance();
            $requete1 = "select max(id) from rdv";
            $state1 = $database->prepare($requete1);
            $state1->execute();
            $resultat1 = $state1->fetch();
            $max_id = $resultat1['0'];
            $max_id++;
            
            $requete2 = "select id from creneau where creneau = :creneau";
            $state2 = $database->prepare($requete2);
            $state2->execute(['creneau'=>$creneau]);
            $resultat2 = $state2->fetch();
            $id_creneau = $resultat2['0'];

            $query = "insert into rdv values (:id,:creneau,:etudiant)";
            $statement = $database->prepare($query);
            $statement->execute([
                "id" => $max_id,
                "creneau" => $id_creneau,
                "etudiant" => $id]);
            $validation = 1;
            return $validation;
        } 
       catch (PDOException $ex)
       {
           printf("%s--%s \n",$ex->getCode(),$ex->getMessage());     
       }
       
    }
    
    public static function getNombreEtudiantGroup($label)
    {
        try
        {
           $database = Modele::getInstance();
           $query = "select groupe from projet where label = :label";
           $statement = $database->prepare($query);
           $statement->execute(['label'=>$label]);
           $resultat = $statement->fetch();
           $groupe = $resultat['0'];
           return $groupe;
        }
        catch (PDOException $ex) 
        {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
        
    }
    
    public static function getNombreOneCreneauTake($creneau,$label)
    {
        try
        {
           $database = Modele::getInstance();
           $query = "select count(*) from infordv where creneau = :creneau and projet_label = :label";
           $statement = $database->prepare($query);
           $statement->execute(['creneau'=>$creneau ,'label'=>$label]);
           $resultat = $statement->fetch();
           $nbrefois = $resultat['0'];
           return $nbrefois;
        }
        catch (PDOException $ex) 
        {
           printf("%s--%s",$ex->getCode(),$ex->getMessage());
        }
    }

}
