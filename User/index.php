<?php include './headerUser.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Web bán phụ kiện </title>
</head>

<body>
    <section id="Slider">
        <div class="aspect-ratio-169">
            <a href="./cartegory.php">
                <img src="https://phongvu.vn/cong-nghe/wp-content/uploads/sites/2/2020/08/Gearvn_b%C3%A0n-ph%C3%ADm-c%C6%A1_-27.jpg" alt="">
                <img src="https://i.pinimg.com/originals/2b/fa/52/2bfa52530ebf4bc9d3575f3a254f81f8.jpg" alt="">
                <img src="https://cdn.tgdd.vn//GameApp/-1//maytinh-12-800x450-37.jpg" alt="">
                <img src="https://didongviet.vn/dchannel/wp-content/uploads/2020/04/cover-iphone12-didongviet.jpg" alt="">
                <img src="https://images.unsplash.com/photo-1611604548018-d56bbd85d681?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </a>

        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
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
</body>
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



    // cái này là để cho chạy slide hình
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let index = 0;
    let imgNumber = imgPosition.length
    //console.log(imgPosition)
    imgPosition.forEach(function(image, index) {
        image.style.left = index * 100 + "%"
        dotItem[index].addEventListener("click", function() {
            slider(index)
        })
    })

    function imgSlide() {
        index++; // tăng lên thêm 1 đơn vị để theo dõi ảnh 
        console.log(index)
        if (index >= imgNumber) // cái này điều kiện kiểm tra số index vượt quá số lượng hình ảnh chưa nếu vượt thì trả về 0 là vị trí của ảnh thứ 1
            index = 0
        slider(index)
    }

    function slider(index) {
        imgContainer.style.left = "-" + index * 100 + "%"
        // cái này là tăng vị trí của hình lên khi chạy về bên trái slide
        //  Mỗi hình ảnh được coi là chiếm 100% kích thước của bộ chứa, nên di chuyển -index * 100% sẽ đưa hình ảnh tiếp theo vào trong khung nhìn.
        const dotActive = document.querySelector('.active')
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }

    setInterval(imgSlide, 5000) // sau mỗi 5 giây thì đổi hình
</script>

</html>