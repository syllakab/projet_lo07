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
            echo jumbotronTitreRed("Désolé, il n'y a pas de créneaux horaires disponibles pour le moment");
        ?>    
        <div class='text-center mt-5'>
            <button onclick= "history.back()" class="btn btn-success fw-bold text-white"> Essayer un autre projet </button>
        </div>
            
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
