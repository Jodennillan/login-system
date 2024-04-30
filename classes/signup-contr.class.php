<?php
 class SignupControl extends Signup
 {
 	private $username;
 	private $emailAddress;
 	private $pwd;
 	private $pwdRepeat;

 	 public function __construct($username, $email, $pwd, $pwdRepeat)
 	 {
 	 	$this-> username= $username;
 	 	$this-> emailAddress= $email;
 	 	$this-> pwd= $pwd;
 	 	$this-> pwdRepeat= $pwdRepeat;

 	 }

 	 public function signupUser()

 	 {
 	 	error_log("Email provided: " . $this->emailAddress);
 	 	if ($this->emptyInput()==false) {
 	 		header("location: ../index.signup.php?error=emptyInput");
 	 		exit();
 	 	}
 	 	if ($this->invalidUser()===false) {
 	 		header("location: ../index.signup.php?error=username");
 	 		exit();
 	 	}
 	 	if ($this->invalidEmail()==false) {
 	 		header("location: ../index.signup.php?error=email");
 	 		exit();
 	 	}
 	 	if ($this->pwdMatch()==false) {
 	 		header("location: ../index.signup.php?error=passwordmatch");
 	 		exit();
 	 	}
 	 	if ($this->uidTakenCheck()==false) {
 	 		header("location: ../index.signup.php?error=usernameoremailtaken");
 	 		exit();
 	 	}
 	 	$this->setUser($this-> username, $this-> emailAddress, $this-> pwd);
 	 }
 	 private function emptyInput()
 	 {
 	 	$result;
 	 	if(empty($this-> username) || empty($this-> emailAddress)|| empty($this-> pwd)|| empty($this-> pwdRepeat))
 	 	{
 	 		$result=false;
 	 	}
 	 	else
 	 	{
 	 		$result=true;
 	 	}
 	 	return $result;
 	 }
 	 private function invalidUser()
 	 {
 	 	$result;
 	 	if(!preg_match("/^[a-zA-Z0-9]*$/",$this-> username))
 	 	{
 	 		$result=false;
 	 	}
 	 	else
 	 	{
 	 		$result=true;
 	 	}
 	 	return $result;
 	 }
 	 private function invalidEmail()
 	 {
 	 	$result;
 	 	if(!filter_var($this-> emailAddress, FILTER_VALIDATE_EMAIL))
 	 	{
 	 		$result=false;

 	 	}
 	 	else
 	 	{
 	 		$result=true;
 	 	}
 	 	return $result;
 	 }
 	 private function pwdMatch()
 	 {
 	 	$result;
 	 	if($this->pwd !== $this-> pwdRepeat)
 	 	{
 	 		$result=false;

 	 	}
 	 	else
 	 	{
 	 		$result=true;
 	 	}
 	 	return $result;
 	 }
 	  private function uidTakenCheck()
 	 {
 	 	$result;
 	 	if(!$this->checkUser($this-> username, $this-> emailAddress))
 	 	{
 	 		$result=false;

 	 	}
 	 	else
 	 	{
 	 		$result=true;
 	 	}
 	 	return $result;
 	 }

 	 
 }
?>