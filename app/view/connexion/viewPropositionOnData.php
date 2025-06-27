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
            echo jumbotronTitreInfo("Proposition d'une manière originale et innovante d'utiliser les données stockées dans la base de données");
            
            echo jumbotronTitreAmelioration("INSERTION DANS UNE TABLE","Quand on veut insérer une nouvelle ligne dans une table, on essaie souvent de récupérer l’ID le plus grand et d’y ajouter 1.
                                    Mais il est mieux d’améliorer la structure de la table en utilisant un champ auto-increment.
                                    Ainsi, l’ID est créé automatiquement par la base de données, ce qui évite les erreurs si plusieurs personnes insèrent en même temps.<br>
                                    Cela rend le code plus simple, les requêtes plus rapides, et allège le travail de la base de données");
            echo jumbotronTitreAmelioration("TABLE PERSONNE - IDENTIFIANT","Avec la structure actuelle d'insertion dans la table, il n'est pas possible d’enregistrer deux personnes ayant le même nom, 
                                        ce qui est pourtant un cas tout à fait possible.<br> On utilise actuellement le nom en minuscules comme identifiant,
                                       ce qui impose une unicité stricte du nom pour chaque utilisateur.<br> Cela pose problème, notamment au cas où le responsable souhaite ajouter plusieurs examinateurs portant
                                       le même nom : l'ajout devient alors impossible. <br> <br>
                                       <h5> Les solutions proposées : </h5>
                                       1. Ne plus utiliser le nom en minuscules comme identifiant unique.<br>
                                       On peut recommander d’utiliser un identifiant différent, 
                                       qui respecte un format plus structuré ou qui est généré automatiquement<br>
                                       2. Ajouter d’autres informations pour distinguer les personnes comme :<br>
                                        - la filiation (nom du père ou de la mère)<br>
                                        - Date de Naissance <br>
                                        - l’adresse e-mail <br>
                                        - le contact téléphonique <br>
                                       3. Utiliser l'email comme identifiant <br> <br>
                                       NB : Utiliser un mot de passe unique pour tous les utilisateurs compromet la sécurité et empêche d’identifier les actions individuellement.
                                       Il faut générer un mot de passe personnel par utilisateur et imposer sa modification à la première connexion.");
            
            echo jumbotronTitreAmelioration("UNICITÉ - TABLE RDV","Dans la table RDV, l’ajout d’une contrainte d’unicité sur le couple (creneau, etudiant) permettrait de simplifier
                                            considérablement la gestion des exceptions. En effet, la base de données signalerait automatiquement qu’un étudiant a déjà réservé un créneau donné,
                                            sans qu’il soit nécessaire d’implémenter manuellement cette vérification côté application.
                                            Cette approche présente plusieurs avantages : elle réduit la quantité de code à écrire,
                                            évite de devoir récupérer la liste des créneaux réservés par l’étudiant pour effectuer une comparaison, 
                                            et limite ainsi les sollicitations de la base de données. 
                                            Elle renforce également l’intégrité des données en empêchant les doublons à la source.");
            
            
            echo jumbotronTitreAmelioration("UNICITÉ - TABLE CRENEAU","De la même manière, on pourrait appliquer une contrainte d’unicité dans la table Creneau sur le couple
                                                (examinateur, creneau). Cela empêcherait un examinateur d’être affecté à plusieurs créneaux identiques,
                                            garantissant ainsi la cohérence des plannings sans avoir à faire des contrôles manuels.
                                            Ces contraintes au niveau de la base de données permettent non seulement de réduire la logique métier dans le code, mais aussi de prévenir 
                                            efficacement les doublons ou incohérences dès l’insertion des données.");
            
            echo jumbotronTitreAmelioration("UNICITÉ - TABLE PROJET","Dans la table projet, ajouter une contrainte d’unicité sur le champ label permettrait de savoir automatiquement 
                                            si un projet avec ce nom existe déjà.Cela évite de devoir récupérer tous les labels existants et de faire la vérification dans le code.
                                            Résultat : moins de code, moins de requêtes vers la base, et une gestion des erreurs plus simple");
            
            echo jumbotronTitreAmelioration("DES FONCTIONNALITÉS QU'ON PEUT Y AJOUTER","<br>1. ANNULER UN RDV POUR UN ÉTUDIANT<br> Permettre à un étudiant d’annuler un rendez-vous de soutenance qu’il a déjà réservé.<br>
                                             Avec la table RDV, il serait beaucoup plus simple d’implémenter la fonctionnalité d’annulation d’un rendez-vous.
                                             Il suffirait en effet de supprimer l’enregistrement correspondant dans cette table, sans avoir à créer de nouveaux éléments ni à utiliser
                                             d’autres données. On travaille ainsi uniquement avec les informations déjà présentes, ce qui rend le processus plus facile et efficace. <br><br>
                                             2. SUPPRIMER UN CRENEAU POUR UN EXAMINATEUR<br>
                                             On peut également utiliser la table creneau pour l’implémentation de la fonctionnalité de suppression d’un créneau déjà ajouté par un examinateur.
                                             Il suffit simplement de retirer l’enregistrement correspondant dans cette table, sans avoir à créer de nouvelles données ni à modifier d’autres
                                             structures existantes. Cette approche repose entièrement sur les informations déjà disponibles, ce qui la rend à la fois simple, efficace et cohérente avec le modèle de données.<br><br>
                                            3. SUPPRIMER UN PROJET ET UN EXAMINATEUR POUR UN RESPONSABLE <br>
                                            Le responsable a également la possibilité de supprimer un projet ou un examinateur, en s’appuyant uniquement sur les données déjà présentes 
                                            dans le système. Aucune création de nouvelles données n’est nécessaire, ce qui simplifie le traitement et garantit une gestion cohérente 
                                            des informations.");
        ?>
        </div>
    
    </div>
</body>
</html>