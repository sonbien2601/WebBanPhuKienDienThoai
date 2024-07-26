<?php
include "../connect/connect.php";
Session::init();

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
    $result = $db->select($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(50)); // Tạo token ngẫu nhiên

        $update_query = "UPDATE users SET reset_token = '$token', reset_token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = " . $user['id'];
        $db->update($update_query);

        // Chuyển hướng đến trang đặt lại mật khẩu
        header("Location: reset_password.php?token=$token");
        exit();
    } else {
        $error = "Tên đăng nhập hoặc email không chính xác.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
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
            background: url('https://images.pexels.com/photos/1072179/pexels-photo-1072179.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center fixed;
            /* Đường dẫn đến ảnh nền của bạn */
            background-size: cover;
            /* Đảm bảo ảnh nền bao phủ toàn bộ trang */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }


        .forgot-password-container {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .forgot-password-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        .forgot-password-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .forgot-password-form {
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
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .forgot-password-container {
            animation: fadeIn 0.5s ease-out;
        }
    </style>
</head>

<body>
    <div class="forgot-password-container">
        <div class="forgot-password-header">
            <h2>Quên mật khẩu</h2>
        </div>
        <form method="post" class="forgot-password-form">
            <?php
            if (isset($error)) {
                echo "<div class='error-message'>" . htmlspecialchars($error) . "</div>";
            }
            ?>
            <div class="input-group">
                <input type="text" name="username" required>
                <label>Nhập tên đăng nhập của bạn</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" required>
                <label>Nhập email của bạn</label>
            </div>
            <button type="submit" class="submit-btn">Xác nhận</button>
        </form>
        <div class="links">
            <a href="./login.php">Quay lại đăng nhập</a>
        </div>
    </div>
</body>

</html>