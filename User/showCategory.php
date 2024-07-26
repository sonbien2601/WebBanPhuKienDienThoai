<?php
include './headerUser.php';

$categoryModel = new CategoryModel();

// Lấy MaDM từ URL
$MaDM = isset($_GET['MaDM']) ? $_GET['MaDM'] : null;

// Lấy thông tin danh mục
$category = $categoryModel->get_category($MaDM);
$categoryName = $category ? $category->fetch_assoc()['TenDM'] : 'Danh mục không xác định';

// Lấy sản phẩm cho danh mục này
$products = $categoryModel->get_products_by_category($MaDM);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title><?php echo $categoryName; ?> - Web bán phụ kiện</title>
</head>

<body>
    <section class="category">
        <div class="container">
            <div class="category-top row">
                <p><a href="http://localhost/codepm/user/cartegory.php">Trang chủ</a></p> <span>&#10230; </span>
                <p><?php echo $categoryName; ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="category-left">
                    <ul>
                        <?php
                        $categories = $categoryModel->show_category();
                        if ($categories) {
                            while ($result = $categories->fetch_assoc()) {
                                $catMaDM = $result['MaDM'];
                                $catTenDM = $result['TenDM'];
                                echo '<li class="category-left-li"><a href="showCategory.php?MaDM=' . $catMaDM . '">' . $catTenDM . '</a>';
                                $types = $categoryModel->show_categoryChilds($catMaDM);
                                if ($types) {
                                    echo '<ul>';
                                    while ($type = $types->fetch_assoc()) {
                                        echo '<li><a href="showType.php?MaLoaiSP=' . $type['MaLoaiSP'] . '">' . $type['TenLoaiSP'] . '</a></li>';
                                    }
                                    echo '</ul>';
                                }
                                echo '</li>';
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="category-right row">
                    <div class="category-right-top-item">
                        <p><?php echo $categoryName; ?></p>
                    </div>
                    <div class="category-right-content row">
                        <?php
                        if ($products) {
                            while ($pro = $products->fetch_assoc()) {
                        ?>
                                <div class="category-right-content-item">
                                    <a href="product.php?MaSP=<?= $pro['MaSP'] ?>" class="product-image-link">
                                        <img src="../admin/uploads/<?= $pro['AnhSP'] ?>" alt="<?= $pro['TenSP'] ?>">
                                    </a>
                                    <h1><?= $pro['TenSP'] ?></h1>
                                    <p><?= $pro['GiaSP'] ?><sup>đ</sup></p>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<p>Không có sản phẩm trong danh mục này.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- Include your footer here -->
<section class="app-container">
    <p>Tải ứng dụng King of Accessories</p>
    <div class="app-google">
        <img src="../images/Screenshot 2024-05-16 171642.png" alt="Google Play">
        <img src="../images/Screenshot 2024-05-16 171701.png" alt="App Store">
    </div>
    <p>Nhận bản tin của King of Accessories</p>
    <input type="text" placeholder="Nhập email của bạn...">
</section>
<footer>
    <div class="footer-top">
        <ul>
            <li><a href=""><img src="../images/logoSaleNoti.png" alt="Logo"></a></li>
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Tuyển dụng</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li>
                <a href="facebook.com" class="fab fa-facebook"></a>
                <a href="" class="fab fa-twitter"></a>
                <a href="youtube.com" class="fab fa-youtube"></a>
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
<script src="."></script>
<a href=""></a>

</html>