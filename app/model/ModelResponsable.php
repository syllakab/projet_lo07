<?php
require_once 'Model.php';

class ModelResponsable 
{
    private $id, $nom , $prenom , $label , $groupe , $etudiants , $creneau ;
    
    public function __construct($id=NULL,$nom=NULL, $prenom=NULL, $label=NULL, $groupe=NULL,$etudiants=NULL,$creneau=NULL)
    {
        if(!is_null($id))
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->label = $label;
            $this->groupe = $groupe;
            $this->etudiants = $etudiants;
            $this->creneau = $creneau;
        }
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
        $this->groupe = $groupe;
    }

    public function getCreneau() {
        return $this->creneau;
    }

    public function setCreneau($creneau){
        $this->creneau = $creneau;
    }
    
    public function getEtudiants() {
        return $this->etudiants;
    }

    public function setEtudiants($etudiants){
        $this->etudiants = $etudiants;
    }

        
      
    public static function getAllProject($id)
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select personne.id, nom,prenom,label,groupe from personne inner join projet on personne.id = responsable where responsable = :id";
            $statement = $database->prepare($query);
            $statement->execute(["id"=>$id]);
            $resultat = $statement->fetchAll(PDO::FETCH_CLASS,"ModelResponsable");
            return $resultat;
        } 
        catch (Exception $ex)
        {
            printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function getAllExaminateur() 
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select nom , prenom from personne where role_examinateur = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }
        catch (PDOException $ex) 
        {
            printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function getAllLabel()
    {
        try
        {
            $database = Modele::getInstance();
            $requete = "select label from projet";
            $state = $database->prepare($requete);
            $state->execute();
            $resultat = $state->fetchAll(PDO::FETCH_COLUMN,0);
            return $resultat;
        }
        
        catch (PDOException $ex)
        {
             printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        }
    }
    
    public static function SetOneProjet($label,$id,$nombre) 
    {
       try
       {
            $database = Modele::getInstance();
            $requete = "select max(id) from projet";
            $state = $database->prepare($requete);
            $state->execute();
            $resultat = $state->fetch();
            $max_id = $resultat['0'];
            $max_id++;

            $query = "insert into projet values (:id,:label,:responsable,:groupe)";
            $statement = $database->prepare($query);
            $statement->execute([
                "id" => $max_id,
                "label" => $label,
                "responsable" => $id,
                "groupe" => $nombre]);
         $validation = 1;   
        } 
       catch (PDOException $ex)
       {
           printf("%s--%s \n",$ex->getCode(),$ex->getMessage());     
       }
       return $validation;
    }
    
    public static function SetOneExaminateur($nom,$prenom,$responsable,$examinateur,$etudiant,$login,$password)
    {
        try
        {
            $database = Modele::getInstance();
            $requete = "select max(id) from personne";
            $state = $database->prepare($requete);
            $state->execute();
            $resultat = $state->fetch();
            $id = $resultat['0'];
            $id++;
            
            $query = "insert into personne values(:id,:nom,:prenom,:role_responsable,:role_examinateur,:role_etudiant,:login,:password)";
            $statement = $database->prepare($query);
            $statement->execute([
                "id"=>$id,
                "nom"=>$nom,
                "prenom"=>$prenom,
                "role_responsable"=>$responsable,
                "role_examinateur"=>$examinateur,
                "role_etudiant"=>$etudiant,
                "login"=>$login,
                "password"=>$password
            ]);
        } 
        catch (PDOException $ex)
        {
           printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        }
    }
    
    
    public static function getPlanningProjet($label)
    {
       try
        {
            $database = Modele::getInstance();
            $requete = "select projet_label as label,examinateur_nom as nom,examinateur_prenom as prenom,creneau, GROUP_CONCAT(etudiant_nom,etudiant_prenom SEPARATOR',') as etudiants from infordv where projet_label = :label group by projet_label , examinateur_nom , examinateur_prenom , creneau ";
            $state = $database->prepare($requete);
            $state->execute(['label'=>$label]);
            $resultat = $state->fetchAll(PDO::FETCH_CLASS,"ModelResponsable");
            return $resultat;
        }
        
        catch (PDOException $ex)
        {
             printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        } 
    }
    
    public static function getProjetExaminateur($label) 
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select distinct nom,prenom from infocreneaux where label = :label ";
            $statement = $database->prepare($query);
            $statement->execute(['label'=>$label]);
            $resultat = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultat;
        }
        catch (PDOException $ex) 
        {
            printf("%s--%s \n",$ex->getCode(),$ex->getMessage());
        }
    }
    
}
