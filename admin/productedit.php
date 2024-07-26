<?php
include "header.php";
include "slider.php";
include "class/product_class.php";

$SanPham = new SanPham();
$MaSP = isset($_GET['MaSP']) ? $_GET['MaSP'] : null;

// Kiểm tra xem MaSP có tồn tại trong $_GET không
if ($MaSP) {
    $get_product = $SanPham->get_product($MaSP);
    if ($get_product) {
        $resultProductEdit = $get_product->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $TenSP = $_POST['TenSP'];
    $MaLoaiSP = $_POST['MaLoaiSP'];
    $MaDM = $_POST['MaDM'];
    $GiaSP = $_POST['GiaSP'];
    $SanPham->update_product($MaSP, $TenSP, $MaLoaiSP, $MaDM, $GiaSP);
}
?>

<div class="admin-content-right"> 
    <div class="admin-content-right-product_edit">
        <h1>Sửa Sản Phẩm</h1>
        <br>
        <form class="vertical-form" action="" method="POST">
            <?php if (isset($resultProductEdit)) { ?>
                <input required name="TenSP" type="text" placeholder="Nhập tên sản phẩm" value="<?php echo $resultProductEdit['TenSP'] ?>">

                <select name="MaDM" required>
                    <option value="">--Chọn danh mục--</option>
                    <?php
                    $show_cartegory = $SanPham->show_category();
                    if ($show_cartegory) {
                        while ($result = $show_cartegory->fetch_assoc()) {
                    ?>
                    <option <?php if ($resultProductEdit['MaDM'] == $result['MaDM']) echo "selected"; ?> value="<?php echo $result['MaDM'] ?>"><?php echo $result['TenDM'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <select name="MaLoaiSP" required>
                    <option value="">--Chọn loại sản phẩm--</option>
                    <?php
                    $show_brand = $SanPham->show_brand();
                    if ($show_brand) {
                        while ($result = $show_brand->fetch_assoc()) {
                    ?>
                    <option <?php if ($resultProductEdit['MaLoaiSP'] == $result['MaLoaiSP']) echo "selected"; ?> value="<?php echo $result['MaLoaiSP'] ?>"><?php echo $result['TenLoaiSP'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <input required name="GiaSP" type="text" placeholder="Nhập giá sản phẩm" value="<?php echo $resultProductEdit['GiaSP'] ?>">

                <button type="submit">Sửa</button>
            <?php } else { ?>
                <p>Không tìm thấy sản phẩm.</p>
            <?php } ?>
        </form>
    </div>
</div>
</section>
</body>
</html>
