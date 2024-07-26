<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$SanPham = new SanPham();
$show_product = $SanPham-> show_product();
?>

<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
    <h1>Danh sách sản phẩm</h1>
    <table>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm</th>
            <th>Mã danh mục sản phẩm</th>
            <th>Tên danh mục</th>
            <th>Tùy chỉnh</th>
        </tr>
        <?php
        if ($show_product) {
            $i = 0;
            while ($result = $show_product->fetch_assoc()) {
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $result['MaSP'] ?></td>
            <td><?php echo $result['TenSP'] ?></td>
            <td><?php echo $result['MaLoaiSP'] ?></td>
            <td><?php echo $result['TenLoaiSP'] ?></td>
            <td><?php echo $result['MaDM'] ?></td>
            <td><?php echo $result['TenDM'] ?></td>
            <td>
                <a href="productedit.php?MaSP=<?php echo $result['MaSP'] ?>">Sửa</a> | 
                <a href="productdelete.php?MaSP=<?php echo $result['MaSP'] ?>">Xóa</a>
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
