<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           echo SoutenanceMenuAcceuil();
           echo jumbotronTitreInfo("Inscription");
           include '../view/connexion/formInscrire.html';
        ?>
        
    </div>
    
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>

