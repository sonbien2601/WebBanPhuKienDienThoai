<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory-> show_category();
?>
<div class="admin-content-right">
<div class="admin-content-right-cartegory_list">
                <h1>Danh sách danh mục</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Danh mục</th>
                            <th>Tùy chỉnh</th>
                        </tr>
                        <?php
                        if($show_cartegory){$i=0;
                            while($result = $show_cartegory->fetch_assoc() ){$i++
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $result['MaDM']?></td>
                            <td><?php echo $result['TenDM']?></td>
                            <td>
                                <a href="cartegoryedit.php?MaDM=<?php echo $result['MaDM'] ?>">Sửa</a>| 
                                <a href="cartegorydelete.php?MaDM=<?php echo $result['MaDM'] ?>">Xóa</a></td>
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
