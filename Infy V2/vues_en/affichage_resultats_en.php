<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Infy - Your Results </title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/affichage_resultats.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body>
      <?php include("header_footer/header_en.php")?>
    <main>
        <br>
        <h2> Your Results </h2>
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
                    <th> Temperature </th>
                    <td> 
                    <?php $reponse = AfficherTemp($bdd,$ID);
                    if($donnees = $reponse->fetch())
                    { 
                        echo $donnees["valeur"]." degrees  ";
                    } 
                    else
                    {
                        echo "You d'ont have any results";
                    }
                    
                    if($donnees["valeur"] >= 38){
                        echo "<strong> Temperature too high </strong>";
                    }
                    elseif($donnees["valeur"] <= 34){
                        echo "<strong> Temperature too low </strong>";
                    }
                    else{
                        echo "<em> Normal Temperature </em>";
                    } ?>
                    </td>
                </tr>

                <tr>
                    <th> Heartbeat </th>
                    <td>
                    <?php 
                    $reponse = AfficherFreq($bdd, $ID);
                    if($donnees = $reponse->fetch())
                    {
                        echo $donnees["valeur"]." bpm";
                    }
                    else
                    {
                        echo "You don't have any results";
                    }

                    if($donnees["valeur"] >= 100){
                        echo "<strong> Heartbeat too fast </strong>";
                    }
                    elseif($donnees["valeur"] <= 55){
                        echo "<strong> Heartbeat too slow </strong>";
                    }
                    else{
                        echo "<em> Normal Heartbeat </em>";
                    }?>
                    </td>
                </tr>
                </table></P>
                <section id = "test">                 
                    <article class="testson">
                        <h3>Test n°1: Responsiveness to unexpected sound</h3>
                        <?php 
                        $reponse = AfficherSon($bdd,$ID);
                        if($donnees = $reponse->fetch())
                        {
                            echo"<p> you took ".$donnees["valeur"]." seconds to react.</p>";  
                        }
                        else
                        {
                            echo"You don't have any results";
                        }?>
                    </article>

                    <article class="testlumiere">
                        <h3>Test n°2: Responsiveness to unexpected light</h3>
                            <?php AfficherLum($bdd, $ID) ?>
                    </article>

                    <article class="testfreq">
                        <h3>Test n°3: Reproducing a frequency</h3>
                        <p>  </p>
                    </article>

                    <article>
                        <h3> Where do you rank in the average?</h3>
                        <?php AfficherComp($bdd, $ID) ?>
                    </article>
                </section>
                <a href="profil_utilisateur_en.php" class="retour">Profile </a>
                <br><br>
        <?php
        }
        ?>
    </main>
    <?php include("header_footer/footer_en.php")?>
    </body>
</html>