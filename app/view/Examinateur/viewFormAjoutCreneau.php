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
            
            echo jumbotronTitreInfo("Ajout d'un créneau");
        ?>
 
        <div class="mt-5">        
            <form method="GET" action="routerSoutenance.php" class="border bg-light p-4 w-50 rounded" style="margin: auto">         
                <div>
                    <input type="hidden" name="action" value="ExaminateurConfirmAjoutCreneau">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold"> La liste des projets </label> <br>
                    <select class="form-select" name='label'>
                        <option disabled selected hidden>Selectionnez un projet</option>
                        <?php
                        foreach ($resultats as $element)
                        {
                            printf("<option> %s </option>",$element);  
                        }  
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Date</label> <br>
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Heure</label> <br>
                    <input class="form-control" type="time" name="time">
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success fw-bold me-4">Envoyer</button>
                    <button type="reset" class="btn btn-danger fw-bold">Effacer</button>
                </div>
            </form>
        </div>  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>