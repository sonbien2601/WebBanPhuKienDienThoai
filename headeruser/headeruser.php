<?php
// ... (các phần include và khởi tạo $cartegory như trước)
include "class/cartegory_class.php";
$show_cartegory = $cartegory->show_category(); // Lấy danh mục từ CSDL
?>

<div class="menu">
    <?php
    if ($show_cartegory) {
        while ($result = $show_cartegory->fetch_assoc()) {
            echo '<li><a href="#">' . $result['TenDM'] . '</a></li>';
        }
    }
    ?>
</div>