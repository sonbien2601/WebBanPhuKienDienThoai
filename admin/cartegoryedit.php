<?php
include "header.php";
include "slider.php";
include "class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;

if (!isset($_GET['MaDM']) || $_GET['MaDM'] == '') {
    echo "<script>window.location = 'cartegorylist.php';</script>";
    exit; // Exit to prevent further execution
} else {
    $MaDM = $_GET['MaDM'];
}

$get_cartegory = $cartegory->get_category($MaDM);

$result = null; // Khởi tạo biến $result để tránh lỗi undefined

if ($get_cartegory) {
    $result = $get_cartegory->fetch_assoc(); // Lấy dữ liệu danh mục từ cơ sở dữ liệu
}

?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_name = $_POST['cartegory_name'];
    $update_cartegory = $cartegory->update_category($cartegory_name, $MaDM);
}
?>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Sửa danh mục</h1>
        <form action="" method="POST">
            <input required name="cartegory_name" type="text" placeholder="Nhập tên danh mục" value="<?php echo isset($result['TenDM']) ? $result['TenDM'] : ''; ?>"> <!-- Đưa dữ liệu vào input -->
            <button type="submit">Lưu</button>
        </form>
    </div>
</div>

</section>
</body>

</html>