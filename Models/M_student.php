<?php
namespace App\Models;
use CodeIgniter\Model;

class M_student extends Model {
    protected $table = "student";
    protected $primaryKey = "student_id";

    // ดึงข้อมูลนักเรียนทั้งหมด
    public function get_all_student() {
        $sql = "SELECT * FROM $this->table
                    LEFT JOIN prefix ON prefix_id = student_prefix_id
                    LEFT JOIN cluster ON cluster_id = student_cluster_id";
        return $this->db->query($sql)->getResult();
    }

    // ดึงข้อมูลนักเรียน ตาม student_id
    public function get_student_by_id($student_id) {
        $sql = "SELECT * FROM $this->table
                    LEFT JOIN prefix ON prefix_id = student_prefix_id
                    LEFT JOIN cluster ON cluster_id = student_cluster_id
                    WHERE student_id = '$student_id'";
        return $this->db->query($sql)->getRow();
    }

    // ดึงข้อมูล student_id ล่าสุด
    public function get_last_student_id() {
        $sql = "SELECT MAX(student_id) AS student_id FROM $this->table";
        return $this->db->query($sql)->getRow();
    }

    // เพิ่มข้อมูลนักเรียน
    public function insert_student($student_number, $student_prefix_id, $student_firstname, $student_lastname, $student_birthdate, $student_mail, $student_address, $student_year, $student_cluster_id, $student_image_name, $student_pdf_name) {
        $sql = "INSERT INTO $this->table VALUES(NULL, '$student_number', '$student_prefix_id', '$student_firstname', '$student_lastname', '$student_birthdate', '$student_mail', '$student_address', '$student_year', '$student_cluster_id', '$student_image_name', '$student_pdf_name')";
        
        $this->db->query($sql);
    }

    // แก้ไขข้อมูลนักเรียน
    public function update_student ($student_id, $student_number, $student_prefix_id, $student_firstname, $student_lastname, $student_birthdate, $student_mail, $student_address, $student_year, $student_cluster_id, $student_image_name, $student_pdf_name) {
        
        $sql = "UPDATE $this->table
                    SET student_number = '$student_number',
                    student_prefix_id = '$student_prefix_id',
                    student_firstname = '$student_firstname',
                    student_lastname = '$student_lastname',
                    student_birthdate = '$student_birthdate',
                    student_mail = '$student_mail',
                    student_address = '$student_address',
                    student_year = '$student_year',
                    student_cluster_id = '$student_cluster_id'";

        if ($student_image_name != NULL) {
            $sql .= ",student_image_name = '$student_image_name'";
        }
        if ($student_pdf_name != NULL) {
            $sql .= ",student_pdf_name = '$student_pdf_name'";
        }
        $sql .= " WHERE student_id = '$student_id'";
        
        // echo $sql;
        $this->db->query($sql);
    }

    // ลบข้อมูลนักเรียน
    public function delete_student($student_id) {
        $sql = "DELETE FROM $this->table WHERE student_id = '$student_id'";
        $this->db->query($sql);
    }
}