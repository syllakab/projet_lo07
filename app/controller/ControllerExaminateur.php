<?php
require_once '../model/ModelExaminateur.php';
class ControllerExaminateur
{
    public static function ExaminateurReadProject()
     {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $resultats = ModelExaminateur::getAllprojetID($id);
        
        include 'configuration.php';
        $vue = $chemin .'app/view/Examinateur/viewMyProject.php';
        require($vue);
    }
    
    public static function ExaminateurReadCreneau() 
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelExaminateur::getAllcreneau($id);
        $button_retour = 0;
        include 'configuration.php';
        $vue = $chemin .'app/view/Examinateur/viewCreneau.php';
        require($vue);
    }
    
    public static function ExaminateurFormProjectCreneau()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];  
        $resultats = ModelExaminateur::getAllprojetID($id);
        include 'configuration.php';
        $vue = $chemin .'app/view/Examinateur/viewFormCreneauProject.php';
        require($vue);   
    }
    
     public static function ExaminateurReadProjectCreneau()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $label = $_GET['label'] ?? '';
        
        if(isset($label) && empty($label))
        {
            $resultats = ModelExaminateur::getAllprojetID($id);
            include 'configuration.php';
            $vue = $chemin .'app/view/Examinateur/viewFormCreneauProject.php';
            require($vue);
             
        }
        else
        {
             $resultats = ModelExaminateur::getProjetCreneau($id, $label);
             $button_retour = 1;
             include 'configuration.php';
             $vue = $chemin .'app/view/Examinateur/viewCreneau.php';
             require($vue);  
        }
    }
    
    
    public static function ExaminateurFormAjoutCreneau()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $resultats = ModelExaminateur::getAllprojet();      
        include 'configuration.php';
        $vue = $chemin .'app/view/Examinateur/viewFormAjoutCreneau.php';
        require($vue);
    }
    
    public static function ExaminateurConfirmAjoutCreneau()
    {
        session_start();
        $id = $_SESSION['id'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        
        $label = $_GET['label'] ?? '';
        $date = $_GET['date'];
        $time = $_GET['time'];
        
        if(!empty($label) && !empty($date) && !empty($time))
        {
            $creneau = $date .' ' . $time .':00';
            $resultats = ModelExaminateur::getProjetCreneau($id, $label);
            foreach ($resultats as $element)
            {
                if( ($element->getLabel() === $label) && ($element->getCreneau() === $creneau))
                {
                   $existe = 1; 
                }
            }
            
            if($existe = 1)
            {
                $validation = 0;
                include 'configuration.php';
                $vue = $chemin .'app/view/Examinateur/viewConfirmAjoutCreneau.php';
                require($vue);
            }
            else 
            {
                $validation = ModelExaminateur::SetOneCreneau($id, $label, $creneau);
                include 'configuration.php';
                $vue = $chemin .'app/view/Examinateur/viewConfirmAjoutCreneau.php';
                require($vue);
            }
        }
        else 
        {
            $resultats = ModelExaminateur::getAllprojet();      
            include 'configuration.php';
            $vue = $chemin .'app/view/Examinateur/viewFormAjoutCreneau.php';
            require($vue);
        }
    }

}

?>