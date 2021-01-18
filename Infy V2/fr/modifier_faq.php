<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Modifier la FAQ</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>

    <body> 
      <?php include("header_footer/header.php")?>

    <main>
    
    <?php
    if(isset($_SESSION["ID"]))
    {
      include('../php_fr/connexionbdd.php');
      include('../php_fr/fonctions/fonctions_faq.php');
    
        $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
        $req->execute(array($_SESSION["ID"]));
        $donnees = $req->fetch();

        if($donnees["permission"] != "administrateur")
        {
            if($donnees["permission"] == "gestionnaire")
            {
                header("Location: profil_gestionnaire.php");
            }

            else if($donnees["permission"] == "utilisateur")
            {
                header("Location: profil_utilisateur.php");
            }
        }

        else
        {
            $donnees = SelectOneFaq($bdd,$_GET["ID"]);
            $donnees = $donnees->fetch();
            ?>
            <br>
            <h2>Modifier la question</h2>
            <form method="POST" action="../php_fr/modifier_faq_traitement.php">
                <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                <label for="question">Question : </label><input type="text" name="question" id="question" value="<?php echo $donnees["question_fr"] ?>"><br><br>

                <label for="reponse">Réponse : </label><textarea rows="10" cols="100" name="reponse" id="reponse"><?php echo $donnees["reponse_fr"] ?></textarea><br><br>

                <input type="submit" name = "action" class = "modifier"value="Modifier">
                <a href="gerer_faq.php" class="cancel">Annuler</a>
                <input type="submit" name = "action" value="Supprimer" class="delete">
            </form>
    <?php 
        }
    }
    $req->closeCursor()
    ?>
    </main>
      <?php include("header_footer/footer.php")?>
    </body>
</html>