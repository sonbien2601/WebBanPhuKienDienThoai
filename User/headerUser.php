<?php
include "../connect/connect.php";
include "./Models/CartegoryModel.php";
include "./Models/ProductModel.php";
include "./Models/CartModel.php";
include "./Models/BillModel.php";
include "./Models/IndexModel.php";
$models = new CategoryModel();
$show_cartegory = $models->show_category(); // Lấy danh mục từ CSDL
$cart = new CartModel();
$bill = new BillModel();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <title>Web bán phụ kiện</title>
</head>

<body>
    <header>
        <div class="logo">
            <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkllUaHlFJ7lqCbmsN_Vzf3JUHTJ8tbFAdEmazozJ9bw&s" > -->
        </div>
        <div class="menu">
            <?php
            if ($show_cartegory) {
                while ($result = $show_cartegory->fetch_assoc()) {
                    $MaDM = $result['MaDM'];
                    $TenDM = $result['TenDM'];
                    $loaiSp = $models->show_categoryChilds($MaDM);
            ?>
                    <li>
                        <a href="category.php?MaDM=<?= $MaDM ?>"><?= $TenDM ?></a>
                        <ul class="sub-menu">
                            <?php
                            foreach ($loaiSp as $item) {
                            ?>
                                <li><a href=""><?= $item['TenLoaiSP'] ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
            <?php
                }
            }
            ?>
        </div>
        <div class="others">
            <li><input placeholder="Tìm kiếm" type="text"><i class="fas fa-search"></i></li>
            <li> <a class="fa fa-paw" href="http://localhost/codepm/user/cartegory.php"></a></li>
            <li> <a class="fa fa-user" href="http://localhost/codepm/user/login.php"></a></li>
            <li> <a class="fa fa-shopping-bag" href="http://localhost/codepm/user/cart.php"></a></li>
        </div>
    </header>