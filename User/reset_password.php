<?php
include "../connect/connect.php";

Session::init();

$db = new Database();

if (!isset($_GET['token'])) {
    header("Location: login.php");
    exit();
}

$token = $_GET['token'];

$query = "SELECT * FROM users WHERE reset_token = '$token' AND reset_token_expires > NOW()";
$result = $db->select($query);

if (!$result || $result->num_rows == 0) {
    $error = "Token không hợp lệ hoặc đã hết hạn.";
} else {
    $user = $result->fetch_assoc();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password === $confirm_password) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $update_query = "UPDATE users SET password = '$hashed_password', reset_token = NULL, reset_token_expires = NULL WHERE id = " . $user['id'];
            if ($db->update($update_query)) {
                $success = "Mật khẩu đã được đặt lại thành công. Vui lòng đăng nhập.";
            } else {
                $error = "Có lỗi xảy ra. Vui lòng thử lại.";
            }
        } else {
            $error = "Mật khẩu không khớp.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
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
            background: url('https://images.pexels.com/photos/325185/pexels-photo-325185.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            /* Đường dẫn đến ảnh nền của bạn */
            background-size: cover;
            /* Đảm bảo ảnh nền bao phủ toàn bộ trang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }


        .reset-password-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .reset-password-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .reset-password-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .reset-password-form {
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

        .input-group input:focus+label,
        .input-group input:valid+label {
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

        .error-message,
        .success-message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: center;
        }

        .error-message {
            background: #ff6b6b;
            color: white;
        }

        .success-message {
            background: #28a745;
            color: white;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .reset-password-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>

<body>
    <div class="reset-password-container">
        <div class="reset-password-header">
            <h2>Đặt lại mật khẩu</h2>
        </div>
        <form method="post" class="reset-password-form">
            <?php
            if (isset($error)) {
                echo "<div class='error-message'>$error</div>";
            }
            if (isset($success)) {
                echo "<div class='success-message'>$success</div>";
            } else {
            ?>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label>Mật khẩu mới</label>
                </div>
                <div class="input-group">
                    <input type="password" name="confirm_password" required>
                    <label>Xác nhận mật khẩu mới</label>
                </div>
                <button type="submit" class="submit-btn">Đặt lại mật khẩu</button>
            <?php
            }
            ?>
        </form>
        <div class="links">
            <a href="./login.php">Quay lại đăng nhập</a>
        </div>
    </div>
</body>

</html>