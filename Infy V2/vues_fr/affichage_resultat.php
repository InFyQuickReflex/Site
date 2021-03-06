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
        <h2> Vos Résultats </h2>
        <?php

        if(isset($_SESSION["ID"]))
        {
            include('../controleur_fr/connexionbdd.php');
            include('../controleur_fr/fonctions/fonctions_permission.php');
            include('../controleur_fr/fonctions/fonctions_affichage.php');
            PermissionUser($bdd);
            $ID = $_GET["IDtest"];
            ?>
            <P><table>
                <tr>
                    <th> Température </th>
                    <td> 
                    <?php 
                    $reponse = AfficherTemp($bdd,$ID);
                    if($donnees = $reponse->fetch())
                    { 
                        echo $donnees["valeur"]." degrés  ";
                    } 
                    else
                    {
                        echo "Vous n'avez pas de résultats";
                    }
                    
                    if($donnees["valeur"] >= 38){
                        echo "<strong> Température trop haute </strong>";
                    }
                    elseif($donnees["valeur"] <= 34){
                        echo "<strong> Température trop basse </strong>";
                    }
                    else{
                        echo "<em> Température normale </em>";
                    }
                     ?>
                    </td>
                </tr>

                <tr>
                    <th> Fréquence Cardiaque </th>
                    <td>
                    <?php 
                    $reponse = AfficherFreq($bdd, $ID);
                    if($donnees = $reponse->fetch())
                    {
                        echo $donnees["valeur"]." bpm";
                    }
                    else
                    {
                        echo "Vous n'avez pas de résultats";
                    }

                    if($donnees["valeur"] >= 100){
                        echo "<strong> Fréquence cardiaque trop haute </strong>";
                    }
                    elseif($donnees["valeur"] <= 55){
                        echo "<strong> Fréquence cardiaque trop basse </strong>";
                    }
                    else{
                        echo "<em> Fréquence cardiaque normale </em>";
                    }?>
                    </td>
                </tr>
                </table></P>
                <section id = "test">                 
                    <article class="testson">
                        <h3>Test n°1: Réactivité à un son innatendu</h3>
                        <?php 
                        $reponse = AfficherSon($bdd,$ID);
                        if($donnees = $reponse->fetch())
                        {
                            echo"<p> Vous avez mis ".$donnees["valeur"]." secondes à réagir.</p>";  
                        }
                        else
                        {
                            echo"Vous n'avez pas de résultats";
                        }?>
                    </article>

                    <article class="testlumiere">
                        <h3>Test n°2: Réactivité à une lumière innatendue</h3>
                        <?php 
                        echo "<img src='../controleur_fr/graphique_lumiere.php?IDtest=".$ID."' >"; ?>
                    </article>

                    <article class="testfreq">
                        <h3>Test n°3: Reproduction d'une fréquence</h3>
                        <p>  </p>
                    </article>

                    <article>
                        <h3> Où vous situez-vous dans la moyenne ?</h3>
                        <?php 
                        echo "<img src='../controleur_fr/graphique_comparaison.php?IDtest=".$ID."' >"; 
                        ?>
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