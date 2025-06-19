<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           echo SoutenanceMenuAcceuil(); 
           echo jumbotronTitreRed("Identifiants invalides")
        ?>
         <form method="GET" action="routerSoutenance.php" class="border bg-light p-4 w-50 h-100 rounded" style="margin: auto">         
            <div>
                <input type="hidden" name="action" value="SoutenanceAccueilPersonne">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold"> login : </label> <br>
                <input class="form-control" type="text" name="login" placeholder="Entrez votre login">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold"> Password : </label> <br>
                <input class="form-control" type="password" name="password" placeholder="Entrez votre mot de passe">
            </div>
             <div class="text-center mt-3">
                <button type="submit" class="btn btn-success fw-bold me-4">Connexion</button>
                <button type="reset" class="btn btn-danger text-white fw-bold">Effacer</button>
            </div>
            
        </form>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>


