<?php
include './headerUser.php';
include "../admin/class/allclass.php";

$SanPham = new SanPham();
$ProductModel = new ProductModel();

if (isset($_GET['maDH'])) {
    $maDH = $_GET['maDH'];
    $donhang = $SanPham->donhangById($maDH);
    $trangThaiDonHang = $ProductModel->getOrderStatusHistory($maDH);
} else {
    // Xử lý khi không có maDH
    echo "Không tìm thấy đơn hàng";
    exit;
}
?>

<div class="admin-content-right">
    <h1>Trạng thái đơn hàng #<?php echo $maDH; ?></h1>
    <table>
        <tr>
            <th>Ngày cập nhật</th>
            <th>Trạng thái</th>
        </tr>
        <?php foreach ($trangThaiDonHang as $trangThai): ?>
        <tr>
            <td><?php echo $trangThai['ngayCapNhat']; ?></td>
            <td>
                <?php
                switch ($trangThai['trangThai']) {
                    case 1:
                        echo "Đang chuẩn bị hàng";
                        break;
                    case 2:
                        echo "Đang vận chuyển";
                        break;
                    case 3:
                        echo "Đang giao";
                        break;
                    case 4:
                        echo "Đã giao hàng";
                        break;
                    default:
                        echo "Không xác định";
                }
                ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>