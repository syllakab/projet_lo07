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
            
            echo jumbotronTitreAmelioration("LA VUE","Il existe des vues qui ne nécessitent pas l’accès aux données de la base, comme les formulaires d’inscription ou de connexion.
                                             Ces vues peuvent être appelées directement depuis la barre de navigation ou enchaînées à partir d’autres formulaires,
                                             sans passer nécessairement par un contrôleur <br><br>
                                            Ainsi on aura deux types de vues qui sont : <br>
                                            1. Les vues dépendantes des données de la base : elles doivent impérativement passer par un contrôleur pour récupérer ou manipuler 
                                            les données nécessaires à leur affichage.<br>
                                            2. Les vues indépendantes de la base de données : elles peuvent être affichées directement, sans intervention du contrôleur,
                                            car elles ne nécessitent aucun traitement ou chargement de données.");
            
            echo jumbotronTitreAmelioration("LES MÉTHODES DES MODÈLES","Au cours du projet, nous avons constaté que certaines méthodes, issues de modèles différents, 
                accédaient aux mêmes données ou effectuaient des insertions similaires.
                                             Pour éviter la redondance et la réécriture de méthodes similaires, il est possible d’inclure les fichiers des différents modèles
                                             dans les contrôleurs concernés. Cela permet de centraliser l’accès aux méthodes existantes,
                                             d'améliorer la réutilisabilité du code et de maintenir une structure plus propre et cohérente.")
        ?>
   
        </div>
    </div>
    <?php 
     include '../view/fragment/FragmentSoutenanceFooter.html';
    ?>
</body>
</html>
