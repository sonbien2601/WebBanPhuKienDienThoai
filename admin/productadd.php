<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php 
$SanPham = new SanPham();
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST,$_FILES);
    // echo '<pre>';
    // echo print_r($_FILES['AnhMoTa']['name']);
    // echo '</pre>';
    // echo '<pre>';
    // echo print_r($_FILES);
    // echo '</pre>';

    $insert_product = $SanPham -> insert_product($_POST,$_FILES);
}
?>
<div class="admin-content-right">
<div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="TenSP" required type="text" placeholder="Nhập tên sản phẩm">
                    <label for="">Chọn danh mục <span style="color: red;">*</span></label>
                    <select name="MaDM" id="MaDM">
                        <option value="#">--Chọn--</option>
                        <?php 
                            $show_cartegory = $SanPham -> show_category();    
                            if($show_cartegory){
                                while($result= $show_cartegory -> fetch_assoc()) {
                            
                        ?> 
                        <option value="<?php echo $result['MaDM'] ?>"><?php echo $result['TenDM'] ?></option>
                        <?php 
                            }} 
                        ?> 
                    </select>
                    <label for="">--Chọn--<span style="color: red;">*</span></label>
                    <select name="MaLoaiSP" id="MaLoaiSP">
                        <option value="#">--Chọn loại sản phẩm</option>
                         
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="GiaSP" required type="text">
                    <label for="">Giá khuyến mãi<span style="color: red;">*</span></label>
                    <input name="GiaKM" required type="text">
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea required name="MotaSP" id="editor2" cols="30" rows="10"></textarea>
                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <span style="color:red"><?php if (isset($insert_product)){
                        echo ($insert_product);
                    } ?></span>
                    <input name="AnhSP" required type="file">
                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="AnhMoTa[]" multiple type="file">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
<script>
    CKEDITOR.replace('editor2');
</script>
<script>
        $(document).ready(function() {
            $("#MaDM").change(function() {
                var x = $(this).val();
                $.get("productadd_ajax.php", { MaDM: x }, function(data) {
                    $("#MaLoaiSP").html(data);
                });
            });
        });
    </script>
</html>
