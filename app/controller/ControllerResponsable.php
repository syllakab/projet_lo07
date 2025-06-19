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
        $vue = $chemin .'app/view/Responsable/viewMyProject.php';
        require($vue);   
    }
    
    public static function ResponsableReadExaminateur()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelResponsable::getAllExaminateur();
        include 'configuration.php';
        $vue = $chemin .'app/view/Responsable/viewExaminateur.php';
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
        
        $projects = ModelResponsable::getAllLabel();
        $label = htmlspecialchars($_GET['label']);
        $nombre = $_GET['nombre'];
        
        if(!empty($label) && !empty($nombre))
        { 
           $validation = 1;
           foreach ($projects as $element)
           {
               if($element === $label)
               {
                   $validation = 0;
               }
           }
           
           if($validation === 1)
           {
               ModelResponsable::SetOneProjet($label,$id,$nombre);
               include 'configuration.php';
               $vue = $chemin .'app/view/Responsable/viewConfirmAjoutProject.php';
               require($vue);
           }
           else
           {                          
               include 'configuration.php';
               $vue = $chemin .'app/view/Responsable/viewConfirmAjoutProject.php';
               require($vue); 
           }
           
        }
        else
        {
            $validation = 2;
            include 'configuration.php';
            $vue = $chemin .'app/view/Responsable/viewConfirmAjoutProject.php';
            require($vue);
        }   
    }
    
}
