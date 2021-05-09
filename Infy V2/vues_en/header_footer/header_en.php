<?php
session_start();
?>

<header>
    <a href="menu_principal_en.php"><img src="../img/QuickReflexTransp.png" class="logo"></a>

    <nav class="menu">
        <ul>
            <li><a href="menu_principal_en.php">HOME</a></li>
            <li><a href="notre_produit_en.php">OUR PRODUCT</a></li>
            <?php
            if(isset($_SESSION["ID"]))
            {
                include('../controleur_fr/connexionbdd.php');

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
                <li><a href="../vues_en/page_connexion_en.php">LOG IN</a></li>
                
                <?php
            }
            ?>
            <nav class="langue">
                <ul>
                    <li><a href="../vues_fr/menu_principal.php"><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
        </ul>
    </nav>

    
</header>
<script>
let lien = document.createElement('link');
lien.rel = "icon";
lien.href = "../img/QuickReflexTranspZoom.png";
document.head.append(lien);
</script>
