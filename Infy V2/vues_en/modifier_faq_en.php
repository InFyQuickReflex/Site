<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Edit FAQ</title>
        <link rel="stylesheet" href="../css/header_footer.css">
        <link rel="stylesheet" href="../css/modifier_creer.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script src = "../css/popup.js"></script>
    </head>

    <body> 
      <?php include("header_footer/header_en.php")?>

    <main>
    
    <?php
    if(isset($_SESSION["ID"]))
    {
        include('../controleur_fr/connexionbdd.php');
        include('../controleur_fr/fonctions/fonctions_faq.php');
        include('../controleur_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
        $donnees = SelectOneFaq($bdd,$_GET["ID"]);
        $donnees = $donnees->fetch();
        ?>
        <br>
        <h2>Edit the question</h2>
        <form method="POST" action="../controleur_fr/modifier_faq_traitement.php">
                <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                <label for="question_en">Question (english) : </label><input type="text" name="question_en" id="question" value="<?php echo $donnees["question_en"] ?>"><br><br>

                <label for="reponse_en">Answer (english) : </label><textarea rows="10" cols="100" name="reponse_en" id="reponse"><?php echo $donnees["reponse_en"] ?></textarea><br><br>

                <label for="question">Question (french) : </label><input type="text" name="question" id="question" value="<?php echo $donnees["question_fr"] ?>"><br><br>

                <label for="reponse">Answer (french) : </label><textarea rows="10" cols="100" name="reponse" id="reponse"><?php echo $donnees["reponse_fr"] ?></textarea><br><br>

                <input type="submit" name = "action" class = "modifier"value="Edit" onclick= 'Confirmation()';>
                <a href="gerer_faq_en.php" class="cancel">Cancel</a>
                <input type="submit" name = "action" value="Delete" class="delete" onclick= 'Confirmation()';>
            </form>
    <?php 
    }
    ?>
    </main>
      <?php include("header_footer/footer_en.php")?>
    </body>
</html>