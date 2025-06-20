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
                    <input type="hidden" name="action" value="EtudiantFormCreneauDisponible">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold"> La liste des projets où vous n'avez pas de RDV</label> <br>
                    <select class="form-select" name='label'>
                        <option disabled selected hidden>Selectionnez un projet</option>
                        <?php
                        foreach ($resultats as $element)
                        {
                            printf("<option> %s </option>",$element);  
                        }  
                        ?>                    
                    </select>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-success fw-bold me-4">Voir les créneaux horaires disponibles</button>
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