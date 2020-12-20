<?php
//require('include/db_login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/notre_produit.css" />
        <title>Quick Reflex - Our Product</title>
    </head>

    <body>
		<header> 
			<p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>

			<nav>
				<ul id="menu">
					<li><a href="menu_principal_en.php">Home</a></li>
					<li><a href="">Our Product</a></li>
				</ul>
			</nav>

			<div class="form">
				<p>Log In</p>
				<form method="post" action="" class="login"> 
					<input type="text" name="username" placeholder = "Username" required /></br>
					<input type="password" name="password" placeholder = "Password" required /></br>
					<input name="submit" type="submit" value="Login" /></br>
				</form>
			</div>

			<nav>
				<ul id="langue">
					<li><a href="..//fr/notre_produit_fr.php"><img src="../img/ic_fr.png" class="icone"></a></li>
					<li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
				</ul>
			</nav>
		</header>

        <section>
        	<article class = "Boitier">
        		<h3> Quick Reflex </h3>
        		<p>
                    The box will be made of sensors, a small screen, a mic and buttons. After beginning the test, the user will face three different tests:</br>
                    <ol>
                        <li> <strong>Reactivity test based on an unexpected sound:</strong> a sound will come out of the box and the user will have to press on any button as fast as possible </li>
                        <li> <strong>Reactivity test based on an unexpected light outside:</strong> the buttons on the box will illuminate one after another, in a random pattern. The goal of the test will be to press on the right button as fast as possible.</li>
                        <li> <strong>Reactivity test based on a sound frequency:</strong> a sound of a certain frequency will be produced. The user will then have to reproduce the sound with maximum similarity. His score will be graded based on his accuracy. This test will be able to find any hearing problems, which could threaten the driver during a race.</li>
                    </ol>
                    At the end of the tests, the user will have to take his temperature and heart rate, to detect any anomaly due to stress, hence the presence of sensors at the back of the box. 
                </p>
        	</article>

        	<article class="Site">
        		<h3> What about the website? </h3>
        		<p>
                    Every test will come with our website, conceived to take them. </br>
                    After the creation of his account, the user will be able to log-in and access several sections:
                    <ul>
                        <li>He will of course be able to start a new test, after having made sure the box number he registered is the right one. </li>
                        <li>He will also be able to take a look at his previous tests' results, organised in a table, but also a graph, situating him in the midst of other users' results (anonymously),to locate himself on an average. </li>
                        <li>Finally, he will be able to access an FAQ, which will help him if he has any questions, but also to send an email to the administrator. </li>
                    </ul>
                </p>
        	</article>
        </section>

        <footer>
        	<p class = "CGU"> Legal Notices: </p>
        	<nav>
          		<ul id="footer">
            		<li> <a href=''> Contact us </a> </li>
            		<li> <a href=''> FAQ </a> </li>
          		</ul>
        	</nav>
        </footer>
    </body>
</html>

