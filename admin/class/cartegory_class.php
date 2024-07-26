<?php
include "../admin/database.php";
?>
<?php

class cartegory {
    private $db;
    public function __construct() {
        $this->db = new Database() ;
}
public function insert_category($cartegory_name)  {
    $query = "INSERT INTO danhmucsp (TenDM) VALUES ('$cartegory_name')";
    $result = $this->db->insert($query) ;
    header('Location:cartegorylist.php');
    return $result ;
}
//hiển thị danh mục lên danh sách
public function show_category(){
    $query = "SELECT * FROM danhmucsp ORDER BY TenDM DESC";
    $result = $this->db->select($query) ;
    return $result ;
}
//lấy dữ liệu MaDM
public function get_category($MaDM) {
    $query = "SELECT * FROM danhmucsp where MaDM = '$MaDM'";
    $result = $this->db->select($query) ;
    return $result ;
}
//sửa danh mục
public function update_category($cartegory_name,$MaDM) {
    $query = "UPDATE danhmucsp SET TenDM = '$cartegory_name' where MaDM = '$MaDM' ";
    $result = $this->db->update($query) ;
    header('Location:cartegorylist.php');
    return $result ;
}
//xóa danh mục
public function delete_category($MaDM) {
    $query = "DELETE FROM danhmucsp where MaDM = '$MaDM' ";
    $result = $this->db->delete($query) ;
    header('Location:cartegorylist.php');
    return $result ;
}
}
?>