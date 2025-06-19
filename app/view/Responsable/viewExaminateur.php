<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            echo SoutenanceMenuResponsable($nom, $prenom);
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
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>