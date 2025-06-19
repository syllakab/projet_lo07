<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            echo SoutenanceMenuResponsable($nom, $prenom);
            echo jumbotronTitreInfo("Ajout d'un projet");
        ?>
 
        <div class="mt-5">
            <?php
              include 'formAjoutProject.html';
            ?>
        </div>  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
