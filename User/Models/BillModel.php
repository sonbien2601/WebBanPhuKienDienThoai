<?php

class BillModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertDonHang($name, $sdt, $diaChi)
    {
        $query = "INSERT INTO donhang (name, sdt, diaChi) VALUES (?, ?, ?)";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("sss", $name, $sdt, $diaChi);

        if ($stmt->execute()) {
            return $stmt->insert_id;
        } else {
            return false;
        }
    }

    public function insertDonHangCT($id_dh, $giaSP, $soLuong, $id_sp)
    {
        $query = "INSERT INTO donhang_ct (id_dh, giaSP, soLuong, id_sp) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("idii", $id_dh, $giaSP, $soLuong, $id_sp);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }
}
