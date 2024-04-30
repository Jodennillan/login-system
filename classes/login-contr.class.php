<?php
class LoginControl extends Login
{
    private $username;
    private $pwd;

    public function __construct($username, $pwd)
    {
        $this->username = $username;
        $this->pwd = $pwd;
    }

    public function loginUser()
    {
        if ($this->emptyInput() === false) {
            header("Location: ../login.php?error=emptyInput");
            exit();
        }

        // Check if the user can be authenticated
        $isAuthenticated = $this->getUser($this->username, $this->pwd);

        if ($isAuthenticated === false) {
            // Handle invalid login
            header("Location: ../login.php?error=invalidlogin");
            exit();
        }

        // Successful login, redirect to dashboard or desired page
        header("Location: ../WEBSITE/index.html");
        exit();
    }

    private function emptyInput()
    {
        // Ensure both fields are filled
        return !(empty($this->username) || empty($this->pwd));
    }
}
?>
