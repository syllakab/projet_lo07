<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            echo SoutenanceMenuEtudiant($nom, $prenom);
            echo jumbotronTitreInfo("La liste de mes RDV");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom du projet</th>
                    <th>Examinateur</th>
                    <th>Creneau</th>
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
