<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>

<?php
$LoaiSP = new LoaiSP();
$MaLoaiSP = isset($_GET['MaLoaiSP']) ? $_GET['MaLoaiSP'] : null;

// Kiểm tra xem MaLoaiSP có tồn tại trong $_GET không
if ($MaLoaiSP) {
    $get_brand = $LoaiSP->get_brand($MaLoaiSP);
    if ($get_brand) {
        $resultBrandEdit = $get_brand->fetch_assoc();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaDM = $_POST['MaDM'];
    $TenLoaiSP = $_POST['TenLoaiSP'];
    $update_brand = $LoaiSP->update_brand($MaDM, $TenLoaiSP,$MaLoaiSP);
}
?>
<style> 
    select {
        height: 30px;
        width: 200px;
    }
    .vertical-form {
        display: flex;
        flex-direction: column;
        width: 200px;
    }
</style>
<div class="admin-content-right"> 
    <div class="admin-content-right-cartegory_add">
        <h1>Sửa Loại Sản Phẩm</h1>
        <br>
        <form class="vertical-form" action="" method="POST">
            <select name="MaDM" id="">
                <option value="#">--Chọn danh mục</option>
                <?php
                    $show_cartegory = $LoaiSP->show_category();
                    if ($show_cartegory) {
                        while ($result = $show_cartegory->fetch_assoc()) {
                ?>
                <option <?php if($resultBrandEdit['MaDM']==$result['MaDM']){echo "SELECTED";}?> value="<?php echo $result['MaDM'] ?>"><?php echo $result['TenDM'] ?></option>
                <?php
                        }
                    }
                ?>
            </select>
            <?php if (isset($resultBrandEdit)) { ?>
                <input required name="TenLoaiSP" type="text" placeholder="Nhập tên loại sản phẩm" value="<?php echo $resultBrandEdit['TenLoaiSP'] ?>">
            <?php } else { ?>
                <input required name="TenLoaiSP" type="text" placeholder="Nhập tên loại sản phẩm">
            <?php } ?>
            <button type="submit">Sửa</button>
        </form>
    </div>
</div>
</section>
</body>
</html>
