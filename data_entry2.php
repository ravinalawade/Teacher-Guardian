<?php
    $servername="localhost";
    //add below line in every file. It displays error for all sql querries.
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect($servername,"root","","computer_dept") ;

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    //$pid = $fname = $mname = $lname = $date = $email = $role = $year = $div = $batch = "";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sid = (int)test_input($_POST["sid"]);
        $fname = test_input($_POST["first"]);
        $mname = test_input($_POST["middle"]);
        $lname = test_input($_POST["last"]);
        $date = $_POST["dob"];
        //$email = test_input($_POST["email"]);
        //$role = test_input($_POST["role"]);
        $year = (int)test_input($_POST["year"]);
        $div = test_input($_POST["div"]);
        $batch = (int)test_input($_POST["batch"]);
        echo $date;
    
        $q3 = "insert into students (student_id, First, Middle, Last, Date_of_birth, Study_year, Division, Batch)
                values ($sid, '$fname', '$mname', '$lname', '$date', $year, '$div', $batch)";
        mysqli_query($conn, $q3);
        //$q4 = "insert into professor_email values ($pid, '$email')";
        //mysqli_query($conn, $q4);
        if($q3) header("Location: teacher2.php");
        mysqli_close($conn);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>