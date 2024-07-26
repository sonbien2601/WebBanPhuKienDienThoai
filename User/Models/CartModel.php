<?php

class CartModel
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkCart($MaSP)
    {
        $query = "SELECT * FROM giohang WHERE MaSP = ?";
        $stmt = $this->db->link->prepare($query);

        $stmt->bind_param("i", $MaSP);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stmt->close();
            return $row;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function addToCart($MaSP, $AnhSP, $TenSP, $SoLuong, $GiaSP)
    {
        $query = "INSERT INTO giohang (`MaSP`, `AnhSP`, `TenSP`, `SoLuong`, `GiaSP`)
        VALUES ('$MaSP', '$AnhSP', '$TenSP', '$SoLuong', '$GiaSP')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function updateCart($soLuong, $MaSP)
    {
        $query = "UPDATE giohang SET SoLuong = SoLuong + $soLuong WHERE MaSP = $MaSP";
        $result = $this->db->update($query);
        return $result;
    }

    public function listCart()
    {
        $query = "SELECT * FROM giohang ORDER BY MaGH DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function deleteCart($MaGH)
    {
        $query = "DELETE FROM giohang WHERE MaGH = ?";

        $stmt = $this->db->link->prepare($query);

        $stmt->bind_param("i", $MaGH);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function countCart()
    {
        $query = "SELECT COUNT(*) as countGioHang FROM giohang";
        $result = $this->db->select($query);

        if ($result) {
            $count = $result->fetch_assoc()['countGioHang'];
            return $count;
        } else {
            return 0;
        }
    }
    public function updateCartQuantity($MaGH, $SoLuong)
    {
        $query = "UPDATE giohang SET SoLuong = ? WHERE MaGH = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("ii", $SoLuong, $MaGH);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    
}
