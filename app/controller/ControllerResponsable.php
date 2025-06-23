<?php
require_once '../model/ModelResponsable.php';

class ControllerResponsable
{
    public static function ResponsableReadProject() 
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelResponsable::getAllProject($id);
        include 'configuration.php';
        $vue = $chemin .'app/view/Responsable/viewAllProject.php';
        require($vue);   
    }
    
    public static function ResponsableReadExaminateur()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $button_retour = 0;
        
        $resultats = ModelResponsable::getAllExaminateur();
        include 'configuration.php';
        $vue = $chemin .'app/view/Responsable/viewAllExaminateur.php';
        require($vue); 
    }
    
    public static function ResponsableAjoutProject()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        include 'configuration.php';
        $vue = $chemin .'app/view/Responsable/viewAjoutProject.php';
        require($vue); 
    }
    
    public static function ResponsableConfirmAjoutProject()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $label = htmlspecialchars($_GET['label']);
        $nombre = $_GET['nombre'];
        
        if(!empty($label) && !empty($nombre))
        { 
           $label = mb_strtoupper($label, 'UTF-8');
           $projects = ModelResponsable::getAllLabel();
           $existe = 0;
           foreach ($projects as $element)
           {
               if($element === $label)
               {
                   $existe = 1;
               }
           }
           
           
           if($existe === 1)
           {
               $validation = 0;
               include 'configuration.php';
               $vue = $chemin .'app/view/Responsable/viewConfirmAjoutProject.php';
               require($vue); 
           }
           else
           {
               $validation = ModelResponsable::SetOneProjet($label,$id,$nombre);
               include 'configuration.php';
               $vue = $chemin .'app/view/Responsable/viewConfirmAjoutProject.php';
               require($vue);
           }   
        }
        else
        {
            include 'configuration.php';
            $vue = $chemin .'app/view/Responsable/viewAjoutProject.php';
            require($vue); 
        }   
    }
    
    public static function ResponsableFormPlanning()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelResponsable::getAllProject($id);
        include 'configuration.php';
        $vue = $chemin . 'app/view/Responsable/viewFormListProjet.php';
        require($vue);
    }
    
    public static function ResponsablePlanningProjet()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $label = htmlspecialchars($_GET['label'] ?? '');
             
        if(!empty($label))
        {
            $resultats = ModelResponsable::getPlanningProjet($label);
            include 'configuration.php';
            $vue = $chemin . 'app/view/Responsable/viewPlanningProjet.php';
            require($vue);
        }
        else
        {
            $resultats = ModelResponsable::getAllProject($id);
            include 'configuration.php';
            $vue = $chemin . 'app/view/Responsable/viewFormListProjet.php';
            require($vue);
        }
        
    }
    
    public static function ResponsableFormProjetExaminateur()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelResponsable::getAllProject($id);
        include 'configuration.php';
        $vue = $chemin . 'app/view/Responsable/viewFormProjetExaminateur.php';
        require($vue);
    }
    
    public static function ResponsableProjetExaminateur()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $label = $_GET['label'] ?? '';
        
        
        if(!empty($label))
        {
            $button_retour = 1;
            $resultats = ModelResponsable::getProjetExaminateur($label);
            include 'configuration.php';
            $vue = $chemin . 'app/view/Responsable/viewAllExaminateur.php';
            require($vue);
        }
        else 
        {
            $resultats = ModelResponsable::getAllProject($id);
            include 'configuration.php';
            $vue = $chemin . 'app/view/Responsable/viewFormProjetExaminateur.php';
            require($vue);
        }
    }
    
}
