<?php
namespace App\Models;
use CodeIgniter\Model;

class M_cluster extends Model {
    protected $table = "cluster";
    protected $primaryKey = "cluster_id";

    // ดึงข้อมูลมกุลทั้งหมด
    public function get_all_cluster() {
        $sql = "SELECT * FROM $this->table";
        return $this->db->query($sql)->getResult();
    }
}