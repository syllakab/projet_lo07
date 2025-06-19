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
        ControllerSoutenance::$action();
        break;
    case "ResponsableReadProject":
    case "ResponsableReadExaminateur":
    case "ResponsableAjoutProject" :
    case "ResponsableConfirmAjoutProject":
        ControllerResponsable::$action();
        break;
    case "ExaminateurReadProject" :
    case "ExaminateurReadCreneau" :
    case "ExaminateurFormProjectCreneau":
    case "ExaminateurReadProjectCreneau":
    case "ExaminateurFormAjoutCreneau":
    case "ExaminateurConfirmAjoutCreneau":
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

