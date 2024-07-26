<?php
include "../connect/connect.php";

Session::init();
Session::checkLogin();

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $db->select($query);

    if ($result !== false) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            Session::set("user_login", true);
            Session::set("user_id", $user['id']);
            Session::set("username", $user['username']);
            Session::set("user_role", $user['role']);

            if ($user['role'] == 0) {
                header("Location: index.php");
            } else {
                header("Location: ../admin/productadd.php");
            }
            exit();
        } else {
            $error = "Sai tên đăng nhập hoặc mật khẩu";
        }
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap');

        :root {
            --primary-color: #3a7bd5;
            --secondary-color: #00d2ff;
            --text-color: #333;
            --bg-color: #f0f4f8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: url('https://images.pexels.com/photos/2049422/pexels-photo-2049422.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            /* Đường dẫn đến ảnh nền của bạn */
            background-size: cover;
            /* Đảm bảo ảnh nền bao phủ toàn bộ trang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .login-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .login-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-form {
            padding: 40px 30px;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border: none;
            border-bottom: 2px solid #ddd;
            background: transparent;
            outline: none;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-bottom-color: var(--primary-color);
        }

        .input-group label {
            position: absolute;
            top: 15px;
            left: 0;
            font-size: 16px;
            color: #999;
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-group input:focus + label,
        .input-group input:valid + label {
            top: -10px;
            font-size: 12px;
            color: var(--primary-color);
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            border-radius: 50px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .links {
            text-align: center;
            margin-top: 10px;
        }

        .links a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 14px;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: var(--secondary-color);
        }

        .error-message {
            background: #ff6b6b;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>Đăng nhập</h2>
            <p>Chào mừng bạn trở lại!</p>
        </div>
        <form method="post" class="login-form">
            <?php
            if (isset($error)) {
                echo "<div class='error-message'>$error</div>";
            }
            if (Session::get("register_success")) {
                echo "<div class='success-message'>" . Session::get("register_success") . "</div>";
                Session::set("register_success", null);
            }
            ?>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Tên đăng nhập</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Mật khẩu</label>
            </div>
            <button type="submit" class="submit-btn">Đăng nhập</button>
        </form>
        <div class="links">
            <a href="./forget_password.php">Quên mật khẩu?</a>
            <a href="./register.php">Đăng ký tài khoản mới</a>
        </div>
    </div>
</body>
</html>