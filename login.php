
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('study-group-african-people.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container img {
            width: 150px;
            margin-bottom: 20px;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="mb-4">Login to your account</h2>
        <form action="includes/login.inc.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="username" name="username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="pwd" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-login">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="index.signup.php" class="btn btn-primary btn-register">SIGNUP</a></p>
    </div>
</body>
</html>
