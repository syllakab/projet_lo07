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
            echo jumbotronTitreInfo("La liste des examinateurs");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom</th>
                    <th>Prenom</th>
                </tr>
                <?php
                foreach ($resultats as $element)
                {
                    echo "<tr class='table-info'>";
                    foreach ($element as $cle=>$valeur)
                    {    
                         printf("<td> %s </td>",$valeur);      
                    }  
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        <?php
          if ($button_retour === 1)
          {
             printf(" <div class='text-center mt-5'> \n");
             printf("<button onclick= \"history.back()\" class=\"btn btn-success fw-bold text-white\"> Voir pour un autre projet </button>\n");
             printf("</div>");
          }
        ?>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>