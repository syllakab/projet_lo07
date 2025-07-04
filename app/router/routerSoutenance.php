<?php

require ("../controller/ControllerSoutenance.php");
require ("../controller/ControllerResponsable.php");
require ("../controller/ControllerExaminateur.php");
require ("../controller/ControllerEtudiant.php");

$query_string = $_SERVER['QUERY_STRING'];

parse_str($query_string,$param);

$action = htmlspecialchars($param['action']);


switch ($action)
{
    case "SoutenanceLogin" :
    case "SoutenanceInscrire" :
    case "SoutenanceAccueilPersonne":
    case "SoutenanceConfirmInscrire":
    case "SoutenanceDeconnextion" :
    case "SoutenancePropositionOnData":
    case "SoutenancePropositionOnMVC":
        ControllerSoutenance::$action();
        break;
    case "ResponsableReadProject":
    case "ResponsableReadExaminateur":
    case "ResponsableAjoutProject" :
    case "ResponsableConfirmAjoutProject":
    case "ResponsableFormPlanning":
    case "ResponsablePlanningProjet":
    case "ResponsableFormProjetExaminateur":
    case "ResponsableProjetExaminateur":
    case "ResponsableAjoutExaminateur":
    case "ResponsableConfirmAjoutExaminateur":
        ControllerResponsable::$action();
        break;
    case "ExaminateurReadProject" :
    case "ExaminateurReadCreneau" :
    case "ExaminateurFormProjectCreneau":
    case "ExaminateurReadProjectCreneau":
    case "ExaminateurFormAjoutCreneau":
    case "ExaminateurConfirmAjoutCreneau":
    case "ExaminateurFormAjoutCreneauConsecutif":
    case "ExaminateurConfirmAjoutCreneauConsecutif":
        ControllerExaminateur::$action();
        break;
    case "EtudiantListRDV":
    case "EtudiantFormRDV":
    case "EtudiantFormCreneauDisponible":
    case "EtudiantConfirmRDV":
        ControllerEtudiant::$action();
        break;
    default :
        $action = "SoutenanceAccueil";
        ControllerSoutenance::$action();
        break;
}

