<!DOCTYPE html>
<html>

<head>
    <title>แบบสอบถามข้อมูลนิสิต</title>
</head>

<body>
    <h1>แบบสอบถามข้อมูลนิสิตสาขา SE</h1>
    <hr>

    <h3>1.ข้อมูลส่วนตัว</h3>
    <form method="POST" action="<?php echo site_url().'/Work_shop1/insert_student'; ?>" enctype="multipart/form-data">
        คำนำหน้า
        <select name="student_prefix_id" required>
            <?php
                for($i = 0; $i < count($opt_prefix); $i++) { ?>
                    <option value="<?php echo $opt_prefix[$i]->prefix_id ?>"><?php echo $opt_prefix[$i]->prefix_name ?></option>
            <?php } ?>
        </select>
        รหัสนิสิต
        <input type="number" name="student_number" required><br><br>
        ชื่อ
        <input type="text" name="student_firstname" required>
        นามสกุล
        <input type="text" name="student_lastname" required><br><br>
        วันเกิด
        <input type="date" name="student_birthdate" required>
        อีเมล
        <input type="email" name="student_mail" required><br><br>
        ที่อยู่
        <input type="text" name = "student_address" required>
        <hr>

        <h3>2. ข้อมูลการเรียน</h3>
        นิสิตชั้นปีที่
        <input type="radio" name="student_year" value="1" required>1
        <input type="radio" name="student_year" value="2" required>2
        <input type="radio" name="student_year" value="3" required>3
        <input type="radio" name="student_year" value="4" required>4
        <br><br>

        มกุล
        <select name="student_cluster_id" required>
            <?php
                for($i = 0; $i < count($opt_cluster); $i++) { ?>
                    <option value="<?php echo $opt_cluster[$i]->cluster_id ?>">Cluster <?php echo $opt_cluster[$i]->cluster_number ?></option>
            <?php }?>
        </select>
        <br><br>

        ภาษาที่ถนัด <br><br>
        <input type="checkbox" name="student_skills[]" value="C"> C <br>
        <input type="checkbox" name="student_skills[]" value="C++"> C++ <br>
        <input type="checkbox" name="student_skills[]" value="HTML"> HTML <br>
        <input type="checkbox" name="student_skills[]" value="CSS"> CSS <br>
        <input type="checkbox" name="student_skills[]" value="MySQL"> MySQL <br>
        <input type="checkbox" name="student_skills[]" value="JS"> Js <br>
        <input type="checkbox" name="student_skills[]" value="PHP"> PHP <br>
        <hr>

        <h3>3. รูปภาพและไฟล์ข้อมูล</h3>
        รูปภาพนิสิต
        <input type="file" name="student_image_name" accept="image/*" required><br><br>
        ไฟล PDF
        <input type="file" name="student_pdf_name" accept=".pdf" required><br>
        <hr>
       

        <!-- ปุ่มบันทึก -->
        <input type="submit" value="บันทึก">
    </form>
</body>

</html>