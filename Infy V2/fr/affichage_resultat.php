<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vos résultats</title>
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

            try
            {
                $bdd = new PDO("mysql:host=mysql-g5c.alwaysdata.net;dbname=g5c_infy;charset=utf8", "g5c", "informatique");
            }
            catch (Exception $e)
            {
                die("Erreur : " . $e->getMessage());
            }
    
            $req = $bdd->prepare("SELECT prenom, nom, identifiant, email, permission FROM users WHERE id_user = ?");
            $req->execute(array($_SESSION["ID"]));
            $donnees = $req->fetch();

            if($donnees["permission"] != "utilisateur")
            {
                if($donnees["permission"] == "administrateur")
                {
                    header("Location: profil_administrateur.php");
                }
                else if($donnees["permission"] == "gestionnaire")
                {
                header("Location: profil_gestionnaire.php");
                }   
            }
            else
            {
	           $reponse= $bdd->prepare('SELECT valeur, unite_mesure FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? )');
	           $reponse->execute(array($_GET["IDtest"]));
            ?>
            <P><table>
                <tr>
                    <th> Température </th>
                    <td> 
                    <?php 
                    $reponse= $bdd->prepare('SELECT ROUND(valeur,0) AS valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "température"');
                    $reponse->execute(array($_GET["IDtest"]));
                    $donnees = $reponse->fetch();
                        echo $donnees["valeur"];
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
                    $donnees = $reponse->fetch();
                        echo $donnees["valeur"];
                    $reponse->closeCursor();
                   ?>
                    </td>
                </tr>
                </table></P>
                <section>
                    <?php 
                    $reponse= $bdd->prepare('SELECT tests.id_test valeur FROM mesures INNER JOIN tests ON (tests.id_test = mesures.id_test AND tests.id_test = ? ) WHERE type = "son"');
                    $reponse->execute(array($_GET["IDtest"]));
                    $donnees = $reponse->fetch();
                    $reponse->closeCursor()
                    ?>
                    <article class="testson">
                        <h3>Test n°1: Réactivité à un son innatendu</h3>
                        <p> Vous avez mis <?php echo $donnees["valeur"] ?> secondes à réagir. </p>
                    </article>

                    <article class="testlumiere">
                        <h3>Test n°2: Réactivité à une lumière innatendue</h3>
                        <div> 
                            
                           <?php 
                            
                            $reponse= $bdd->prepare('SELECT id_test, users.id_user  FROM tests INNER JOIN users ON (users.id_user = tests.id_user)WHERE id_test = ?');
                            $reponse->execute(array($_GET["IDtest"]));
                            $donnees = $reponse->fetch();
                            echo "<img src='../../../jpgrahp_histo.php?IDtest=".$donnees["id_test"]."'>";
                            //echo "<a href='../../../jpgrahp_histo.php?IDtest=".$donnees["id_test"]."'> Graphique</a>"
                            //echo "<a href='../../../jgraph_histo_or.php'> Graphique</a>"
                            ?>
                        </div>
                    </article>

                    <article class="testfreq">
                        <h3>Test n°3: Reproduction d'une fréquence</h3>
                        <p> Graphique </p>
                    </article>
                    <a href=profil_utilisateur.php> Retour au profil </a>
            <?php
            }
        }
        ?>
    </main>
    <?php include("header_footer/footer.php")?>
    </body>
</html>