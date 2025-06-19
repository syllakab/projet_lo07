<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           echo SoutenanceMenuAcceuil(); 
           if($validation === 0)
           {
               echo jumbotronTitreRed("Cet identifiant existe déjà");
               include '../view/connexion/formInscrire.html';
           }
           elseif($validation === 1)
           {             
               echo jumbotronSuccessInscrire($nom, $prenom);
           }
           else
           {
               echo jumbotronTitreRed("Veuillez remplir tous les champs");
               include '../view/connexion/formInscrire.html';
           }
           
        ?>
         
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
 
