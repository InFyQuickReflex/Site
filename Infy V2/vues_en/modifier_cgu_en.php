<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <title>Modifier les CGU</title>
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
        include('../php_fr/connexionbdd.php');
        include('../php_fr/fonctions/fonctions_cgu.php');
        include('../php_fr/fonctions/fonctions_permission.php');
        PermissionAdmin($bdd);
            $donnees = SelectOneCgu($bdd,$_GET["ID"]);
            $donnees = $donnees->fetch();
            ?>
            <br>
            <h2>Edit the paragraph</h2>
            <form method="POST" action="../php_fr/modifier_cgu_traitement.php">
                <label for="ID">ID: </label><input type="number" name="ID" id="ID" value="<?php echo $_GET["ID"] ?>" readonly><br><br>

                <label for="titre_en"> Title (english): </label><input type="text" name="titre_en" id="titre" value="<?php echo $donnees["titre_en"] ?>"><br><br>

                <label for="paragraphe_en">Paragraph (english): </label><textarea rows="10" cols="100" name="paragraphe_en" id="paragraphe"><?php echo $donnees["paragraphe_en"] ?></textarea><br><br>

                <label for="titre_fr"> Title (french) : </label><input type="text" name="titre_fr" id="titre" value="<?php echo $donnees["titre_fr"] ?>"><br><br>

                <label for="paragraphe_fr">Paragraph (french) : </label><textarea rows="10" cols="100" name="paragraphe_fr" id="paragraphe"><?php echo $donnees["paragraphe_fr"] ?></textarea><br><br>

                <input type="submit" name = "action" class = "modifier" value="Edit" onclick= 'Confirmation()';>
                <a href="gerer_cgu_en.php" class="cancel">Cancel</a>
                <input type="submit" name = "action" value="Delete" class="delete" onclick= 'ConfirmationEng()';>
            </form>
    <?php 
    }
    $req->closeCursor()
    ?>
    </main>
      <?php include("header_footer/footer_en.php")?>
    </body>
</html>