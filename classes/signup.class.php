<?php

class Signup extends Dbh
{
    protected function setUser($username, $email, $pwd)
    {
        $conn = $this->connect(); // Get MySQLi connection
        $pwdHashed = password_hash($pwd, PASSWORD_DEFAULT);

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO user (username, email, pwd) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sss", $username, $email, $pwdHashed);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->close();
        $conn->close();
    }

    protected function checkUser($username, $email)
    {
        $conn = $this->connect(); // Get MySQLi connection
        
        // Prepared statement to check if a user exists
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("ss", $username, $email);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $stmt->store_result(); // This allows using num_rows
        
        $resultCheck = ($stmt->num_rows > 0) ? false : true;

        $stmt->close();
        $conn->close();

        return $resultCheck;
    }
}

?>