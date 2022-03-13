<?php
namespace App\Models;
use CodeIgniter\Model;

class M_student_skills extends Model {
    protected $table = "student_skills";
    protected $primaryKey = "student_skills_id";

    // เพิ่มทักษะของนักเรียน
    public function insert_student_skills($student_id, $skill_name) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$student_id', '$skill_name')";
        $this->db->query($sql);
    }

    // ดึงข้อมูลทักษะของนักเรียน
    public function get_by_student_id($student_id) {
        $sql = "SELECT * FROM $this->table WHERE student_id = '$student_id'";
        return $this->db->query($sql)->getResult();
    }

    // ลบทักษะของนักเรียน
    public function delete_by_student_id($student_id) {
        $sql = "DELETE FROM $this->table WHERE student_id = '$student_id'";
        $this->db->query($sql);
    }
}