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
            elseif($responsable === 1 && $examinateur === 1 && $etudiant === 0 )
            {
               echo SoutenanceMenuResponsable($nom, $prenom);
            }
            else 
            {
                echo SoutenanceMenuExaminateur($nom, $prenom);
            }
            
            if ($validation === 1)
            {
                echo jumbotronTitreSuccess("Félicitations <br> Les créneaux ont été ajoutés avec succès"); 
                echo "<div class='text-center mt-2 fw-bold'>";
                echo "<h4 class='list-group-item list-group-item-info list-group-item-action rounded'> Nom du projet : $label </h4>";
                echo "<h4 class='list-group-item list-group-item-info list-group-item-action rounded'> Les créneaux consécutifs ajoutés : </h4>";
                echo "<ul class='list-group'>";
                  foreach ($creneaux_consecutifs as $creneau)
                  {
                     echo "<li class='list-group-item list-group-item-secondary list-group-item-action rounded'> $creneau</li>"; 
                  }
                echo "</ul>";
                echo "</div>";
                printf(" <div class='text-center mt-5'> \n");
                printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Ajouter un autre ensemble de créneaux consécutifs </button>\n");
                printf("</div>");
            }
            else
            {
               $existe = $_SESSION['creneau_existe']; 
                echo jumbotronTitreRed("Impossible d'ajouter ces creneaux car -- $existe -- est déjà proposé");
                printf(" <div class='text-center mt-5'> \n");
                printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Réessayez un autre ensemble de créneaux consécutifs </button>\n");
                printf("</div>");
            }
        ?>    
       
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>

