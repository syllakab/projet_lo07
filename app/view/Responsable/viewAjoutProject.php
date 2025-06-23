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
                echo SoutenanceMenuResponsable($nom, $prenom);
            }  
            echo jumbotronTitreInfo("Ajout d'un projet");
        ?>
 
        <div class="mt-5">
            <form method="GET" action="routerSoutenance.php" class="border bg-light p-4 w-50 rounded" style="margin: auto">         
                <div>
                    <input type="hidden" name="action" value="ResponsableConfirmAjoutProject">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold"> Label du projet : </label> <br>
                    <input class="form-control" type="text" name="label" placeholder="Entrez le label du projet">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold"> Nombre d'étudiants par groupe : </label> <br>
                    <select class="form-select w-25" name='nombre'>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success fw-bold me-4">Ajouter</button>
                    <button type="reset" class="btn btn-danger text-white fw-bold">Effacer</button>
                </div>

            </form>
        </div>  
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
