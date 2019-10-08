<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            .col-md-4{
                background-color: aqua;
                height: 100%;
                margin-left: 0;
            }
            .thumbnail{
                width: 200px;
                height: 200px;
                margin-left: 110px;
            }
            .panel{
                margin: 20px 10px 20px 10px;
            }
            .panel-heading{
                background-color: darkcyan !important;
            }
        </style>
    </head>
    <body>
        <?php
            $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text center">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2>Basic Details</h2>
                            <img src="pratik.jpg" alt="pratik" class="thumbnail">
                        </div>
                        <div class="panel-body">
                            <?php
                                $id=$_GET['id'];
                                $q1 = "select * from students natural join student_address natural join student_email where student_id=$id";
                                $query1 = mysqli_query($conn, $q1);
                                //echo mysqli_num_rows($query1);
                                $student = mysqli_fetch_assoc($query1);
                            ?>
                            <h3><?php echo $student['First'].' '.$student['Middle'].' '.$student['Last']; ?></h3>
                            <br>
                            <h4>Mother name: <?php echo $student['Mother']; ?></h4>
                            <br>
                            <?php
                            $i=1;
                            echo("
                            <h4>Address 1: ". $student['student_address']."</h4>");
                            //print_r($student);
                            while($student1 = mysqli_fetch_assoc($query1)){
                                $i=$i+1;
                            echo("
                            <h4>Address ".$i.": ". $student1['student_address']."</h4>");
                            }
                            ?>
                            <br>
                            <h4>Date of Birth: <?php echo $student['Date_of_birth']; ?></h4>
                            <br>
                            <h4>Blood Group: <?php echo $student['Blood_grp']; ?></h4>
                            <br>
                            <h4>Year of Study: <?php echo $student['Study_year']; ?></h4>
                            <br>
                            <h4>Admission Year: <?php echo $student['Admission_year']; ?></h4>
                            <br>
                            <h4>Division: <?php echo $student['Division']; ?></h4>
                            <br>
                            <h4>Roll No: <?php echo $student['Roll_no']; ?></h4>
                            <?php
                            $i=1;
                            echo("
                            <h4>Email 1: ". $student['Email']."</h4>");
                            //print_r($student);
                            while($student1 = mysqli_fetch_assoc($query1)){
                                $i=$i+1;
                            echo("
                            <h4>Email ".$i.": ". $student1['Email']."</h4>");
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid text-center">
                    <div class="jumbotron">
                            <h1>Results</h1>
                        </div>
                        <table class="table table-hover" >
                            <thead class="thead-dark">
                            <tr class="table-active">
                            <td>Exam-Date</td>
                            <td>Semester</td>
                            <td>Subject</td>
                            <td>Pointer</td>
                            <td>Pass/Fail</td>
                            </tr>  
                            </thead>         
                        <?php
                        $q2 = "select * from result where student_id=$id";
                                $query2 = mysqli_query($conn, $q2);
                                if(mysqli_num_rows($query2))
                                {
                                while($rows = mysqli_fetch_assoc($query2))
                                {
                                    echo('
                                     <tr class="clickrow">
                                                <td>'.$rows['Exam_date'].'</td>
                                                <td>'.$rows['Semester'].'</td>
                                                <td>'.$rows['Subject'].'</td>
                                                <td>'.$rows['Pointer'].'</td>
                                                <td>'.$rows['Pass/Fail'].'</td>
                                            </tr>');
                                }
                            }

                        ?>
                        </table>
                        
                        <div class="jumbotron">
                            <h1>Attendance</h1>
                        </div>
                        <table class="table table-hover" >
                            <thead class="thead-dark">
                            <tr class="table-active">
                            <td>Year</td>
                            <td>Semester</td>
                            <td>Subject</td>
                            <td>Month</td>
                            <td>Percentage</td>
                            </tr>  
                            </thead>         
                        <?php
                        $q2 = "select * from attendance where student_id=$id";
                                $query2 = mysqli_query($conn, $q2);
                                if(mysqli_num_rows($query2))
                                {
                                while($rows = mysqli_fetch_assoc($query2))
                                {
                                    echo('
                                     <tr class="clickrow">
                                                <td>'.$rows['Year'].'</td>
                                                <td>'.$rows['Semester'].'</td>
                                                <td>'.$rows['Subject'].'</td>
                                                <td>'.$rows['Month'].'</td>
                                                <td>'.$rows['Percentage'].'</td>
                                            </tr>');
                                }
                            }

                        ?>
                        </table>
                        <h2>Semester 1</h2>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>