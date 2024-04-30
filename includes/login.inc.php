<?php

if(isset($_POST['submit']))
{
	// grabbing the data 
	$username= $_POST['username'];
	$email= $_POST['email'];
	$pwd= $_POST['pwd'];
	$pwdRepeat= $_POST['pwdRepeat'];
}
// control data
include "../classes/Dbh.class.php";
include "../classes/login.class.php";
include "../classes/login-contr.class.php";

$login = new LoginControl($username, $pwd);

$login->loginUser();

header("Location: ../WEBSITE/index.html?error=none");

?>