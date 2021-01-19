<?php
session_start();
?>

<header>
    <a href="menu_principal.php"><img src="../img/QuickReflexTransp.png" class="logo"></a>

    <nav class="menu">
        <ul>
            <li><a href="../en/menu_principal_en.php">HOME</a></li>
            <li><a href="../en/notre_produit_en.php">OUR PRODUCT</a></li>
            <?php
            if(isset($_SESSION["ID"]))
            {
                include('../php_fr/connexionbdd.php');

                $req = $bdd->prepare("SELECT permission FROM users WHERE id_user = ?");
                $req->execute(array($_SESSION["ID"]));
                $donnees = $req->fetch();
                
                if ($donnees["permission"] == "utilisateur")
                {
                    ?>
                    <li><a href="profil_utilisateur_en.php">MY PROFILE</a></li>
                    <?php
                }

                else if($donnees["permission"] == "gestionnaire")
                {
                    ?>
                    <li><a href="profil_gestionnaire_en.php">MY PROFILE</a></li>
                    <?php
                }
                
                if($donnees["permission"] == "administrateur")
                {
                    ?>
                    <li><a href="profil_administrateur_en.php">MY PROFILE</a></li>
                    <?php
                }
                
                $req->closeCursor();
            }

            else
            {
                ?>
                <li><a href="../en/page_connexion_en.php">LOG IN</a></li>
                
                <?php
            }
            ?>
            <nav class="langue">
                <ul>
                    <li><a href="../fr/menu_principal.php"><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </ul>
    </nav>

    
</header>
