<?php

class IndexModel {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function show_Anhhome($MaSP)
    {
        $query = "SELECT * FROM sanpham WHERE MaSP = '$MaSP'";
        $result = $this->db->select($query);
        return $result;
    }
}