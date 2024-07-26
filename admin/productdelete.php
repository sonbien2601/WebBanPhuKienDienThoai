<?php
include "class/product_class.php";
$SanPham = new SanPham();
$MaSP = $_GET['MaSP'];

if (isset($MaSP)) {
    $delete_product = $SanPham->delete_product($MaSP);
}
