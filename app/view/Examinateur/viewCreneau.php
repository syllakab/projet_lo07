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
            
            echo jumbotronTitreInfo("La liste de mes creneaux horaires");
        ?>
 
        <div class="mt-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th>Nom du projet</th>
                    <th>Creneaux horaires</th>
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
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>