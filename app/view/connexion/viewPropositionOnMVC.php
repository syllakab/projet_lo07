<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            if($menu === 1)
            {
                $responsable = $_SESSION['responsable'];
                $examinateur = $_SESSION['examinateur'];
                $etudiant = $_SESSION['etudiant'];
                if($responsable === 1 && $examinateur === 1 && $etudiant === 1)
                {
                    echo SoutenanceMenuBoss($nom, $prenom);
                }
                elseif($responsable === 1 && $examinateur === 1 && $etudiant === 0 )
                {
                    echo SoutenanceMenuResponsable($nom, $prenom);
                }
                elseif($responsable === 0 && $examinateur === 1 && $etudiant === 0 ) 
                {
                    echo SoutenanceMenuExaminateur($nom, $prenom);
                }
                else 
                {
                    echo SoutenanceMenuEtudiant($nom, $prenom);
                }
            }
            else 
            {
                echo SoutenanceMenuAcceuil();
            }
            echo jumbotronTitreInfo("Proposition d'une amélioration de la structure ou de l'implémentation du code MVC");
        ?>
   
        </div>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
