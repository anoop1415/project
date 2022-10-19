<?php
include 'dbconnect.php';

if(isset($_GET['delete_student'])){
    $delete = $_GET['delete_student'];
    $query = "select * from student_details where st_id = '$delete'";
    $rs = mysqli_query($conn, $query);
    // while($row = mysqli_fetch_assoc($rs)){
    //     $image = $row['photo'];
    // }
    // unlink('st_image/'.$image);
    $sql = "delete from student_detail where st_id = '$delete'";
    $run = mysqli_query($conn, $sql);
    if($run){
        echo "<script> window.open('view_student.php ? delete_msg = data deleted successfully','_self') </script>";
    }
}

?>