<?php
 require_once '../view/fragment/FragmentSoutenanceMenu.php';
 require_once '../view/fragment/FragmentSoutenanceJumbotron.php';
 include '../view/fragment/FragmentSoutenanceHeader.html';
 ?>
<body>
    <div class="container">
        <?php
           echo SoutenanceMenuAcceuil();
           echo jumbotronAccueil();
        ?>
        <img src="/home/etu/syllakab/www/projet_lo07/public/image/sylvain-bordier-4-.jpg" alt="utt" width="50" height="50"/>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>


