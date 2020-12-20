<?php

$con = mysqli_connect("localhost","root","","db") or die ("Failed to connect to MySQL: " );

//Login 

session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
    // removes backslashes
 	$username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
 	$username = mysqli_real_escape_string($con,$username);

	$password = stripslashes($_REQUEST['password']);
 	$password = mysqli_real_escape_string($con,$password);

 	//Checking if user existing in the database or not
    $query_user = "SELECT * FROM `users` WHERE username='$username' 
    and password='".md5($password)."'";
 	$result = mysqli_query($con,$query_user) or die(mysql_error());
 	$rows = mysqli_num_rows($result);

      	if($rows==1){
            $query_type = $con -> query("SELECT type FROM users WHERE username = '$username';");
            $query = $query_type -> fetch_assoc();
            $type = $query['type'];

                if($type == 'admin'){
                    $_SESSION['username'] = $username;
                    header("Location: AcceuilAdminEng.php"); 
                }

                 if($type == 'utilisateur'){
                    $_SESSION['username'] = $username;
                    header("Location: include/indexutilisateur.php"); 
                }

                 if($type == 'gestionnaire'){
                    $_SESSION['username'] = $username;
                    header("Location: include/indexgestionnaire.php"); 
                }
        }
        else{
 			echo "<h3>Username/password is incorrect.</h3>";
 		}
}
