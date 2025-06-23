<?php
require '../model/ModelSoutenance.php';
class ControllerSoutenance
{

    public static function SoutenanceAccueil()
    {
        include 'configuration.php';
        $vue = $chemin .'app/view/connexion/viewAccueil.php';
        require($vue);
    }
    
    public static function SoutenanceAccueilPersonne()
    {
        $login = htmlspecialchars($_GET['login']);
        $password = htmlspecialchars($_GET['password']);   
        if(!empty($login) && !empty($password))
        {
            session_start();
            $resultats = ModelSoutenance::getAllPersonne();
            $existe = 0;
            foreach ($resultats as $element)
            {
                 if(($element->getLogin()=== $login) && ($element->getPassword()=== $password))
                 {
                     $id = $element->getID();
                     $nom = $element->getNom();
                     $prenom = $element->getPrenom();
                     $responsable = $element->getRole_responsable();
                     $examinateur = $element->getRole_examinateur();
                     $etudiant = $element->getRole_etudiant();
                     $existe = 1;
                     $_SESSION['id'] = $id;
                     $_SESSION['nom'] = $nom;
                     $_SESSION['prenom'] = $prenom;
                     $_SESSION['responsable']= $responsable;
                     $_SESSION['examinateur']= $examinateur;
                     $_SESSION['etudiant']= $etudiant;
                 }   
            }
        
            if($existe === 1)
            {
                include 'configuration.php';
                $vue = $chemin . 'app/view/connexion/viewAccueilPersonne.php';
                require($vue);       
            }
            else
            {
                include 'configuration.php';
                $vue = $chemin . 'app/view/connexion/viewNologin.php';
                require($vue);
            } 
        }
        else
        {
            include 'configuration.php';
            $vue = $chemin .'app/view/connexion/viewLogin.php';
            require($vue);      
        }    
    }
    
    public static function SoutenanceLogin()
    {
        include 'configuration.php';
        $vue = $chemin .'app/view/connexion/viewLogin.php';
        require($vue);
    }
    
    public static function SoutenanceInscrire()
    {
        include 'configuration.php';
        $vue = $chemin .'app/view/connexion/viewInscrire.php';
        require($vue);
    }
    
    public static function SoutenanceConfirmInscrire() 
    {
        $nom = htmlspecialchars($_GET['nom']);
        $prenom = htmlspecialchars($_GET['prenom']);
        $role = htmlspecialchars($_GET['role'] ?? '');
        $login = htmlspecialchars($_GET['login']);
        $password = htmlspecialchars($_GET['password']);
   
        if(!empty($nom) && !empty($prenom) && !empty($role) && !empty($login) && !empty($password))
        {   
            switch ($role)
            {
                case "Responsable" :
                    $etudiant = "0";
                    $examinateur = "1";
                    $responsable = "1";
                    break;
                case "Examinateur" :
                    $etudiant = "0";
                    $examinateur = "1";
                    $responsable = "0";
                    break;
                default :
                    $etudiant = "1";
                    $examinateur = "0";
                    $responsable = "0";
                    break;          
            }
            $nom = mb_strtoupper($nom, 'UTF-8');
            $prenom = mb_strtolower($prenom);
            $validation = ModelSoutenance::SetOnePersonne($nom, $prenom,$responsable,$examinateur,$etudiant, $login, $password);
            include 'configuration.php';
            $vue = $chemin . '/app/view/connexion/viewConfirmInscrire.php';
            require($vue);
        }
        else
        {
            $validation = 2;
            include 'configuration.php';
              $vue = $chemin . '/app/view/connexion/viewConfirmInscrire.php';
            require($vue);
        }
    }
    
    public static function SoutenanceDeconnexion() 
    {
        session_start();
        session_destroy();
        header('Location: app/router/routerSoutenance.php?action=acceuil');
        exit();
    }
}

?>

