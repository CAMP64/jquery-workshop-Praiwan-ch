<!DOCTYPE html>
<html>

<head>
    <title>แบบสอบถามข้อมูลนิสิต</title>
</head>

<body>
    <h1>แบบสอบถามข้อมูลนิสิตสาขา SE</h1>
    <hr>

    <h3>1.ข้อมูลส่วนตัว</h3>
    <form method="POST" action="<?php echo site_url().'/Work_shop1/update_student'; ?>" enctype="multipart/form-data">
        <input type="number" name="student_id" value="<?php echo $obj_student->student_id ?>" hidden>
        คำนำหน้า
        <select name="student_prefix_id" required>
            <?php
                for($i = 0; $i < count($opt_prefix); $i++) { ?>
                    <option value="<?php echo $opt_prefix[$i]->prefix_id ?>"
                        <?php if ($opt_prefix[$i]->prefix_id == $obj_student->student_prefix_id) echo " selected"?>>
                        <?php echo $opt_prefix[$i]->prefix_name ?>
                    </option>
            <?php } ?>
        </select>
        รหัสนิสิต
        <input type="number" name="student_number" required value="<?php echo $obj_student->student_number ?>"><br><br>
        ชื่อ
        <input type="text" name="student_firstname" required value="<?php echo $obj_student->student_firstname ?>">
        นามสกุล
        <input type="text" name="student_lastname" required value="<?php echo $obj_student->student_lastname ?>"><br><br>
        วันเกิด
        <input type="date" name="student_birthdate" required value="<?php echo $obj_student->student_birthdate ?>">
        อีเมล
        <input type="email" name="student_mail" required value="<?php echo $obj_student->student_mail ?>">
        <br><br>
        ที่อยู่
        <input type="text" name="student_address" required value="<?php echo $obj_student->student_address ?>">
        <hr>

        <h3>2. ข้อมูลการเรียน</h3>
        นิสิตชั้นปีที่
        <input type="radio" name="student_year" value="1" required <?php if ($obj_student->student_year == 1) echo " checked"?>>1
        <input type="radio" name="student_year" value="2" required <?php if ($obj_student->student_year == 2) echo " checked"?>>2
        <input type="radio" name="student_year" value="3" required <?php if ($obj_student->student_year == 3) echo " checked"?>>3
        <input type="radio" name="student_year" value="4" required <?php if ($obj_student->student_year == 4) echo " checked"?>>4
        <br><br>

        มกุล
        <select name="student_cluster_id" required>
            <?php
                for($i = 0; $i < count($opt_cluster); $i++) { ?>
                    <option value="<?php echo $opt_cluster[$i]->cluster_id ?>"
                        <?php if ($opt_cluster[$i]->cluster_id == $obj_student->student_cluster_id) echo " selected"?>>
                        Cluster <?php echo $opt_cluster[$i]->cluster_number ?>
                    </option>
            <?php }?>
        </select>
        <br><br>

        ภาษาที่ถนัด <br><br>
        <input type="checkbox" name="student_skills[]" value="C" <?php if (in_array("C", $skills)) echo " checked"?>> C <br>
        <input type="checkbox" name="student_skills[]" value="C++" <?php if (in_array("C++", $skills)) echo " checked"?>> C++ <br>
        <input type="checkbox" name="student_skills[]" value="HTML" <?php if (in_array("HTML", $skills)) echo " checked"?>> HTML <br>
        <input type="checkbox" name="student_skills[]" value="CSS" <?php if (in_array("CSS", $skills)) echo " checked"?>> CSS <br>
        <input type="checkbox" name="student_skills[]" value="MySQL" <?php if (in_array("MySQL", $skills)) echo " checked"?>> MySQL <br>
        <input type="checkbox" name="student_skills[]" value="JS" <?php if (in_array("JS", $skills)) echo " checked"?>> JS <br>
        <input type="checkbox" name="student_skills[]" value="PHP" <?php if (in_array("PHP", $skills)) echo " checked"?>> PHP <br>
        <hr>

        <h3>3. รูปภาพและไฟล์ข้อมูล</h3>
        รูปภาพนิสิต
        <input type="file" name="student_image_name" accept="image/*"><br><br>
        ไฟล PDF
        <input type="file" name="student_pdf_name" accept=".pdf"><br>
        <hr>

        <!-- ปุ่มบันทึก -->
        <input type="submit" value="บันทึก">
    </form>
</body>

</html>