<?php
class Dbh
{
    protected function connect()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpassword = ''; // Empty for default installations
        $dbname = 'login-system';

        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}
?>