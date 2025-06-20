<?php
require_once '../model/ModelEtudiant.php';
class ControllerEtudiant
{
    public static function EtudiantListRDV()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $resultats = ModelEtudiant::getAllRDV($id);
        
        include 'configuration.php';
        $vue = $chemin .'app/view/Etudiant/viewAllrdv.php';
        require($vue);
    }
    
    public static function EtudiantFormRDV()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelEtudiant::getAllprojet($id);      
        include 'configuration.php';
        $vue = $chemin .'app/view/Etudiant/viewFormrdvProjet.php';
        require($vue);
    }
    
    public static function EtudiantFormCreneauDisponible()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $label = $_GET['label'] ?? '';
             
        if(!empty($label))
        {
            $_SESSION['label'] = $label;
            $resultats = ModelEtudiant::getCreneauDisponible($label);
            if (!empty($resultats))
            {
                include 'configuration.php';
                $vue = $chemin . 'app/view/Etudiant/viewFormrdvCreneau.php';
                require($vue);
            }
            else
            {
                include 'configuration.php';
                $vue = $chemin . 'app/view/Etudiant/viewNoCreneau.php';
                require($vue);
            }
            
        }
        else
        {
            $resultats = ModelEtudiant::getAllprojet($id);      
            include 'configuration.php';
            $vue = $chemin .'app/view/Etudiant/viewFormrdvProjet.php';
            require($vue);
        }
        
    }
    
    public static function EtudiantConfirmRDV()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $label = $_SESSION['label'];
        $creneau = $_GET["date"] ?? '';
        
        if(!empty($creneau))
        {
           $groupe = ModelEtudiant::getNombreEtudiantGroup($label);
           $nbrefois = ModelEtudiant::getNombreOneCreneauTake($creneau);
           if($nbrefois > $groupe)
           {
               include 'configuration.php';
               $vue = $chemin .'app/view/Etudiant/viewMaxEtudiantGroup.php';
               require($vue);
           }
           else
           {
               $validation = ModelEtudiant::SetOneRDV($id,$creneau);
               include 'configuration.php';
               $vue = $chemin .'app/view/Etudiant/viewConfirmrdv.php';
               require($vue);
           }
    
        }
        else
        {
             $resultats = ModelEtudiant::getCreneauDisponible($label);
             include 'configuration.php';
             $vue = $chemin . 'app/view/Etudiant/viewFormrdvCreneau.php';
             require($vue);
        }
       
    }
}


?>

