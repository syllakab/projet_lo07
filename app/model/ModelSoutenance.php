<?php
// C'est le model qui est dédié à la connexion et à l'inscription
require_once 'Model.php';
class ModelSoutenance
{
    private $id, $nom , $prenom , $role_etudiant, $role_responsable , $role_examinateur, $login , $password;
    
    
    public function __construct($id=NULL, $nom=NULL, $prenom=NULL, $role_etudiant=NULL, $role_responsable=NULL, $role_examinateur=NULL, $login=NULL, $password=NULL) {
        if(!is_null($id))
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->role_etudiant = $role_etudiant;
            $this->role_responsable = $role_responsable;
            $this->role_examinateur = $role_examinateur;
            $this->login = $login;
            $this->password = $password;
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

    public function getRole_etudiant() {
        return $this->role_etudiant;
    }

    public function getRole_responsable() {
        return $this->role_responsable;
    }

    public function getRole_examinateur() {
        return $this->role_examinateur;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setRole_etudiant($role_etudiant) {
        $this->role_etudiant = $role_etudiant;
    }

    public function setRole_responsable($role_responsable) {
        $this->role_responsable = $role_responsable;
    }

    public function setRole_examinateur($role_examinateur) {
        $this->role_examinateur = $role_examinateur;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

     
    /* Ici nous récuperons tous les utilisateurs avec toutes les informations possibles pour faciliter
      l'authentification lors de la connexion à la connexion*/
    public static function getAllPersonne() 
    {
        try
        {
            $database = Modele::getInstance();
            $query = "select * from personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $resultats = $statement->fetchAll(PDO::FETCH_CLASS,"ModelSoutenance");
            return $resultats;
        } 
        catch (PDOException $ex)
        {
          printf("%s--%s\n",$ex->getCode(),$ex->getMessage());
        }
    }
    
    /* Nous allons insérer dans la table personne les informations d'un nouvel utilisateur passées en paramètre */
    public static function SetOnePersonne($nom,$prenom,$responsable,$examinateur,$etudiant,$login,$password)
    {
        try
        {
            $database = Modele::getInstance();
            $max_id = "select max(id) from personne";
            $state = $database->prepare($max_id);
            $state->execute();
            $resultats = $state->fetch();
            $id = $resultats['0'];
            $id++;
            
            $query = "insert into personne values (:id,:nom,:prenom,:role_responsable,:role_examinateur,:role_etudiant,:login,:password)";
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
            $validation = 1;
        } 
        catch (PDOException $ex) 
        {
           // printf("%s--%s\n",$ex->getCode(),$ex->getMessage());
            $validation = 0;
        }
        return $validation;
    }

}

