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
include "../classes/signup.class.php";
include "../classes/signup-contr.class.php";

$signup = new SignupControl($username, $email, $pwd, $pwdRepeat);

$signup->signupUser();

header("location: ../login.php?error=none");

?>