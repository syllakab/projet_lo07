<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            $responsable = $_SESSION['responsable'];
            if($responsable ===1)
            {
                echo SoutenanceMenuResponsable($nom, $prenom);
            }
            else
            {
                echo SoutenanceMenuExaminateur($nom, $prenom);
            }
            
            echo jumbotronTitreInfo("La liste de mes projets");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom du projet</th>
                    <th>Responsable </th>
                    <th>Nombre d'étudiants par groupe</th>
                </tr>
                <?php
                foreach ($resultats as $element)
                {
                    echo "<tr class='table-info'>";
                     printf("<td> %s </td>",$element->getLabel());
                     printf("<td> %s %s </td>",$element->getNom(),$element->getPrenom());
                     printf("<td> %d </td>",$element->getGroupe());
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