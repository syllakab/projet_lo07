<?php

function jumbotronAccueil()
{
    $resultat = "<h1>XXXXX</h1> \n";
    $resultat .= "<div class=\"text-white text-center bg-secondary mt-5 mb-5 p-4 fw-bold w-50 rounded\" style=\"margin: auto\"> ";
    $resultat .= "<h1>BIENVENU SUR NOTRE SITE</h1>";
    $resultat .= "<p>Ici nous organisons et planifions les soutenances des projets</p>";
    $resultat .= "</div>";
    return $resultat;
}

function jumbotronPersonne($nom,$prenom)
{
    $resultat = "<h1>XXXXX</h1> \n";
    $resultat .= "<div class=\"text-white text-center bg-success mt-5 mb-5 p-3 fw-bold w-50 rounded\" style=\"margin: auto\">";
    $resultat .= "<h1>BIENVENU $nom $prenom</h1>";
    $resultat .= "<p>Ici nous organisons et planifions les soutenances des projets</p>";
    $resultat .= "</div>";
    return $resultat;
}

function jumbotronSuccessInscrire($nom,$prenom)
{
    $resultat = "<h1>XXXXXX</h1>";
    $resultat .= "<div class=\"text-white text-center bg-success mt-5 mb-5 p-3 fw-bold w-50 rounded\" style=\"margin:  auto\">";
    $resultat .= "<h1> $nom $prenom <br></h1>";
    $resultat .= "<h3> Vos informations sont enregistrées avec succès <br></h3>";
    $resultat .= "</div>";
    $resultat .= "<form method='GET' action=\"routerSoutenance.php\" class='text-center'>";
    $resultat .= "<input type='hidden' name='action' value='SoutenanceLogin'>";
    $resultat .= "<button type='submit' class=\"btn btn-success fw-bold text-white\"> Me connecter </button>";
    $resultat .= "</form>";
    return $resultat;
}


function jumbotronTitreInfo($titre)
{
    $resultat = "<h1>XXXXX</h1> \n";
    $resultat .= "<div class=\"text-white text-center bg-info mt-5 mb-5 p-3 fw-bold w-50 rounded\" style=\"margin: auto\">";
    $resultat .= "<h1>$titre</h1>";
    $resultat .= "</div>";
    return $resultat;
}

function jumbotronTitreRed($titre)
{
    $resultat = "<h1>XXXXX</h1> \n";
    $resultat .= "<div class=\"text-white text-center bg-danger mt-5 mb-5 p-3 fw-bold w-50 rounded\" style=\"margin: auto\">";
    $resultat .= "<h1>$titre</h1>";
    $resultat .= "</div>";
    return $resultat;
}

function jumbotronTitreSuccess($titre)
{
    $resultat = "<h1>XXXXX</h1> \n";
    $resultat .= "<div class=\"text-white text-center bg-success mt-5 mb-5 p-3 fw-bold w-50 rounded\" style=\"margin: auto\">";
    $resultat .= "<h1>$titre</h1>";
    $resultat .= "</div>";
    return $resultat;
}