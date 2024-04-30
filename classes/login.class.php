<?php

class Login extends Dbh
{
    protected function getUser($username, $pwd)
    {
        $conn = $this->connect(); // Get MySQLi connection
        
        // Prepared statement to retrieve user by username
        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("s", $username);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        $result = $stmt->get_result(); // Retrieve results

        if ($result->num_rows === 0) {
            // If no user is found, handle accordingly
            $stmt->close();
            $conn->close();
            return false;
        }

        $user = $result->fetch_assoc(); // Get the user data

        // Verify the hashed password
        if (password_verify($pwd, $user['pwd'])) {
            // Correct password, proceed with login
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            $stmt->close();
            $conn->close();

            return true;
        } else {
            // Incorrect password
            $stmt->close();
            $conn->close();
            return false;
        }
    }
}

?>
