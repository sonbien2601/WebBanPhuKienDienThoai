<?php
include "class/brand_class.php";
$LoaiSP = new LoaiSP();
$MaLoaiSP = $_GET['MaLoaiSP'];
$delete_brand = $LoaiSP->delete_brand($MaLoaiSP);

?>