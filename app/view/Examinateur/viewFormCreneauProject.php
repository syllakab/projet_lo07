<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            $responsable = $_SESSION['responsable'];
            if($responsable ===1)
            {
                echo SoutenanceMenuResponsable($nom, $prenom);
            }
            else
            {
                echo SoutenanceMenuExaminateur($nom, $prenom);
            }
            
            echo jumbotronTitreInfo("Mes creneaux pour un projet");
        ?>
 
        <div class="mt-5 text-center">
            
            <form method="GET" action="routerSoutenance.php" class="border bg-light p-4 w-50 rounded" style="margin: auto">         
                <div>
                    <input type="hidden" name="action" value="ExaminateurReadProjectCreneau">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold"> Mes projets </label> <br>
                    <select class="form-select" name='label'>
                        <option disabled selected hidden>Selectionnez un projet</option>
                        <?php
                        foreach ($resultats as $element)
                        {
                            printf("<option> %s </option>",$element->getLabel());  
                        }  
                        ?>
                    </select>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success fw-bold me-4">Envoyer</button>
                    </div>
                </div>
            </form>
        </div>  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>