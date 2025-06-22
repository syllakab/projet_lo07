<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            $responsable = $_SESSION['responsable'];
            $examinateur = $_SESSION['examinateur'];
            $etudiant = $_SESSION['etudiant'];
            if($responsable === 1 && $examinateur === 1 && $etudiant === 1)
            {
              echo SoutenanceMenuBoss($nom, $prenom);
            }
            else
            {
                 echo SoutenanceMenuEtudiant($nom, $prenom);
            }
            
            if ($validation === 1)
            {
                echo jumbotronTitreSuccess("Félicitations <br> Votre RDV a été fixé avec succès"); 
                echo "<div class='text-center mt-2 fw-bold'>";
                echo "<ul class='list-group'>";
                  echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Nom du projet : $label </li>";
                  echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Date et heure : $creneau</li>";
                echo "</ul>";
                echo "</div>";
                printf("<form method='GET' action=\"routerSoutenance.php\" class='text-center mt-5'>\n");
                printf("<input type='hidden' name='action' value='EtudiantFormRDV'>\n");
                printf("<button type='submit' class=\"btn btn-success fw-bold text-white\"> Prendre un autre RDV </button>");
                printf("</form>");
            }
            else
            {
                echo jumbotronTitreRed("Impossible de prendre ce créneau car vous y avez déjà un rdv");
                printf(" <div class='text-center mt-5'> \n");
                printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Essayer un autre créneau </button>\n");
                printf("</div>");
            }
        ?>    
    
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
