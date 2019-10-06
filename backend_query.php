<?php
  $servername="localhost";
  //add below line in every file. It displays error for all sql querries.
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = mysqli_connect($servername,"root","","computer_dept");

  //skills
  if(isset($_POST['skill_array_student'])){
    $s = $_POST['skill_array_student'];
    $q1 = "INSERT INTO skills VALUES (454,'t','$s');";
    $query1 = mysqli_query($conn,$q1);
    echo $query1;
  }
  //achievement
  if(isset($_POST['a_type'])){
    $a_type = $_POST['a_type'];
    $description = $_POST['description'];
    $wl = $_POST['wl'];
    $certificate = $_POST['certificate'];
    $q2 = "INSERT INTO achivements VALUES (454,'$a_type','$description','$wl','$certificate');";
    $query2 = mysqli_query($conn,$q2);
    echo $query2;
  }
  if(isset($_POST['something'])){
    $q1 = "SELECT  * FROM students
          WHERE  student_id=454;";
    $query1 = mysqli_query($conn,$q1);
    $value = mysqli_fetch_array($query1,MYSQLI_ASSOC);
    unset($_POST['something']);
    echo implode(',',$value);
  }
 ?>
