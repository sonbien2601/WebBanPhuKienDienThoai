<?php
include './headerUser.php';
?>
<!-- -----------------------CART---------------------------------------------- -->
<section class="cart">
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        $listCart = $cart->listCart();

        if (!empty($listCart)) {
        ?>
            <div class="cart-content row">
                <div class="cart-content-left">

                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>SL</th>
                            <th>Thành tiến</th>
                            <th>Xóa</th>
                        </tr>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_cart'])) {
                            $cart->deleteCart($_GET['id_cart']);
                            echo "<script>window.location.href='cart.php'</script>";
                        }


                        $tong = 0;
                        $thanhtien = 0;
                        foreach ($listCart as $key => $item) {
                            $tong = $item['SoLuong'] * $item['GiaSP'];
                            $thanhtien += $tong;
                        ?>
                            <tr>
                                <td>
                                    <?= $key + 1 ?>
                                </td>
                                <td><img width="120px" src="../admin/uploads/<?= $item['AnhSP'] ?>" alt=""></td>
                                <td>
                                    <p><?= $item['TenSP'] ?></p>
                                </td>

                                <td><input type="number" id="quantity_<?= $item['MaGH'] ?>" value="<?= $item['SoLuong'] ?>" min="1" max="100"></td>
                                <td>
                                    <p id="thanhtien_<?= $item['MaGH'] ?>"><?= number_format((float)$tong) ?><sup>đ</sup></p>
                                </td>
                                <td>
                                    <button onclick="confirmDelete(<?= $item['MaGH'] ?>)">Xóa</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="cart-content-right-button">
                        <button><a href="./cart.php">CẬP NHẬT GIỎ HÀNG</a></button>
                    </div>
                    </style>
                    <script>
                        function confirmDelete(id_cart) {
                            if (confirm('Bạn có muốn xóa sản phẩm này không?')) {
                                window.location.href = 'cart.php?action=delete&id_cart=' + id_cart;
                            }
                        }
                    </script>
                    <br>
                </div>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $idDH = $bill->insertDonHang(
                        $_POST['name'],
                        $_POST['sdt'],
                        $_POST['diaChi']
                    );

                    foreach ($listCart as $cartItem) {
                        $bill->insertDonHangCT(
                            $idDH,
                            $cartItem['GiaSP'],
                            $cartItem['SoLuong'],
                            $cartItem['MaSP']
                        );

                        $cart->deleteCart($cartItem['MaGH']);
                    }

                    echo "<script>window.location.href='./camon.php'</script>";
                }
                ?>
                <form action="" method="post">
                    <div class="cart-content-right">
                        <table>
                            <h3 style="margin-bottom: 20px;">THÔNG TIN NHẬN HÀNG</h3>
                            <tr>
                                Tên người nhận: <br>
                                <input type="text" name="name" class="ip-tt" placeholder="Nhập tên người nhận..."><br><br>
                                Số điện thoại: <br>
                                <input type="text" name="sdt" class="ip-tt" placeholder="Nhập số điện thoại..."><br><br>
                                Địa chỉ: <br>
                                <input type="text" name="diaChi" class="ip-tt" placeholder="Nhập địa chỉ...">
                            </tr>
                        </table>
                        <table style="margin-top: 20px;">
                            <tr>
                                <th colspan="2">
                                    <h2>TỔNG TIỀN GIỎ HÀNG</h2>
                                </th>
                            </tr>
                            <tr>
                                <td>TỔNG SẢN PHẨM</td>
                                <td><?= $cart->countCart() ?></td>
                            </tr>
                            <tr>
                                <td>THÀNH TIỀN</td>
                                <td>
                                    <p><?= number_format((float)$thanhtien) ?><sup>đ</sup></p>
                                </td>
                            </tr>
                        </table>
                        <div class="cart-content-right-text">
                            <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p><br>
                            <div class="cart-content-right-button">
                                <a href="./cartegory.php" class="btn-primary">TIẾP TỤC MUA SẮM</a>
                                <form action="" method="post">
                                    <button type="submit">THANH TOÁN</button>
                                </form>
                            </div>
                            <div class="cart-content-right-dangnhap">
                                <p>TÀI KHOẢN KING OF MOBILE</p> <br>
                                <p>Hãy <a href="./login.php">đăng nhập</a> tài khoản của bạn để tích điểm thành viên.</p>
                            </div>
                        </div>
                </form>
            </div>
        <?php
        } else {
        ?>
            <div style="display: flex; justify-content: center; align-items: center;">
                <div style="display: flex; flex-direction: column;">
                    <h3>Giỏ hàng đang trống</h3>
                    <a href="./product.php" class="btnMuaHang">
                        Mua hàng
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <!-- end container -->
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="number"]').on('change', function() {
            var cartId = $(this).attr('id').split('_')[1];
            var newQuantity = $(this).val();

            $.ajax({
                url: 'update_cart.php',
                method: 'POST',
                data: {
                    action: 'update_quantity',
                    cart_id: cartId,
                    quantity: newQuantity
                },
                success: function(response) {
                    // Tải lại trang hoặc cập nhật tổng tiền
                    location.reload();
                }
            });
        });
    });
</script>

<!-- ------------app-container--------- -->
<section class="app-container">
    <p>Tải ứng dụng King of Accessories</p>
    <div class="app-google">
        <img src="../images/Screenshot 2024-05-16 171642.png">
        <img src="../images/Screenshot 2024-05-16 171701.png">
    </div>
    <p>Cảm ơn bạn đã quan tâm đến King of Accessories</p>
</section>
<!-- ------------footer--------- -->
<div class="footer-top">
    <li><a href=""><img src="../images/logoSaleNoti.png" alt="Logo"></a></li>
    <li><a href=""></a>Liên hệ</li>
    <li><a href=""></a>Tuyển dụng</li>
    <li><a href=""></a>Giới thiệu</li>
    <li>
        <a href="" class="fab fa-facebook"></a>
        <a href="" class="fab fa-twitter"></a>
        <a href="" class="fab fa-youtube"></a>
    </li>
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
<script src="js/script.js"></script><!-- javascrip cho category khi ấn vào 1 mục nào đó sẽ đổ xuống -->
<script>
    // javascript
    const header = document.querySelector("header")
    window.addEventListener("scroll", function() {
        x = window.pageYOffset
        if (x > 0) {
            header.classList.add("sticky")
        } else {
            header.classList.remove("sticky")
        }
    })
</script>

</html>