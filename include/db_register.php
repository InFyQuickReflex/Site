<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect("mysql-g5c.alwaysdata.net","g5c","informatique","g5c_infy") or die ("Failed to connect to MySQL: " );

//Register User 
//If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
    // removes backslashes
	$username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);

	$nom = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($con,$nom);

	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($con,$prenom);

	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);

	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);

	$birth = stripslashes($_REQUEST['birth']);
	$birth = mysqli_real_escape_string($con,$birth);

	$tel = stripslashes($_REQUEST['tel']);
	$tel = mysqli_real_escape_string($con,$tel);

	$type = stripslashes($_REQUEST['type']);
	$type = mysqli_real_escape_string($con,$type);

	$query = "INSERT into `users` (Username, Nom, Prénom, Email, Password, Naissance, Téléphone, Type)
	VALUES ('$username', '$nom', '$prenom', '$email', '".md5($password)."','$birth','$tel', '$type')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<h3>Registered successfully.</h3>";
    }
}
