<?php
include "database.php";

class SanPham
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
//////////////////////////đơn hàng/////////////////////////////////////
    public function getListDonHang()
    {
        $query = "SELECT * FROM donhang ORDER BY maDH DESC";
        $result = $this->db->select($query);

        return $result;
    }

    public function donhangById($maDH)
    {
        $query = "SELECT * FROM donhang WHERE maDH = ?";
        $stmt = $this->db->link->prepare($query);

        $stmt->bind_param("i", $maDH);

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

    public function updateDh($trangThai, $maDH)
    {
        $query = "UPDATE donhang SET trangThai = $trangThai WHERE maDH = $maDH";
        $result = $this->db->update($query);
        return $result;
    }

    public function getListDonHangCT($id_dh)
    {
        $query = "SELECT dh.*, sp.TenSP, sp.AnhSP
                    FROM donhang_ct dh
                    INNER JOIN sanpham sp ON dh.id_sp = sp.MaSP
                    WHERE dh.id_dh = ?";
        $stmt = $this->db->link->prepare($query);
        $stmt->bind_param("i", $id_dh);
        $stmt->execute();
        $result = $stmt->get_result();

        $listDonHangCT = [];
        while ($row = $result->fetch_assoc()) {
            $listDonHangCT[] = $row;
        }

        return $listDonHangCT;
    }
    //xóa 1 sản phẩm trong đơn hàng đã chỉ định
    public function deleteDonHang($maDH) {
        return $this->db->delete("DELETE FROM donhang WHERE maDH = $maDH");
    }

////////////////////////////product///////////////////////////////////////////

    public function show_category()
    {
        $query = "SELECT * FROM danhmucsp ORDER BY TenDM DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_brand_ajax($MaDM)
    {
        $query = "SELECT * FROM loaisp WHERE MaDM = '$MaDM'";
        $result = $this->db->select($query);
        return $result;
    }
    ///Insert
    public function insert_product($data, $files)
    {
        $TenSP = $data['TenSP'];
        $MaDM = $data['MaDM'];
        $MaLoaiSP = $data['MaLoaiSP'];
        $GiaSP = $data['GiaSP'];
        $GiaKM = $data['GiaKM'];
        $MotaSP = $data['MotaSP'];
        $AnhSP = $files['AnhSP']['name'];
        $filetarget = basename($_FILES['AnhSP']['name']);
        $filetype = strtolower(pathinfo($AnhSP, PATHINFO_EXTENSION));
        $filesize = $files['AnhSP']['size'];
        if (file_exists("uploads/$filetarget")) {
            $alert = "File đã tồn tại";
            return $alert;
        } else {
            if ($filetype != "jpg" && $filetype != "jpeg"  && $filetype != "png") {
                $alert = "Chọn File jpg, jpeg, png";
                return $alert;
            } else {
                if ($filesize > 5000000) {
                    $alert = "File không được lớn hơn 5MB";
                    return $alert;
                } else {
                    move_uploaded_file($files['AnhSP']['tmp_name'], "uploads/" . $files['AnhSP']['name']);
                    $query = "INSERT INTO sanpham (
            TenSP, 
            MaDM, 
            MaLoaiSP, 
            GiaSP, 
            GiaKM, 
            MotaSP, 
            AnhSP) VALUES (
            '$TenSP', 
            '$MaDM', 
            '$MaLoaiSP', 
            '$GiaSP', 
            '$GiaKM', 
            '$MotaSP', 
            '$AnhSP')";
                    $result = $this->db->insert($query);

                    if ($result) {
                        // Lấy MaSP mới nhất
                        $query = "SELECT * FROM sanpham ORDER BY MaSP DESC LIMIT 1";
                        $result = $this->db->select($query)->fetch_assoc();
                        $MaSP = $result['MaSP'];
                        $filename = $files['AnhMoTa']['name'];

                        foreach ($filename as $key => $value) {
                            move_uploaded_file($files['AnhMoTa']['tmp_name'][$key], "uploads/" . $value);
                            $query = "INSERT INTO tbl_anhmota (MaSP, AnhMoTa) VALUES ('$MaSP', '$value')";
                            $this->db->insert($query);
                        }
                    }
                }
            }
        }
        return $result;
    }
    //show
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
    public function update_product($MaSP, $TenSP, $MaLoaiSP, $MaDM, $GiaSP)
    {
        $query = "UPDATE sanpham 
                  SET TenSP = '$TenSP', MaLoaiSP = '$MaLoaiSP', MaDM = '$MaDM', GiaSP = '$GiaSP'
                  WHERE MaSP = '$MaSP'";
        $result = $this->db->update($query);
        header('Location: productlist.php');
        return $result;
    }
    public function delete_product($MaSP)
    {
        $query = "DELETE FROM sanpham WHERE MaSP = '$MaSP'";
        $result = $this->db->delete($query);
        header('Location: productlist.php');
        return $result;
    }
    public function show_brand()
    {
        $query = "SELECT loaisp.*, danhmucsp.TenDM
                  FROM loaisp 
                  INNER JOIN danhmucsp ON loaisp.MaDM = danhmucsp.MaDM
                  ORDER BY loaisp.TenLoaiSP DESC";
        $result = $this->db->select($query);
        return $result;
    }
    
}
