<?php
//include("include/auth.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/menu_principal.css" />
        <title> Admin - Home </title>
    </head>
    
    <body>
    	<header> 
            <p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>
            
            <nav>
                <ul id="menu">
                    <li><a href="menu_principal_en.php">Home</a></li>
                    <li><a href="notre_produit_en.php">Our Product</a></li>
                </ul>
            </nav>

            <figure>
                <img src="logoprofil2.png" alt = "profile logo" id="tof">
                <figcaption id="monprofil"><a href="" id="monprofil">My profile</a></figcaption>
                <a href="">Logout</a>
            </figure>

            <nav>
                <ul id="langue">
                    <li><a href="..//fr/menu_admin_fr.php"><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
    	</header>

    	<h1>Welcome <?php echo $_SESSION['username']; ?>! </h1>
    	<div id="conteneur">
			<div id="interieur" class="button">
                <a href="#"><p>Manage sensors</p></a>
            </div>

		    <div id="interieur" class="button">
				<a href="#"><p>Manage access rights</p></a>
            </div>
            
			<div id="interieur" class="button">
				<a href="#"><p>Access FAQ</p></a>
			</div>
		</div>

    	<footer>
        	<p class = "CGU"> Legal Notices: </p>
        	<nav>
          		<ul id="footer">
            		<li> <a href='#'> Contact us </a> </li>
            		<li> <a href='#'> FAQ </a> </li>
          		</ul>
        	</nav>
        </footer>
    </body>
</html>

