<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$LoaiSP = new LoaiSP();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MaDM = $_POST['MaDM'];
    $TenLoaiSP = $_POST['TenLoaiSP'];
    $insert_brand = $LoaiSP -> insert_brand($MaDM,$TenLoaiSP);
}
?>
<style> 
    select{
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
                <h1>Thêm Loại Sản Phẩm</h1>
                <br>
                <form class="vertical-form" action="" method="POST">
                    <select name="MaDM" id="">
                        <option value="#">--Chọn danh mục</option>
                        <?php
                            $show_cartegory = $LoaiSP -> show_category();
                            if($show_cartegory) {
                                while($result= $show_cartegory-> fetch_assoc() ){
                        
                        ?>
                        <option value="<?php echo $result['MaDM'] ?>"><?php echo $result['TenDM'] ?></option>
                        <?php
                                }}
                        ?>
                              
                    </select>
                    <input required name="TenLoaiSP" type="text" placeholder="Nhập tên loại sản phẩm">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
