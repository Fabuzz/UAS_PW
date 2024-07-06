<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameStore Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffecb3; /* Warna kuning lembut */
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            border-top: 8px solid #ffa726; /* Warna oranye */
        }
        .login-container h1 {
            margin-bottom: 20px;
            color: #ffa726; /* Warna oranye */
        }
        .btn-custom {
            background-color: #ffa726; /* Warna oranye */
            border: none;
            color: white;
        }
        .btn-custom:hover {
            background-color: #fb8c00; /* Warna oranye yang lebih gelap */
        }
        .form-control {
            border: 1px solid #ffb74d; /* Border warna kuning */
        }
        .form-control:focus {
            border-color: #ffa726; /* Border warna oranye saat fokus */
            box-shadow: 0 0 0 0.2rem rgba(255, 167, 38, 0.25);
        }
        .text-custom {
            color: #ffa726; /* Warna oranye */
        }
        .input-group-text {
            background-color: #fff;
            border: 1px solid #ffb74d; /* Border warna kuning */
            cursor: pointer;
        }
        .input-group-text i {
            color: #ffa726; /* Warna oranye */
        }
        .input-group-text:hover i {
            color: #fb8c00; /* Warna oranye yang lebih gelap saat di-hover */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="text-center">Login to GameStore</h1>
        <form action="../actions/login.php" method="post">
            <div class="form-group">
                <label for="username" class="text-custom">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password" class="text-custom">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <span class="input-group-text" onclick="togglePassword('password', this)">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Login</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="register.php" class="text-custom">Register</a></p>
    </div>
    <script>
        function togglePassword(fieldId, icon) {
            const passwordField = document.getElementById(fieldId);
            const iconElement = icon.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                iconElement.classList.remove('fa-eye');
                iconElement.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                iconElement.classList.remove('fa-eye-slash');
                iconElement.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
