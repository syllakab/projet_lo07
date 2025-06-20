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
            echo jumbotronTitreInfo("La liste de mes RDV");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom du projet</th>
                    <th>Examinateur</th>
                    <th>Date et heure</th>
                </tr>
                <?php
                foreach ($resultats as $element)
                {
                    echo "<tr class='table-info'>";
                     printf("<td> %s </td>",$element->getLabel());
                     printf("<td> %s %s </td>",$element->getNom(),$element->getPrenom());
                     printf("<td> %s </td>",$element->getCreneau());
                    echo "</tr>";
                }
                ?>
            </table>
        </div>  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
