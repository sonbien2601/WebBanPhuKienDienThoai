<?php
include './headerUser.php';
$models = new ProductModel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Web bán phụ kiện</title>
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

        /* Main content styles */
        main {
            padding: 20px 0;
        }

        .product {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            margin-top: 70px;
        }

        .product-content {
            display: flex;
            justify-content: space-between;
        }

        .product-content-left {
            width: 50%;
        }

        .product-content-right {
            width: 45%;
        }

        .product-content-left-big-img img {
            max-width: 100%;
            height: auto;
        }

        .product-content-left-small-img {
            display: flex;
            margin-top: 20px;
        }

        .small-img {
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        .small-img:hover,
        .small-img.active {
            opacity: 0.7;
        }

        .product-content-left-small-img img {
            width: 85px;
            height: auto;
            margin-right: 10px;
            cursor: pointer;
        }

        .product-content-right-product-name h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-content-right-product-price p {
            font-size: 20px;
            font-weight: bold;
            color: #e74c3c;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity p {
            margin-right: 10px;
        }

        .quantity input {
            width: 50px;
            padding: 5px;
            text-align: center;
        }

        .product-content-right-product-button {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .product-content-right-product-button button {
            flex: 1;
            padding: 12px 15px;
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-content-right-product-button button:first-child {
            background-color: #fff;
            color: #333;
            border: 1px solid #333;
            margin-right: 10px;
        }

        .product-content-right-product-button button:first-child:hover {
            background-color: #f0f0f0;
        }

        .product-content-right-product-button button:last-child {
            background-color: #ffc107;
            color: #333;
        }

        .product-content-right-product-button button:last-child:hover {
            background-color: #ffb300;
        }

        .product-content-right-product-button i {
            margin-right: 8px;
        }

        .product-content-right-product-button p {
            margin: 0;
        }

        .product-content-right-product-icon {
            display: flex;
            margin-top: 20px;
        }

        .product-content-right-product-icon-Item {
            margin-right: 20px;
            text-align: center;
        }

        .product-content-right-product-icon-Item i {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .product-content-right-product_QR {
            margin-top: 20px;
        }

        .product-content-right-bottom {
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }

        .product-related {
            margin-top: 40px;
        }

        .product-related-title {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
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

        /* App container styles */
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

        /* Responsive design */
        @media (max-width: 768px) {
            .product-content {
                flex-direction: column;
            }

            .product-content-left,
            .product-content-right {
                width: 100%;
            }

            .category-right-content-item {
                width: calc(50% - 20px);
            }
        }
    </style>
</head>

<body>
    <main>
        <section class="product">
            <div class="container">
                <div class="product-content row">
                    <div class="product-content-left row">
                        <?php
                        $MaSP = isset($_GET['MaSP']) ? $_GET['MaSP'] : null;

                        if ($MaSP) {
                            $chitietProduct = $models->show_productChilds($MaSP);
                            if ($chitietProduct && $chitietProduct->num_rows > 0) {
                                $mainImage = null;
                                $descImages = array();

                                while ($pro = $chitietProduct->fetch_assoc()) {
                                    if ($mainImage === null) {
                                        $mainImage = $pro;
                                    }
                                    if (!empty($pro['AnhMoTa'])) {
                                        $descImages[] = $pro['AnhMoTa'];
                                    }
                                }

                                if ($mainImage) {
                        ?>
                                    <div class="product-content-left-big-img">
                                        <img id="mainImage" src="../admin/uploads/<?= htmlspecialchars($mainImage['AnhSP']) ?>" alt="<?= htmlspecialchars($mainImage['TenSP']) ?>">
                                    </div>
                                <?php
                                }

                                if (!empty($descImages)) {
                                ?>
                                    <div class="product-content-left-small-img">
                                        <?php
                                        foreach ($descImages as $index => $descImg) {
                                        ?>
                                            <img src="../admin/uploads/<?= htmlspecialchars($descImg) ?>" alt="Ảnh mô tả" class="small-img" data-index="<?= $index ?>">
                                        <?php
                                        }
                                        ?>
                                    </div>
                        <?php
                                }
                            } else {
                                echo "Không tìm thấy sản phẩm.";
                            }
                        }
                        ?>
                    </div>

                    <div class="product-content-right">
                        <?php
                        if (!empty($mainImage)) {
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $cartCheck = $cart->checkCart($mainImage['MaSP']);

                                if ($cartCheck) {
                                    $cart->updateCart(
                                        $_POST['soLuong'],
                                        $mainImage['MaSP']
                                    );

                                    echo "<script>alert('Cập nhật giỏ hàng thành công')</script>";
                                    echo "<script>window.location.href='" . $_SERVER['HTTP_REFERER'] . "'</script>";
                                } else {
                                    $cart->addToCart(
                                        $mainImage['MaSP'],
                                        $mainImage['AnhSP'],
                                        $mainImage['TenSP'],
                                        $_POST['soLuong'],
                                        $mainImage['GiaSP']
                                    );

                                    echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
                                    echo "<script>window.location.href='cart.php';</script>";
                                }
                            }
                        ?>
                            <div class="product-content-right-product-name">
                                <h1><?= htmlspecialchars($mainImage['TenSP']) ?></h1>
                                <p>MSP: <?= htmlspecialchars($mainImage['MaSP']) ?></p>
                            </div>
                            <div class="product-content-right-product-price">
                                <p><?= number_format((float)$mainImage['GiaSP']) ?><sup>đ</sup></p>
                            </div>
                            <form action="" method="post">
                                <div class="quantity">
                                    <p style="font-weight: bold;">Số lượng: </p>
                                    <input type="number" name="soLuong" min="0" value="1">
                                </div>

                                <div class="product-content-right-product-button">
                                    <button type="submit" class="addToCart">
                                        <i class="fas fa-shopping-cart"></i>
                                        THÊM GIỎ HÀNG
                                    </button>
                                    <button type="button">
                                        TÌM TẠI CỬA HÀNG
                                    </button>
                                </div>
                            </form>
                            <div class="product-content-right-product-icon">
                                <div class="product-content-right-product-icon-Item">
                                    <i class="fas fa-phone-alt"></i>
                                    <p><a href="">Hotline</a></p>
                                </div>
                                <div class="product-content-right-product-icon-Item">
                                    <i class="far fa-comments"></i>
                                    <p><a href="">Chat</a></p>
                                </div>
                                <div class="product-content-right-product-icon-Item">
                                    <i class="far fa-envelope"></i>
                                    <p><a href="">Email</a></p>
                                </div>
                            </div>
                            <div class="product-content-right-product_QR">
                                <img src="../images/QR.png" alt="QR Code">
                            </div>
                            <div class="product-content-right-bottom">
                                <div class="product-content-right-bottom-top">
                                    &#8744;
                                </div>
                                <div class="product-content-right-bottom-big">
                                    <div class="product-content-right-bottom-content-title row">
                                        <div class="product-content-right-bottom-content-title-item chitiet">
                                            <p>Mô tả sản phẩm</p>
                                        </div>
                                    </div>
                                    <div class="product-content-right-bottom-content">
                                        <div class="product-content-right-bottom-content-chitiet">
                                            <?= htmlspecialchars($mainImage['MotaSP']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-related container">
            <div class="product-related-title">
                <p>SẢN PHẨM LIÊN QUAN</p>
            </div>

            <div class="category-right-content row">
                <?php
                $listProduct = $models->listProduct();
                foreach ($listProduct as $pro) {
                ?>
                    <div class="category-right-content-item">
                        <a href="product.php?MaSP=<?= htmlspecialchars($pro['MaSP']) ?>" class="product-image-link">
                            <img src="../admin/uploads/<?= htmlspecialchars($pro['AnhSP']) ?>" alt="<?= htmlspecialchars($pro['TenSP']) ?>">
                        </a>
                        <h1><?= htmlspecialchars($pro['TenSP']) ?></h1>
                        <p><?= htmlspecialchars($pro['GiaSP']) ?><sup>đ</sup></p>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>

        <section class="app-container">
            <p>Tải ứng dụng King of Accessories</p>
            <div class="app-google">
                <img src="../images/Screenshot 2024-05-16 171642.png" alt="Google Play">
                <img src="../images/Screenshot 2024-05-16 171701.png" alt="App Store">
            </div>
            <p>Cảm ơn bạn đã quan tâm đến King of Accessories</p>
        </section>
    </main>

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const smallImages = document.querySelectorAll('.small-img');
            const mainImage = document.getElementById('mainImage');

            smallImages.forEach(img => {
                img.addEventListener('click', function() {
                    mainImage.src = this.src;

                    // Loại bỏ class 'active' từ tất cả ảnh nhỏ
                    smallImages.forEach(small => small.classList.remove('active'));

                    // Thêm class 'active' vào ảnh được chọn
                    this.classList.add('active');
                });
            });
        });
    </script>
    <script>
        const header = document.querySelector("header")
        window.addEventListener("scroll", function() {
            x = window.pageYOffset
            if (x > 0) {
                header.classList.add("sticky")
            } else {
                header.classList.remove("sticky")
            }
        })

        function changeImage(imageUrl) {
            const bigImage = document.querySelector('.product-content-left-big-img img');
            bigImage.src = imageUrl;
        }
    </script>
</body>

</html>