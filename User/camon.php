<?php
include "headerUser.php";
?>
<!-- -----------------------CART---------------------------------------------- -->
<section class="cart" style="padding-top: 100px">
    <div class="container">
        <div style="display: flex; justify-content: center; align-items: center;">
            <div style="display: flex; flex-direction: column; padding-top: 100px">
                <h3>Cảm ơn bạn đã mua hàng</h3>
                <a href="./product.php" class="btnMuaHang">
                    Tiếp tục mua hàng
                </a>
                <a href="./product_status.php" class="btnMuaHang">
                    Xem trạng thái đơn hàng
                </a>
            </div>
        </div>
    </div>
    <!-- end container -->
</section>

<!-- ------------app-container--------- -->
<section class="app-container">
    <p>Tải ứng dụng King of Accessories</p>
    <div class="app-google">
        <img src="../images/Screenshot 2024-05-16 171642.png">
        <img src="../images/Screenshot 2024-05-16 171701.png">
    </div>
    <p>Nhận bản tin của King of Accessories</p>
    <input type="text" placeholder="Nhập email của bạn...">
</section>

<!-- ------------footer--------- -->
<div class="footer-top">
    <li><a href=""><img src="images/logoSaleNoti.png" alt=""></a></li>
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

<script src="js/script.js"></script>
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
</script>

</html>