<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php

$SanPham = new SanPham();
$donhangById = $SanPham->donhangById($_GET['maDH'] ?? 0);

// print_r($donhangById);
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $update_cartegory = $SanPham->updateDh($_POST['trangThai'], $_GET['maDH']);
    echo "<script>window.location.href='./donhang.php'</script>";
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Cập nhật trạng thái đơn hàng</h1>
        <form action="" method="POST">
            <div>
                <select style="height: 40px; outline: none; " name="trangThai" id="">
                    <option value="1" <?= $donhangById['trangThai'] == 1 ? 'selected' : '' ?>>Đang chuẩn bị hàng</option>
                    <option value="2" <?= $donhangById['trangThai'] == 2 ? 'selected' : '' ?>>Đang vận chuyển</option>
                    <option value="3" <?= $donhangById['trangThai'] == 3 ? 'selected' : '' ?>>Đang giao</option>
                    <option value="4" <?= $donhangById['trangThai'] == 4 ? 'selected' : '' ?>>Đã giao hàng</option>
                </select><br><br>
                <button type="submit">Sửa</button>
            </div>
        </form>
    </div>
</div>

</section>
</body>

</html>