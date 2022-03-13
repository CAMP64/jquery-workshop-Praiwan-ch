<!DOCTYPE html>
<html>

<head>
    <title>รายละเอียดข้อมูลนิสิต</title>
</head>

<body>
    <h3>1. ข้อมูลส่วนตัว</h3>
    รหัสนิสิต : <?php echo $obj_student->student_number ?> <br>
    ชื่อ : <?php echo $obj_student->prefix_name . $obj_student->student_firstname . " " . $obj_student->student_lastname ?> <br><br>
    วันเกิด : <?php echo $obj_student->student_birthdate ?> <br><br>
    อีเมล : <?php echo $obj_student->student_mail ?><br>
    ที่อยู่ : <?php echo $obj_student->student_address?><br>
    ชั้นปี : <?php echo $obj_student->student_year ?><br>
    มกุล : <?php echo $obj_student->cluster_number ?><br>
    ภาษาที่ถนัด : <br>
    <?php
       if (count($arr_skills) > 0) :
           for($i = 0; $i < count($arr_skills); $i++) {
               echo $arr_skills[$i]->skill_name . "<br>";
           }
       else :
            echo "ไม่มีทักษะ<br>";
       endif;
    ?> 
    <img src="<?php echo base_url() . '/picture/' . $obj_student->student_image_name ?>" width= "500" height= "375">
    <embed src= "<?php echo base_url() . '/file/' . $obj_student->student_pdf_name ?>" width= "800" height= "375">
    <hr>
</body>

</html>