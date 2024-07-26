
<?php
include "class/product_class.php";
$SanPham = new SanPham() ;

$MaDM = $_GET['MaDM']
?>

    <?php 
    $show_brand_ajax = $SanPham -> show_brand_ajax($MaDM);    
    if($show_brand_ajax){
         while($result= $show_brand_ajax -> fetch_assoc()) {
    ?> 
        <option value="<?php echo $result['MaLoaiSP'] ?>"><?php echo $result['TenLoaiSP'] ?></option>
    <?php 
            }} 
    ?>