<?php
include "class/cartegory_class.php";
$cartegory = new cartegory;
?>
<?php
if(!isset($_GET['MaDM']) || $_GET['MaDM'] == '') {
    echo "<script>window.location = 'cartegorylist.php';</script>";
    exit; // Exit to prevent further execution
} else {
    $MaDM = $_GET['MaDM'];
}

$delete_cartegory = $cartegory->delete_category($MaDM);

$result = null; // Khởi tạo biến $result để tránh lỗi undefined

if ($delete_cartegory) {
    $result = $delete_cartegory->fetch_assoc(); // Lấy dữ liệu danh mục từ cơ sở dữ liệu
}
?>