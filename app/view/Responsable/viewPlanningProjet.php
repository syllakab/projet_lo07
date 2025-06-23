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
            echo jumbotronTitreInfo("La planning de : <br>$label");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom du projet</th>
                    <th>Examinateur </th>
                    <th>Creneau</th>
                    <th>Etudiant</th>
                </tr>
                <?php
                foreach ($resultats as $element)
                {
                    echo "<tr class='table-info'>";
                     printf("<td> %s </td>",$element->getLabel());
                     printf("<td> %s %s </td>",$element->getNom(),$element->getPrenom());
                     printf("<td> %s </td>",$element->getCreneau());
                     $etudiants = str_replace(",", "\n", $element->getEtudiants());
                     printf("<td> %s </td>", nl2br($etudiants));
                    echo "</tr>";
                }
                ?>
            </table>
        </div> 
         <div class='text-center mt-5'> 
           <button onclick= "history.back()" class="btn btn-success fw-bold text-white"> Voir un autre planning </button>
         </div>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>