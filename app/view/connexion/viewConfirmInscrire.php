<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           echo SoutenanceMenuAcceuil(); 
           
           if($validation === 1)
           {             
               echo jumbotronSuccessInscrire($nom, $prenom);
           }
           elseif($validation === 2)
           {
               echo jumbotronTitreInfo("Inscription");
               echo"<div class=\"text-center text-white fw-bold w-50 bg-danger rounded\" style=\"margin: auto\">\n";
               echo "<h4>Veuillez remplir tous les champs</h4>\n";
               echo "</div>";
               include '../view/connexion/formInscrire.html';
           }
           else
           {
               echo jumbotronTitreInfo("Inscription");
               echo"<div class=\"text-center text-white fw-bold w-50 bg-danger rounded\" style=\"margin: auto\">\n";
               echo "<h4>Ce compte existe déjà</h4>\n";
               echo "</div>";
               include '../view/connexion/formInscrire.html';
           }
           
        ?>
         
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
 
