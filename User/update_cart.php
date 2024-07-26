<?php
include './headerUser.php';

$db = new Database(); // Khởi tạo đối tượng cơ sở dữ liệu
$cart = new CartModel(); // Khởi tạo đối tượng CartModel

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_quantity') {
    $cartId = $_POST['cart_id'];
    $newQuantity = $_POST['quantity'];

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    $result = $cart->updateCartQuantity($cartId, $newQuantity);

    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Số lượng đã được cập nhật.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Cập nhật không thành công']);
    }
}
