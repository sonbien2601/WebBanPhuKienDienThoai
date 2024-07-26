<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$SanPham = new SanPham();
$show_donHang = $SanPham->getListDonHang();
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách đơn hàng</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Ngày mua</th>
                <th>Trạng thái</th>
                <th>Tùy chỉnh</th>
            </tr>
            <?php
            if (!empty($show_donHang)) {
                foreach($show_donHang as $key => $result) {
                    ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $result['maDH'] ?></td>
                            <td><?php echo $result['name'] ?></td>
                            <td><?php echo $result['sdt'] ?></td>
                            <td><?php echo $result['diaChi'] ?></td>
                            <td><?php echo $result['ngayMua'] ?></td>
                            <td><?php 
                                if($result['trangThai'] == 0) {
                                    echo "Đã đặt hàng";
                                } else if ($result['trangThai'] == 1) {
                                    echo "Đang chuẩn bị hàng";
                                } else if ($result['trangThai'] == 2) {
                                    echo "Đang vận chuyển";
                                } else if ($result['trangThai'] == 3) {
                                    echo "Đang giao";
                                } else if ($result['trangThai'] == 4) {
                                    echo "Đã giao hàng";
                                }  else if ($result['trangThai'] == 5) {
                                    echo "Đã hủy";
                                }
                            ?></td>
                           <td>
                                <a href="donhangChiTiet.php?maDH=<?php echo $result['maDH'] ?>">Chi tiết</a> | 
                                <a href="donhangEdit.php?maDH=<?php echo $result['maDH'] ?>">Sửa</a>
                                <a href="donhangDelete.php?maDH=<?php echo $result['maDH'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</a>
                            </td>
                        </tr>
                    <?php
                }
            
            }
            ?>
        </table>
    </div>
</div>
</div>
</section>
</body>

</html>