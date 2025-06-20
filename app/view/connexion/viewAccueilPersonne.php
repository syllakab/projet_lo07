<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           if($responsable === 1 && $examinateur === 1)
           {
              echo SoutenanceMenuResponsable($nom, $prenom ,$id);
              echo jumbotronPersonne($nom, $prenom);
           }
           elseif($responsable === 0  && $examinateur === 1)
           {
               echo SoutenanceMenuExaminateur($nom, $prenom);
               echo jumbotronPersonne($nom, $prenom);
           }
           else
           {
              echo SoutenanceMenuEtudiant($nom, $prenom);
              echo jumbotronEtudiant($nom, $prenom);
           }
           
        ?>
    </div>
    
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
