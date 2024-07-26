<?php
include "../connect/connect.php";

Session::init();

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = 0; // Mặc định là user

    if ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp.";
    } else {
        $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $check_result = $db->select($check_query);

        if ($check_result === false || $check_result->num_rows === 0) {
            // Username và email chưa tồn tại, tiến hành đăng ký
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', $role)";
            $insert_result = $db->insert($insert_query);

            if ($insert_result) {
                Session::set("register_success", "Đăng ký thành công!");
                header("Location: login.php");
                exit();
            } else {
                $error = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        } else {
            $existing_user = $check_result->fetch_assoc();
            if ($existing_user['username'] === $username) {
                $error = "Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.";
            } else {
                $error = "Email đã được sử dụng. Vui lòng sử dụng email khác.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
            background: url('https://images.pexels.com/photos/640809/pexels-photo-640809.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            /* Đường dẫn đến ảnh nền của bạn */
            background-size: cover;
            /* Đảm bảo ảnh nền bao phủ toàn bộ trang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .register-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .register-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .register-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .register-form {
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
            margin-top: 10px; /* Reduced the margin-top to move links higher */
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

        .register-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h2>Đăng ký</h2>
        </div>
        <form method="post" class="register-form">
            <?php
            if (isset($error)) {
                echo "<div class='error-message'>" . htmlspecialchars($error) . "</div>";
            }
            ?>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Tên đăng nhập</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" required>
                <label>Mật khẩu</label>
            </div>
            <div class="input-group">
                <input type="password" name="confirm_password" required>
                <label>Xác nhận mật khẩu</label>
            </div>
            <button type="submit" class="submit-btn">Đăng ký</button>
        </form>
        <div class="links">
            <p>Đã có tài khoản? <a href="./login.php">Đăng nhập</a></p>
        </div>
    </div>
</body>
</html>
