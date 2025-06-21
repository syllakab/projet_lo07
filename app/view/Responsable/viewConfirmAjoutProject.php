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
                echo SoutenanceMenuResponsable($nom, $prenom);
            }
            
            if ($validation === 1)
            {
                echo jumbotronTitreSuccess("Félicitations <br> Votre projet a été ajouté avec succès"); 
                echo "<div class='text-center mt-2 fw-bold'>";
                echo "<ul class='list-group'>";
                  echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Nom du projet : $label </li>";
                  echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Responsable : $nom $prenom</li>";
                  echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Nombre maximal d'étudiants : $nombre</li>";
                echo "</ul>";
                echo "</div>";
            }
            else
            {
                echo jumbotronTitreRed("Impossible d'ajouter ce projet car il existe déjà");
                printf(" <div class='text-center mt-5'> \n");
                printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Réessayer </button>\n");
                printf("</div>");
            }
            
        ?>
  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>


