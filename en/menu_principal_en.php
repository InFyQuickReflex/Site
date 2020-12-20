<?php
//require('include/db_login.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/menu_principal.css" />
        <title>Quick Reflex - Psychotechnical Tests</title>
    </head>

    <body>
    	<header> 
            <p class="logo"> <img src="../img/infy2.png" alt="logo InFy" class="img_logo"> </br> by InFy Corporation </p>

            <nav>
                <ul id="menu">
                    <li><a href="">Home</a></li>
                    <li><a href="notre_produit_en.php">Our Product</a></li>
                </ul>
            </nav>

            <div class="form">
                <p>Log In</p>
                <form method="post" action="" class="login"> 
                    <input type="text" name="username" placeholder = "Username" required /></br>
                    <input type="password" name="password" placeholder = "password" required /></br>
                    <input name="submit" type="submit" value="Login" /></br>
                </form>
            </div>

            <nav>
                <ul id="langue">
                    <li><a href="..//fr/menu_principal_fr.php"><img src="../img/ic_fr.png" class="icone"></a></li>
                    <li><a href=""><img src="../img/ic_en.png" class="icone"></a></li>
                </ul>
            </nav>
    	</header>

        <div class="photofond">
            <div class="description"> 
            Psychotechnical Tests with Quick Reflex!
            </div>
        </div>

        <section>
            <article class ="InFy">
                <h3> Innovation For You ! </h3>
                <p>
                    To answer our client's demand, Infinite Measures, concerning psychotechnical tests, our corporation InFy Corp has decides to conceive and furnish electronic boxes capable to test Formula 1 drivers' reflexes. </br>
                    Indeed, we've noticed that nowadays, drivers were being tested solely with a ball, which they had  to catch while it was falling, as fast as possible. </br>
                    Thus, InFy Corp has decided to take care of this problem by creating tests, capable of judging Formula 1 drivers' reactivity, to later determine if they are fit to drive. </br>
                    The user will first have to visit an evaluation center to register and begin a new test. He will then receive a box and take a seat in fornt of one of the computers, where he will pecify his box number, so he will be able to follow in real time his tests' progress. </br>
                </p>
            </article>

            <article class = "Test">
                <h3> Take a test </h3>
                <p>
                    To pass a test, you will have to first go to an evaluation center to register. You will then receive a box, for which you can understand the functionning in our "Our Product" section. Finally, all there will be left is to sit down in front of a computer, enter your box number, and follow the directions given on our website to take a test. 
                </p>
            </article>

            <aside>
                <h3> Our Team </h3>
                Out team is composed of 6 engineers:
                <ul>
                    <li> Yanouri Lina </li></br>
                    <li> Lacroix Marguerite</li></br>
                    <li> Desailly Jérémy </li></br>
                    <li> Herembert Malo </li></br>
                    <li> Tran Ba Tho Guillaume </li></br>
                    <li> Raboteau Thomas </li></br>
                </ul>
            </aside>
        </section>

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

