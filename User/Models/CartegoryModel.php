<?php
class CategoryModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_category($cartegory_name)
    {
        $query = "INSERT INTO danhmucsp (TenDM) VALUES ('$cartegory_name')";
        $result = $this->db->insert($query);
        header('Location:cartegorylist.php');
        return $result;
    }
    //hiển thị danh mục lên danh sách
    public function show_category()
    {
        $query = "SELECT * FROM danhmucsp ORDER BY TenDM DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_categoryChilds($MaDM)
    {
        $query = "SELECT * FROM loaisp WHERE MaDM = '$MaDM' ORDER BY MaLoaiSP DESC";
        $result = $this->db->select($query);
        return $result;
    }

    //lấy dữ liệu MaDM
    public function get_category($MaDM)
    {
        $query = "SELECT * FROM danhmucsp WHERE MaDM = '$MaDM'";
        $result = $this->db->select($query);
        return $result;
    }
    //sửa danh mục
    public function update_category($cartegory_name, $MaDM)
    {
        $query = "UPDATE danhmucsp SET TenDM = '$cartegory_name' where MaDM = '$MaDM' ";
        $result = $this->db->update($query);
        header('Location:cartegorylist.php');
        return $result;
    }
    //xóa danh mục
    public function delete_category($MaDM)
    {
        $query = "DELETE FROM danhmucsp where MaDM = '$MaDM' ";
        $result = $this->db->delete($query);
        header('Location:cartegorylist.php');
        return $result;
    }
    // Hiển thị chi sản phẩm trong category
    public function listProduct()
    {
        $query = "SELECT * FROM sanpham ORDER BY MaSP DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product($MaSP)
    {
        $query = "SELECT sanpham.*, loaisp.TenLoaiSP, danhmucsp.TenDM
                  FROM sanpham
                  INNER JOIN loaisp ON sanpham.MaLoaiSP = loaisp.MaLoaiSP
                  INNER JOIN danhmucsp ON sanpham.MaDM = danhmucsp.MaDM
                  WHERE sanpham.MaSP = '$MaSP'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_products_by_category($MaDM)
    {
        $query = "SELECT * FROM sanpham WHERE MaDM = '$MaDM' ORDER BY MaSP DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_type($MaLoaiSP) {
        $query = "SELECT * FROM LoaiSP WHERE MaLoaiSP = '$MaLoaiSP'";
        $result = $this->db->select($query);
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return false;
    }

    public function get_products_by_type($MaLoaiSP) {
        $query = "SELECT * FROM SanPham WHERE MaLoaiSP = '$MaLoaiSP'";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_products() {
        $query = "SELECT * FROM SanPham";
        $result = $this->db->select($query);
        return $result;
    }
}
