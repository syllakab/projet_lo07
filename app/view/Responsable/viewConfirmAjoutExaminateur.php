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
           
           if($validation === 1)
           {
                echo jumbotronTitreSuccess("Félicitations <br>Les informations ont été enregistrées avec succès");
                echo "<div class='text-center mt-2 fw-bold'>";
                echo "<ul class='list-group'>";
                echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Nom de l'examinateur : $nom_examinateur </li>";
                echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Prenom de l'examinateur : $prenom_examinateur</li>";
                echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> login : xxxxxxxxxxx</li>";
                echo "<li class='list-group-item list-group-item-info list-group-item-action rounded'> Password : xxxxxxxxxxx</li>";
                echo "</ul>";
                echo "</div>";
               printf(" <div class='text-center mt-5'> \n");
               printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Ajouter un autre examinateur </button>\n");
               printf("</div>");
           }
           else
           {
               echo jumbotronTitreRed("Impossible d'ajouter ce compte car il existe déja");
               printf(" <div class='text-center mt-5'> \n");
               printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> R̈́éesaayer </button>\n");
               printf("</div>");
           }
           
        ?>
         
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>