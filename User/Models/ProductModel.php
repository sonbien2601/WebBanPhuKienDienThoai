<?php

class ProductModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

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
    public function show_product()
    {
        $query = "SELECT sanpham.MaSP, sanpham.TenSP, sanpham.MaDM, sanpham.MaLoaiSP, loaisp.TenLoaiSP, danhmucsp.TenDM
                  FROM sanpham
                  INNER JOIN loaisp ON sanpham.MaLoaiSP = loaisp.MaLoaiSP
                  INNER JOIN danhmucsp ON sanpham.MaDM = danhmucsp.MaDM
                  ORDER BY sanpham.TenSP DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_AnhDaiDien($MaSP)
    {
        $query = "SELECT * FROM sanpham WHERE MaSP = '$MaSP'";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_productChilds($MaSP) {
        $query = "SELECT s.*, t.AnhMoTa 
                  FROM sanpham s 
                  LEFT JOIN tbl_anhmota t ON s.MaSP = t.MaSP 
                  WHERE s.MaSP = '$MaSP'";
        $result = $this->db->select($query);
        return $result;
    }
    public function updateOrderStatus($maDH, $trangThai) {
        $query = "INSERT INTO TrangThaiDonHang (maDH, trangThai) VALUES (?, ?)";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("ii", $maDH, $trangThai);
        return $stmt->execute();
    }
    public function updateDh($trangThai, $maDH) {
        $query = "UPDATE DonHang SET trangThai = ? WHERE maDH = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("ii", $trangThai, $maDH);
        $result = $stmt->execute();
        
        if ($result) {
            $productModel = new ProductModel();
            $productModel->updateOrderStatus($maDH, $trangThai);
        }
        
        return $result;
    }

    public function getOrderStatusHistory($maDH) {
        $query = "SELECT * FROM TrangThaiDonHang WHERE maDH = ? ORDER BY ngayCapNhat DESC";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("i", $maDH);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
