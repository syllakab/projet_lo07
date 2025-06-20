<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
            echo SoutenanceMenuEtudiant($nom, $prenom);
            echo jumbotronTitreInfo("Prise de RDV pour un projet");
        ?>
 
        <div class="mt-5 text-center">
            
            <form method="GET" action="routerSoutenance.php" class="border bg-light p-4 w-50 rounded" style="margin: auto">         
                <div>
                    <input type="hidden" name="action" value="EtudiantConfirmRDV">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold"> Les créneaux horaires disponibles </label> <br>
                    <select class="form-select" name="date"> 
                        <option disabled selected hidden>Selectionnez un créneau</option>
                        <?php
                        foreach ($resultats as $element)
                        {
                            printf("<option value='%s'> %s ------> %s %s </option>",$element->getCreneau(),$element->getCreneau(),$element->getNom(),$element->getPrenom());  
                        }  
                        ?>
                    </select>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success fw-bold me-4">Confirmer mon RDV</button>
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