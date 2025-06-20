<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            echo SoutenanceMenuEtudiant($nom, $prenom); 
            echo jumbotronTitreRed("Impossible de prendre ce rdv car le nombre d'étudiant dans ce groupe est atteint");
        ?>    
        <div class='text-center mt-5'>
            <button onclick= "history.back()" class="btn btn-success fw-bold text-white"> Essayer un autre créneau </button>
        </div>
            
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>