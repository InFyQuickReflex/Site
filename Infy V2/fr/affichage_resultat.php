<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Vos résultats</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/affichage_resultats.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header.php")?>
    <main>
        <br>
        <?php
        if(isset($_SESSION["ID"]))
        {
            echo "<h2>Vos Résultats</h2>";

            include('../php_fr/connexionbdd.php');
            include('../php_fr/fonctions/fonctions_permission.php');
            $rep = PermissionUser($bdd);
            ?>
            <P><table>
                <tr>
                    <th> Température </th>
                    <td> 
                    <?php 
                    $reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "température"');
                    $reponse->execute(array($_GET["IDtest"]));
                    if($donnees = $reponse->fetch())
                    {
                        echo $donnees["valeur"]." degrés";
                    }
                    else
                    {
                        echo "Vous n'avez pas de résultats";
                    }
                    $reponse->closeCursor();
                    ?>
                    </td>
                </tr>

                <tr>
                    <th> Fréquence Cardiaque </th>
                    <td>
                    <?php 
                    $reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "fréquence"');
                    $reponse->execute(array($_GET["IDtest"]));
                    if($donnees = $reponse->fetch())
                    {
                        echo $donnees["valeur"]." bpms";
                    }
                    else
                    {
                        echo "Vous n'avez pas de résultats";
                    }
                    $reponse->closeCursor();
                    ?>
                    </td>
                </tr>
                </table></P>
                <section id = "test">                 
                    <article class="testson">
                        <h3>Test n°1: Réactivité à un son innatendu</h3>
                        <?php 
                        $reponse= $bdd->prepare('SELECT tests.id_test valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "son"');
                        $reponse->execute(array($_GET["IDtest"]));
                        if($donnees = $reponse->fetch())
                        {
                            echo"<p> Vous avez mis ".$donnees["valeur"]." secondes à réagir.</p>";  
                        }
                        else
                        {
                            echo"Vous n'avez pas de résultats";
                        }
                        $reponse->closeCursor();
                        ?>
                    </article>

                    <article class="testlumiere">
                        <h3>Test n°2: Réactivité à une lumière innatendue</h3>
                            <?php                           
                            $reponse= $bdd->prepare('SELECT id_test FROM tests WHERE id_test = ?');
                            $reponse->execute(array($_GET["IDtest"]));
                            $donnees = $reponse->fetch();
                            
                               echo "<img src='../php_fr/graphique_lumiere.php?IDtest=".$donnees["id_test"]."' >";  
                            
                            $reponse->closeCursor();                           
                            ?>
                    </article>

                    <article class="testfreq">
                        <h3>Test n°3: Reproduction d'une fréquence</h3>
                        <p> Graphique </p>
                    </article>
                </section>
                <a href="profil_utilisateur.php" class="retour">Profil </a>
        <?php
        }
        ?>
    </main>
    <?php include("header_footer/footer.php")?>
    </body>
</html>