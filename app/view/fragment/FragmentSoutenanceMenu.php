<?php

    function SoutenanceMenuAcceuil()
    {
        $variable = "<div class='container-fluid'> \n";
        $variable .= "<nav class='navbar navbar-expand-lg bg-info p-2 fixed-top'> \n";
        $variable .= "<div class='container-fluid'> \n";
        $variable .= "<a href=\"routerSoutenance.php?action=acceuil\" class='navbar-brand fw-bold'> SYLLA-DEMBÉLÉ </a> \n";
        $variable .= "<button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'> \n";
        $variable .= "<span class='navbar-toggler-icon'></span> \n";
        $variable .= "</button>";
        $variable .= "<div class='collapse navbar-collapse' id='menu'> \n";
        $variable .= "<ul class='navbar-nav'> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Innovations</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une fonctionnalité originale</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une amélioration du code MVC</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Se connecter</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceLogin\"> Login</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceInscrire\">S'inscrire</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "</ul> \n";
        $variable .= "</div> \n";
        $variable .= "</div> \n";
        $variable .= "</nav> \n";
        $variable .= "</div> \n";
        return $variable;
    }
    
    
     function SoutenanceMenuEtudiant($nom,$prenom)
    {
        $variable = "<div class='container-fluid'> \n";
        $variable .= "<nav class='navbar navbar-expand-lg bg-info p-2 fixed-top'> \n";
        $variable .= "<div class='container-fluid'> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'> SYLLA-DEMBÉLÉ </a> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'>| $nom $prenom |</a> \n";
        $variable .= "<button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'> \n";
        $variable .= "<span class='navbar-toggler-icon'></span> \n";
        $variable .= "</button>";
        $variable .= "<div class='collapse navbar-collapse' id='menu'> \n";
        $variable .= "<ul class='navbar-nav ms-4'> \n"; 
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Etudiant</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=EtudiantListRDV'>La liste de mes RDV</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=EtudiantFormRDV'>Prendre un RDV pour un projet</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Innovations</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une fonctionnalité originale</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une amélioration du code MVC</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Se deconnecter</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceDeconnexion\">Deconnexion</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "</ul> \n";
        $variable .= "</div> \n";
        $variable .= "</div> \n";
        $variable .= "</nav> \n";
        $variable .= "</div> \n";
        
        return $variable;
    }
    
    
    function SoutenanceMenuExaminateur($nom,$prenom)
    {
        $variable = "<div class='container-fluid'> \n";
        $variable .= "<nav class='navbar navbar-expand-lg bg-info p-2 fixed-top'> \n";
        $variable .= "<div class='container-fluid'> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'> SYLLA-DEMBÉLÉ </a> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'>| $nom $prenom |</a> \n";
        $variable .= "<button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'> \n";
        $variable .= "<span class='navbar-toggler-icon'></span> \n";
        $variable .= "</button>";
        $variable .= "<div class='collapse navbar-collapse' id='menu'> \n";
        $variable .= "<ul class='navbar-nav ms-4'> \n"; 
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Examinateur</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadProject'>La liste des projets</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadCreneau'>La liste de mes créneaux </a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormProjectCreneau'>La liste de mes créneaux pour un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneau'>Ajouter un créneau à un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneauConsecutif'>Ajouter des créneaux consécutifs </a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Innovations</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une fonctionnalité originale</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une amélioration du code MVC</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Se deconnecter</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceDeconnexion\">Deconnexion</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "</ul> \n";
        $variable .= "</div> \n";
        $variable .= "</div> \n";
        $variable .= "</nav> \n";
        $variable .= "</div> \n";
        
        return $variable;
    }
    
    
    function SoutenanceMenuResponsable($nom,$prenom)
    {
        $variable = "<div class='container-fluid'> \n";
        $variable .= "<nav class='navbar navbar-expand-lg bg-info p-2 fixed-top'> \n";
        $variable .= "<div class='container-fluid'> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'> SYLLA-DEMBÉLÉ </a> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'>| $nom $prenom |</a> \n";
        $variable .= "<button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'> \n";
        $variable .= "<span class='navbar-toggler-icon'></span> \n";
        $variable .= "</button>";
        $variable .= "<div class='collapse navbar-collapse' id='menu'> \n";
        $variable .= "<ul class='navbar-nav ms-4'> \n"; 
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Examinateur</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadProject'>La liste des projets</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadCreneau'>La liste de mes créneaux </a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormProjectCreneau'>La liste de mes créneaux pour un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneau'>Ajouter un créneau à un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneauConsecutif'>Ajouter des créneaux consécutifs </a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Responsable</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<optgroup labl='projet'> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableReadProject'>La liste de mes projets</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableAjoutProject'>Ajout d'un projet</a></option> \n";
        $variable .= "</optgroup> \n";
        $variable .= "<optgroup labl='examinateur'> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableReadExaminateur'>La liste des examinateurs</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>La liste des examinateurs d'un projet</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>Ajout d'un examinateur</a></option> \n";     
        $variable .= "</optgroup> \n";
        $variable .= "<optgroup labl='planning'> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>Planning d'un projet</a></option> \n";
        $variable .= "</optgroup> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Innovations</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une fonctionnalité originale</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une amélioration du code MVC</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Se deconnecter</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceDeconnxion\">Deconnexion</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "</ul> \n";
        $variable .= "</div> \n";
        $variable .= "</div> \n";
        $variable .= "</nav> \n";
        $variable .= "</div> \n";
        
        return $variable;
    }
    
    function SoutenanceMenuBoss($nom,$prenom)
    {
        $variable = "<div class='container-fluid'> \n";
        $variable .= "<nav class='navbar navbar-expand-lg bg-info p-2 fixed-top'> \n";
        $variable .= "<div class='container-fluid'> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'> SYLLA-DEMBÉLÉ </a> \n";
        $variable .= "<a href='#' class='navbar-brand fw-bold'>| $nom $prenom |</a> \n";
        $variable .= "<button type='button' class='navbar-toggler' data-bs-toggle='collapse' data-bs-target='#menu'> \n";
        $variable .= "<span class='navbar-toggler-icon'></span> \n";
        $variable .= "</button>";
        $variable .= "<div class='collapse navbar-collapse' id='menu'> \n";
        $variable .= "<ul class='navbar-nav ms-4'> \n"; 
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Etudiant</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=EtudiantListRDV'>La liste de mes RDV</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=EtudiantFormRDV'>Prendre un RDV pour un projet</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";     
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Examinateur</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadProject'>La liste des projets</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurReadCreneau'>La liste de mes créneaux </a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormProjectCreneau'>La liste de mes créneaux pour un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneau'>Ajouter un créneau à un projet</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='routerSoutenance.php?action=ExaminateurFormAjoutCreneauConsecutif'>Ajouter des créneaux consécutifs </a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Responsable</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<optgroup labl='projet'> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableReadProject'>La liste de mes projets</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableAjoutProject'>Ajout d'un projet</a></option> \n";
        $variable .= "</optgroup> \n";
        $variable .= "<optgroup labl='examinateur'> \n";
        $variable .= "<option><a class='dropdown-item' href='routerSoutenance.php?action=ResponsableReadExaminateur'>La liste des examinateurs</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>La liste des examinateurs d'un projet</a></option> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>Ajout d'un examinateur</a></option> \n";     
        $variable .= "</optgroup> \n";
        $variable .= "<optgroup labl='planning'> \n";
        $variable .= "<option><a class='dropdown-item' href='#'>Planning d'un projet</a></option> \n";
        $variable .= "</optgroup> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Innovations</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une fonctionnalité originale</a></li> \n";
        $variable .= "<li><a class='dropdown-item' href='#'>Proposez une amélioration du code MVC</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "<li class='nav-item dropdown'> \n";
        $variable .= "<a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown'>Se deconnecter</a>";
        $variable .= "<ul class='dropdown-menu'> \n";
        $variable .= "<li><a class='dropdown-item' href=\"routerSoutenance.php?action=SoutenanceDeconnxion\">Deconnexion</a></li> \n";
        $variable .= "</ul> \n";
        $variable .= "</li> \n";
        $variable .= "</ul> \n";
        $variable .= "</div> \n";
        $variable .= "</div> \n";
        $variable .= "</nav> \n";
        $variable .= "</div> \n";
        
        return $variable;
    }
    

        

    
