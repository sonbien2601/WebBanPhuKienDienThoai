<?php
include './headerUser.php';

$categoryModel = new CategoryModel();

// Get the type ID from the URL
$MaLoaiSP = isset($_GET['MaLoaiSP']) ? $_GET['MaLoaiSP'] : null;

// Initialize variables
$typeName = 'Tất cả sản phẩm';
$products = null;

if ($MaLoaiSP) {
    // chọn danh mục
    $type = $categoryModel->get_type($MaLoaiSP);
    if (is_array($type) && !empty($type)) {
        $typeName = $type['TenLoaiSP'];
    } else {
        $typeName = 'Unknown Type';
    }
    $products = $categoryModel->get_products_by_type($MaLoaiSP);
} else {
    // nếu k chọn sản phẩm nào show toàn bộ sản phẩm
    $products = $categoryModel->get_all_products();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title><?php echo $typeName; ?> - Web bán phụ kiện</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header styles */
        header {
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .category-nav {
            width: 200px;
            /* Adjust width as needed */
            background-color: #f8f8f8;
            padding: 10px;
            display: flex;
            flex-direction: column;
        }

        .category-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
            /* Ensure full width */
        }

        .category-nav li {
            margin-bottom: 10px;
        }

        .category-nav a {
            display: block;
            padding: 8px 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .category-nav a:hover {
            background-color: #e0e0e0;
        }

        /* Add separator line between items */
        .category-nav li:not(:last-child) {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        /* Navigation styles */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        /* Main content styles */
        main {
            padding: 20px 0;
        }

        .category-top {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .category-top p {
            margin: 0;
            padding: 0 5px;
        }

        .category-left {
            width: 200px;
            /* Adjust width as needed */
            background-color: #f8f8f8;
            padding: 10px;
        }

        .category-left ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .category-left li {
            margin-bottom: 10px;
        }

        .category-left a {
            display: block;
            padding: 8px 10px;
            color: #333;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .category-left a:hover {
            background-color: #e0e0e0;
        }

        /* Add separator line between items */
        .category-left li:not(:last-child) {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        /* Style for subcategories */
        .category-left ul ul {
            margin-left: 15px;
            margin-top: 5px;
        }

        .category-left ul ul li {
            margin-bottom: 5px;
        }

        .category-left ul ul a {
            font-size: 13px;
            padding: 5px 10px;
        }

        .category-right {
            width: 80%;
            float: right;
        }

        .category-right-content {
            display: flex;
            flex-wrap: wrap;
        }

        .category-right-content-item {
            width: calc(25% - 20px);
            margin: 10px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            text-align: center;
        }

        .category-right-content-item img {
            max-width: 100%;
            height: auto;
        }

        .category-right-content-item h1 {
            font-size: 16px;
            margin: 10px 0;
        }

        .category-right-content-item p {
            color: #e74c3c;
            font-weight: bold;
        }

        /* Button styles */
        .mua-ngay {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .mua-ngay:hover {
            background-color: #c0392b;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .footer-top ul {
            list-style-type: none;
            padding: 0;
        }

        .footer-top ul li {
            display: inline-block;
            margin: 0 10px;
        }

        .footer-top ul li a {
            color: #fff;
            text-decoration: none;
        }

        .app-container {
            background-color: #f8f8f8;
            padding: 20px 0;
            text-align: center;
        }

        .app-container input[type="text"] {
            padding: 10px;
            width: 300px;
            margin-top: 10px;
        }

        /* Responsive design */
        @media (max-width: 768px) {

            .category-left,
            .category-right {
                width: 100%;
                float: none;
            }

            .category-right-content-item {
                width: calc(50% - 20px);
            }
        }
    </style>
</head>

<body>
    <main>
        <section class="category">
            <div class="container">
                <div class="category-top row">
                    <p>Trang chủ</p> <span>&#10230; </span>
                    <p><?php echo $typeName; ?></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <nav class="category-left">
                        <ul>
                            <?php
                            $categories = $categoryModel->show_category();
                            if ($categories) {
                                while ($result = $categories->fetch_assoc()) {
                                    $catMaDM = htmlspecialchars($result['MaDM']);
                                    $catTenDM = htmlspecialchars($result['TenDM']);
                                    echo "<li class='category-left-li'><a href='showCategory.php?MaDM={$catMaDM}'>{$catTenDM}</a>";
                                    $types = $categoryModel->show_categoryChilds($catMaDM);
                                    if ($types) {
                                        echo '<ul>';
                                        while ($type = $types->fetch_assoc()) {
                                            $typeMaLoaiSP = htmlspecialchars($type['MaLoaiSP']);
                                            $typeTenLoaiSP = htmlspecialchars($type['TenLoaiSP']);
                                            echo "<li><a href='showType.php?MaLoaiSP={$typeMaLoaiSP}'>{$typeTenLoaiSP}</a></li>";
                                        }
                                        echo '</ul>';
                                    }
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                    <div class="category-right row">
                        <div class="category-right-top-item">
                            <p><?php echo $typeName; ?></p>
                        </div>
                        <div class="category-right-content row">
                            <?php
                            if ($products) {
                                while ($pro = $products->fetch_assoc()) {
                                    $MaSP = htmlspecialchars($pro['MaSP']);
                                    $TenSP = htmlspecialchars($pro['TenSP']);
                                    $GiaSP = htmlspecialchars($pro['GiaSP']);
                                    $AnhSP = htmlspecialchars($pro['AnhSP']);
                                    echo "
                                    <div class='category-right-content-item'>
                                        <a href='product.php?MaSP={$MaSP}' class='product-image-link'>
                                            <img src='../admin/uploads/{$AnhSP}' alt='{$TenSP}'>
                                        </a>
                                        <h1>{$TenSP}</h1>
                                        <p>{$GiaSP}<sup>đ</sup></p>
                                    </div>";
                                }
                            } else {
                                echo "<p>Không có sản phẩm để hiển thị.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Rest of the code remains the same -->
    </main>
    <!-- Include your footer here -->
    <section class="app-container">
        <p>Tải ứng dụng King of Accessories</p>
        <div class="app-google">
            <img src="../images/Screenshot 2024-05-16 171642.png" alt="Google Play">
            <img src="../images/Screenshot 2024-05-16 171701.png" alt="App Store">
        </div>
        <p>Cảm ơn bạn đã quan tâm đến King of Accessories</p>
    </section>
    <footer>
        <div class="footer-top">
            <ul>
                <li><a href=""><img src="../images/logoSaleNoti.png" alt="Logo"></a></li>
                <li><a href="">Liên hệ</a></li>
                <li><a href="">Tuyển dụng</a></li>
                <li><a href="">Giới thiệu</a></li>
                <li>
                    <a href="" class="fab fa-facebook"></a>
                    <a href="" class="fab fa-twitter"></a>
                    <a href="" class="fab fa-youtube"></a>
                </li>
            </ul>
        </div>
        <div class="footer-center">
            <p>Công ty cổ phần 5 anh em với số đăng ký kinh doanh: 1684221368<br>
                Địa chỉ đăng ký: Tổ dân phố Huflit, 828 Sư Vạn Hạnh, Q.10, TPHCM - 0352 400 1892<br>
                Đặt hàng online: <b>0388 080 192</b>
            </p>
        </div>
        <div class="footer-bottom">
            Chúc bạn mua hàng vui vẻ
        </div>
    </footer>
    <script src="./js/script.js"></script>
</body>

</html>