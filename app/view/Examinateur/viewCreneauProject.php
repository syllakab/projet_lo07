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
            elseif($responsable === 1 && $examinateur === 1 && $etudiant === 0 )
            {
               echo SoutenanceMenuResponsable($nom, $prenom);
            }
            else 
            {
                echo SoutenanceMenuExaminateur($nom, $prenom);
            }
            
            echo jumbotronTitreInfo("Mes creneaux pour un projet");
        ?>
 
        <div class="mt-5 mb-5 text-center text-success">
            
            <table class="table table-bordered table-hover">
                <tr class='table-secondary'>
                    <th> Mes creneaux horaires pour :  <?php echo $label; ?></th>
                </tr>
                <?php
                foreach ($resultats as $element)
                {
                    echo "<tr class='table-info'>"; 
                         printf("<td> %s </td>",$element);      
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        
        <form method='GET' action="routerSoutenance.php" class='text-center'>
            <input type='hidden' name='action' value='ExaminateurFormProjectCreneau'>
            <button type='submit' class="btn btn-primary fw-bold text-white"> Retour </button>
        </form>
            
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>