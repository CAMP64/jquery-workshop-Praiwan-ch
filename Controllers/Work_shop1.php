<?php
namespace App\Controllers;
use App\Models\M_cluster;
use App\Models\M_prefix;
use App\Models\M_student;
use App\Models\M_student_skills;

class Work_shop1 extends BaseController {
    // แสดงหน้าจอเพิ่มนักเรียน
    public function show_input() {
        // ดึงข้อมูลคำนำหน้าชื่อ
        $m_pref = new M_prefix();
        $data['opt_prefix'] = $m_pref->get_all_prefix();

        // ดึงข้อมูลมกุล
        $m_clus = new M_cluster();
        $data['opt_cluster'] = $m_clus->get_all_cluster();

        // แสดงหน้าจอเพิ่มข้อมูลนักเรียน
        echo view('v_show_input', $data);
    }

    // เพิ่มนักเรียน
    public function insert_student() {
        $student_prefix_id = $this->request->getPost('student_prefix_id');
        $student_number = $this->request->getPost('student_number');
        $student_firstname = $this->request->getPost('student_firstname');
        $student_lastname = $this->request->getPost('student_lastname');
        $student_birthdate = $this->request->getPost('student_birthdate');
        $student_mail = $this->request->getPost('student_mail');
        $student_year = $this->request->getPost('student_year');
        $student_cluster_id = $this->request->getPost('student_cluster_id');
        $student_skills = $this->request->getPost('student_skills');
        $student_address = $this->request->getPost('student_address');
        
        $file = $this->request->getFile('student_image_name');
        if($file->isValid()){
            $image_name = $file->getRandomName();
            $file->move('./picture',$image_name);
        }
        $student_image_name = $image_name;

        
        $file = $this->request->getFile('student_pdf_name');
        if($file->isValid()){
            $pdf_name = $file->getRandomName();
            $file->move('./file',$pdf_name);
        }
        $student_pdf_name = $pdf_name;

        // เพิ่มข้อมูลนักเรียน
        $m_stud = new M_student();
        $m_stud->insert_student($student_number, $student_prefix_id, $student_firstname, $student_lastname, $student_birthdate, $student_mail, $student_address, $student_year, $student_cluster_id, $student_image_name, $student_pdf_name);

        // เพิ่มทักษะของนักเรียน
        if ($student_skills != NULL) {
            $obj_student = $this->get_last_student_id();
            $this->insert_student_skills($obj_student->student_id, $student_skills);
        }

        // แสดงหน้าจอรายการนักเรียน
        return redirect()->to(base_url() . "/Work_shop1/show_all");
    }

    // ดึงข้อมูล student id ล่าสุด
    public function get_last_student_id() {
        $m_stud = new M_student();
        return $m_stud->get_last_student_id();
    }

    // เพิ่มทักษะของนักเรียน
    public function insert_student_skills($student_id, $arr_student_skills) {
        $m_stus = new M_student_skills();
        for($i = 0; $i < count($arr_student_skills); $i++) {
            $m_stus->insert_student_skills($student_id, $arr_student_skills[$i]);
        }
    }

    // แสดงหน้าจอรายการนักเรียน
    public function show_all() {
        $m_stud = new M_student();
        $data["arr_student"] = $m_stud->get_all_student();
        
        echo view("v_show_list", $data);
    }

    // ลบข้อมูลนักเรียน
    public function delete_student($student_id) {
        $m_stud = new M_student();
        $obj_student = $m_stud->get_student_by_id($student_id);
        
        // ลบภาพ และไฟล์ของนักเรียน
        unlink('./picture/' . $obj_student->student_image_name);
        unlink('./file/' . $obj_student->student_pdf_name);

        $m_stud->delete_student($student_id);
        return redirect()->to(base_url() . "/Work_shop1/show_all");
    }

    // แสดงหน้าจอแก้ไขข้อมูลนักเรียน
    public function edit_student($student_id) {
        // ดึงข้อมูลคำนำหน้าชื่อ
        $m_pref = new M_prefix();
        $data['opt_prefix'] = $m_pref->get_all_prefix();

        // ดึงข้อมูลมกุล
        $m_clus = new M_cluster();
        $data['opt_cluster'] = $m_clus->get_all_cluster();

        $m_stud = new M_student();
        $data['obj_student'] = $m_stud->get_student_by_id($student_id);

        $m_stus = new M_student_skills();
        $data['arr_skills'] = $m_stus->get_by_student_id($student_id);
        
        $data['skills'] = array();
        for($i = 0; $i < count($data['arr_skills']); $i++) {
            array_push($data['skills'], $data['arr_skills'][$i]->skill_name);
        }

        echo view('v_show_edit', $data);
    }

    // แก้ไขข้อมูลนักเรียน
    public function update_student() {
        // ดึงข้อมูลจากฟอร์ม
        $student_id = $this->request->getPost('student_id');
        $student_number = $this->request->getPost('student_number');
        $student_prefix_id = $this->request->getPost('student_prefix_id');
        $student_firstname = $this->request->getPost('student_firstname');
        $student_lastname = $this->request->getPost('student_lastname');
        $student_birthdate = $this->request->getPost('student_birthdate');
        $student_mail = $this->request->getPost('student_mail');
        $student_year = $this->request->getPost('student_year');
        $student_cluster_id = $this->request->getPost('student_cluster_id');
        $student_skills = $this->request->getPost('student_skills');
        $student_image_name = NULL;
        $student_pdf_name = NULL;
        $student_address  = $this->request->getPost('student_address');

        // แก้ไขรูปภาพโปรไฟล์
        $file = $this->request->getFile('student_image_name');
        if($file->isValid()){
            $image_name = $file->getRandomName();
            $file->move('./picture', $image_name);
            $student_image_name = $image_name;
        }

        // แก้ไขไฟล์ PDF
        $file = $this->request->getFile('student_pdf_name');
        if($file->isValid()){
            $pdf_name = $file->getRandomName();
            $file->move('./file', $pdf_name);
            $student_pdf_name = $pdf_name;
        }

        // แก้ไขข้อมูลนักเรียน
        $m_stud = new M_student();
        $m_stud->update_student($student_id, $student_number, $student_prefix_id, $student_firstname, $student_lastname, $student_birthdate, $student_mail, $student_address, $student_year, $student_cluster_id, $student_image_name, $student_pdf_name);

        // ลบทักษะเดิม
        $m_stus = new M_student_skills();
        $m_stus->delete_by_student_id($student_id);

        // เพิ่มทักษะใหม่
        if ($student_skills != NULL) {
            $this->insert_student_skills($student_id, $student_skills);
        }

        // แสดงหน้าจอรายการนักเรียน
        return redirect()->to(base_url() . "/Work_shop1/show_all");
    }

    // แสดงหน้าจอข้อมูลนักเรียน
    public function detail_student($student_id) {
        // ดึงข้อมูลนักเรียน
        $m_stud = new M_student();
        $data['obj_student'] = $m_stud->get_student_by_id($student_id);

        // ดึงข้อมูลทักษะของนักเรียน
        $m_stus = new M_student_skills();
        $data['arr_skills'] = $m_stus->get_by_student_id($student_id);

        // แสดงหน้าจอข้อมูลนักเรียน
        echo view('v_show_value', $data);
    }
}