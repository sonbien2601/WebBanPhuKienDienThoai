<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$SanPham = new SanPham();
$show_donHang = $SanPham->getListDonHangCT($_GET['maDH']);

// print_r($show_donHang);
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_list">
        <h1>Danh sách đơn hàng</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
            <?php
            if (!empty($show_donHang)) {
                foreach($show_donHang as $key => $result) {
                    $tong = $result['giaSP'] * $result['soLuong'];
                    ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><img src="./uploads/<?php echo $result['AnhSP'] ?>" width="100px" alt=""></td>
                            <td><?php echo $result['TenSP'] ?></td>
                            <td><?php echo $result['giaSP'] ?></td>
                            <td><?php echo $result['soLuong'] ?></td>
                            <td>
                                <?= number_format((float)$tong) ?> đ
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