<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <nav>
        <a href="<?php echo base_url() . "/Work_shop1/show_all" ?>">หน้าหลัก</a>
        <a href="<?php echo base_url() . "/Work_shop1/show_input" ?>">เพิ่มข้อมูล</a>
    </nav>

    <?php
        $i = 0;
    ?>
    <?php
        if (count($arr_student) >= 1) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>มกุล</th>
                        <th>ที่อยู่</th>
                        <th>ภาพ</th>
                        <th>ปุ่มดำเนินการ</th>
                    </tr>
                </thead>

                <tbody>
                    <?php for($i = 0; $i < count($arr_student); $i++) { ?>
                        <tr>
                            <!-- ลำดับที่ -->
                            <td>
                                <?php echo $i + 1 ?>
                            </td>

                            <!-- ชื่อนามสกุล -->
                            <td>
                                <?php echo $arr_student[$i]->prefix_name . $arr_student[$i]->student_firstname . " " . $arr_student[$i]->student_lastname ?>
                            </td>

                            <!-- เลขมกุล -->
                            <td>
                                <?php echo $arr_student[$i]->cluster_number ?>
                            </td>

                            <!-----ที่อยู่---->
                            <td>
                                <?php echo $arr_student[$i]->student_address ?>
                            </td>

                            <!-- ภาพโปรไฟล์ -->
                            <td>
                                <img src="<?php echo base_url().'/picture/' . $arr_student[$i]->student_image_name ?>" width="100">
                            </td>

                            <!-- ปุ่มแก้ไขข้อมูล และลบข้อมูล -->
                            <td>
                                <a href="<?php echo base_url() . "/Work_shop1/detail_student/" . $arr_student[$i]->student_id ?>"><button>ดูข้อมูล</button></a>
                                <a href="<?php echo base_url() . "/Work_shop1/edit_student/" . $arr_student[$i]->student_id ?>"><button>แก้ไข</button></a>
                                <a href="<?php echo base_url() . "/Work_shop1/delete_student/" . $arr_student[$i]->student_id ?>"><button>ลบ</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    <?php
        else :
            echo "<h1>ไม่มีข้อมูล</h1>";
        endif;
    ?>
</body>
</html>