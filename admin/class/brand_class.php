<?php
include "database.php";

class LoaiSP {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function insert_brand($MaDM, $TenLoaiSP) {
        $query = "INSERT INTO loaisp (MaDM, TenLoaiSP) VALUES ('$MaDM', '$TenLoaiSP')";
        $result = $this->db->insert($query);
        header('Location: brandlist.php');
        return $result;
    }

    public function show_category() {
        $query = "SELECT * FROM danhmucsp ORDER BY TenDM DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_brand() {
        $query = "SELECT loaisp.*, danhmucsp.TenDM
                  FROM loaisp 
                  INNER JOIN danhmucsp ON loaisp.MaDM = danhmucsp.MaDM
                  ORDER BY loaisp.TenLoaiSP DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_brand($MaLoaiSP) {
        $query = "SELECT * FROM loaisp WHERE MaLoaiSP = '$MaLoaiSP'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_brand($MaDM, $TenLoaiSP, $MaLoaiSP) {
        $query = "UPDATE loaisp SET TenLoaiSP = '$TenLoaiSP', MaDM = '$MaDM' WHERE MaLoaiSP = '$MaLoaiSP'";
        $result = $this->db->update($query);
        header('Location: brandlist.php');
        return $result;
    }

    public function delete_brand($MaLoaiSP) {
        $query = "DELETE FROM loaisp WHERE MaLoaiSP = '$MaLoaiSP'";
        $result = $this->db->delete($query);
        header('Location: brandlist.php');
        return $result;
    }
}

