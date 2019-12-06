<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Student Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: #C5C6C7;
            }
            .col-md-3{
                background-color: #0B0C10;;
                height: 100vh;
                overflow: scroll;
                margin-left: 0;
                padding: 10px;
                position: sticky;
                top: 0;
            }
            .col-md-9{
                overflow: scroll;
            }
            .thumbnail{
                width: 200px;
                height: 200px;
                /* margin-left: 80px; */
                border-radius: 50%; 
            }
            .heading{
                width: 220px;
                height: 220px;
                margin: 20px 0 20px 55px;
                background-color: #66FCF1;
                border-radius: 100%;
                padding: 10px;
            }
            .details{
                color: #66FCF1;
                font-size: 15px;
            }
            .jumbotron.info{
                background-color: #0B0C10;
                margin-top: 30px;
                font-size: 40px;
                color: #C5C6C7;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                font-size: 40px;
                height: 100px;
            }
            .jumbotron{
                background-color: #1F2833;
                color: #45A29E;
                padding: 25px;
                margin-top: 20px;
                border-radius: 40px;
            }
            .table{
                background-color: #1F2833;
                color: #4FA29E;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            thead{
                background-color: #0B0C10;
                color: #C5C6C7;
            }
            tr:hover{
                background-color: #0B0C10;
                color: #66FCF1;
            }
            .btn{
                background-color: #0B0C10;
                border: 1px solid #66FCF1;
                color: #66FCF1;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .btn:hover{
                background-color: #4FA29E;
                color: #0B0C10;
            }
        </style>
        <script>
            $(document).ready(function(){
                $(".show-toast").click(function(){
                    $("#myToast").toast('show');
                });
            });
        </script>

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
            if(isset($_POST['submit']))
            {
                $id1=$_GET['id'];
                $Sem=(int)$_POST['sem'];
                $Year=(int)$_POST['year'];
                $Month=$_POST['month'];
                $Subject=$_POST['subject'];
                $Per=(int)$_POST['per'];
                $qi="insert into attendance (student_id,Semester,Year,Month,Subject,Percentage) values ($id1,
                $Sem,$Year,'$Month','$Subject',$Per)";
                $q1=mysqli_query($conn,$qi);
                if($q1){
                    echo "done";
                }
            }
        ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 text center">
                    <div class="container text-center heading">
                        <img src="contact.jpg" alt="pratik" class="thumbnail">
                    </div>
                    <div class="container details">
                        <?php
                            if($_GET['id']){
                                $id=$_GET['id'];
                            }
                            else{
                                $id = $_SESSION['id'];
                            }
                            $q1 = "select * from students natural join student_address natural join student_email where student_id=$id";
                            $query1 = mysqli_query($conn, $q1);
                            //echo mysqli_num_rows($query1);
                            $student = mysqli_fetch_assoc($query1);
                            
                        ?>
                        <h4><?php echo $student['First'].' '.$student['Middle'].' '.$student['Last']; ?></h4>
                        <br>
                        <h5>Mother name: <?php echo $student['Mother']; ?></h5>
                        <br>
                        <?php
                        $i=1;
                        echo("
                        <h5>Address : ". $student['Location']."</h5>");
                        //print_r($student);
                        while($student1 = mysqli_fetch_assoc($query1)){
                            $i=$i+1;
                        echo("
                        <h5>Address ".$i.": ". $student1['Location']."</h5>");
                        }
                        ?>
                        <br>
                        <h5>Date of Birth: <?php echo $student['Date_of_birth']; ?></h5>
                        <br>
                        <h5>Blood Group: <?php echo $student['Blood_grp']; ?></h5>
                        <br>
                        <h5>Year of Study: <?php echo $student['Study_year']; ?></h5>
                        <br>
                        <h5>Admission Year: <?php echo $student['Admission_year']; ?></h5>
                        <br>
                        <h5>Division: <?php echo $student['Division']; ?></h5>
                        <br>
                        <h5>Roll No: <?php echo $student['Roll_no']; ?></h5>
                        <br>
                        <?php
                        $i=1;
                        echo("<h5>Email : ". $student['Email']."</h5>");
                        //print_r($student);
                        while($student1 = mysqli_fetch_assoc($query1)){
                            $i=$i+1;
                        echo("
                        <h5>Email ".$i.": ". $student1['Email']."</h5>");
                        }
                        ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container-fluid text-center">
                        <div class="jumbotron text-center info">
                            <h1 id="info1">Students Details</h1>
                            <!-- <a type="button" class="btn btn-lg" href="add_attend.php">Add Attendance</a> -->
                        </div>
                        <div class="jumbotron text-center">
                            <h1>Skills</h1>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type of Skill</th>
                                    <th>Name of Skill</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q1 = "select * from skills where student_id=$id";
                                $query1 = mysqli_query($conn, $q1);
                                    While($rows=mysqli_fetch_assoc($query1))
                                    {
                                ?>
                                <tr class="details">
                                        <td><?php echo $rows['Type']; ?></td>
                                        <td><?php echo $rows['Skill_name']; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        <table>
                        <div class="jumbotron text-center">
                            <h1>Achievements</h1>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Perfomance</th>
                                    <th>Certificate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q1 = "select * from achivements where student_id=$id";
                                $query1 = mysqli_query($conn, $q1);
                                    While($rows=mysqli_fetch_assoc($query1))
                                    {
                                ?>
                                <tr class="details">
                                        <td><?php echo $rows['Tech/NonTech']; ?></td>
                                        <td><?php echo $rows['Description']; ?></td>
                                        <td><?php echo $rows['Won/Lost']; ?></td>
                                        <td><?php echo $rows['Certificate']; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        <table>
                        <div class="jumbotron text-center">
                            <h1>Results</h1>
                        </div>
                        <table class="table" >
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
                        
                        <div class="jumbotron text-center">
                            <h1>Attendance</h1>
                        </div>
                        <table class="table" >
                            <thead class="thead-dark">
                                <tr class="table-active">
                                    <td>Year</td>
                                    <td>Semester</td>
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
                                                <td>'.$rows['Month'].'</td>
                                                <td>'.$rows['attend'].'</td>
                                            </tr>');
                                }
                            }

                        ?>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>