<?php
namespace App\Models;
use CodeIgniter\Model;

class M_prefix extends Model {
    protected $table = "prefix";
    protected $primaryKey = "prefix_id";

    // ดึงข้อมูลคำนำหน้าชื่อทั้งหมด
    public function get_all_prefix() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}