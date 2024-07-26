<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$LoaiSP = new LoaiSP();
$show_brand = $LoaiSP-> show_brand();
?>
<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
                <h1>Danh sách danh mục</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Mã danh mục sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                        <?php
                        if($show_brand){$i=0;
                            while($result = $show_brand->fetch_assoc() ){$i++
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['MaLoaiSP']?></td>
                            <td><?php echo $result['TenLoaiSP']?></td>
                            <td><?php echo $result['MaDM']?></td>
                            <td><?php echo $result['TenDM']?></td>
                            <td>
                                <a href="brandedit.php?MaLoaiSP=<?php echo $result['MaLoaiSP'] ?>">Sửa</a>| 
                                <a href="branddelete.php?MaLoaiSP=<?php echo $result['MaLoaiSP'] ?>">Xóa</a>
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
