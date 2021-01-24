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
            include('../php_fr/fonctions/fonctions_affichage.php');
            PermissionUser($bdd);
            $ID = $_GET["IDtest"];
            ?>
            <P><table>
                <tr>
                    <th> Température </th>
                    <td> 
                    <?php AfficherTemp($bdd,$ID) ?>
                    </td>
                </tr>

                <tr>
                    <th> Fréquence Cardiaque </th>
                    <td>
                    <?php AfficherFreq($bdd, $ID) ?>
                    </td>
                </tr>
                </table></P>
                <section id = "test">                 
                    <article class="testson">
                        <h3>Test n°1: Réactivité à un son innatendu</h3>
                        <?php AfficherSon($bdd,$ID) ?>
                    </article>

                    <article class="testlumiere">
                        <h3>Test n°2: Réactivité à une lumière innatendue</h3>
                            <?php AfficherLum($bdd, $ID) ?>
                    </article>

                    <article class="testfreq">
                        <h3>Test n°3: Reproduction d'une fréquence</h3>
                        <p>  </p>
                    </article>

                    <article>
                        <h3> Où vous situez-vous dans la moyenne ?</h3>
                        <?php AfficherComp($bdd, $ID) ?>
                    </article>
                </section>
                <a href="profil_utilisateur.php" class="retour">Profil </a>
                <br><br>
        <?php
        }
        ?>
    </main>
    <?php include("header_footer/footer.php")?>
    </body>
</html>