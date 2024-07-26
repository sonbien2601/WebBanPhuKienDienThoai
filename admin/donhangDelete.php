<?php
include "header.php";
include "slider.php";
include "class/product_class.php";

if(isset($_GET['maDH'])) {
    $maDH = $_GET['maDH'];
    $SanPham = new SanPham();
    
    if($SanPham->deleteDonHang($maDH)) {
        echo "<script>alert('Xóa đơn hàng thành công'); window.location.href='donhang.php';</script>";
    } else {
        echo "<script>alert('Xóa đơn hàng thất bại'); window.location.href='donhang.php';</script>";
    }
} else {
    echo "<script>window.location.href='./admin/donhang.php';</script>";
}