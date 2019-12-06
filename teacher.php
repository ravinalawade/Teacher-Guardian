<?php session_start();?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Teacher</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: #C5C6C7;
            }
            .col-md-3{
                background-color: #0B0C10;;
                height: 100vh;
                margin-left: 0;
                padding: 10px;
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
            .c1{
                margin-left: 300px;
            }
            .c2{
                margin-right: 300px;
            }
            .btn{
                background-color: #0B0C10;
                border: 1px solid #66FCF1;
                border-radius: 30px;
                font-size: 30px;
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
            function fclass() {
                var x = document.getElementById("class");
                x.style.display = "block";
                var y = document.getElementById("batch");
                y.style.display = "none";
                console.log(x);
            }
            function fbatch() {
                var x = document.getElementById("batch");
                x.style.display = "block";
                var y = document.getElementById("class");
                y.style.display = "none";
                console.log(x);
            }
            jQuery(document).ready(function($) {
            $(".clickrow").click(function() {
                window.location = $(this).data("href");
            });
        });


        </script>
        <script>
            $( "selector" ).datepicker({
                altField : "#dob"
                altFormat: "yyyy-mm-dd"
            });

            $(document).ready( function() {
                $(document.body).on("click", "tr[data-href]", function () {
                    window.location.href = this.dataset.href;
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
            $id=$_SESSION["id"];
            //$Divi=$_SESSION['Div'];
            //$Bat=$_SESSION['Bat'];
            $query = "select * from students as s, 
                    (select Division, Year from prof_rol where professor_id = '$id' and Batch is NULL) as p
                    where s.Division = p.Division and s.Study_year = p.Year";
            // $query = "select * from students as s inner join select * from prof_rol as p on s.Division=p.Division and s.Study_year=p.Year and professor_id=$id";
            $classstu=mysqli_query($conn,$query);

            $query1 = "select * from students as s,
                        ( select Division,Year,Batch from prof_rol where professor_id = '$id') as p
                        where s.Division = p.Division and Study_year = p.Year and s.Batch=p.Batch";            
            $batchstu=mysqli_query($conn,$query1);
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="container text-center heading">
                        <img src="contact.jpg" alt="pratik" class="thumbnail">
                    </div>
                    <div class="container details">
                        <?php
                            $id = $_SESSION["id"];
                            $q7 = "select * from professor natural join professor_email natural join prof_rol natural join prof_address where professor_id = $id";
                            $query7 = mysqli_query($conn, $q7);
                            $teacher = mysqli_fetch_assoc($query7);
                        ?>
                        <h4><?php echo $teacher['First'].' '.$teacher['Middle'].' '.$teacher['Last']; ?></h4>
                        <br>
                        <h5>Date of Birth: <?php echo $teacher['Date_of_Birth']; ?></h5>
                        <br>
                        <h5>Address: <?php echo $teacher['Location']; ?></h5>
                        <br>
                        <h5>Email: <?php echo $teacher['Email_id']; ?></h5>
                        <br>
                        <h5>Role: <?php echo $teacher['Role']; ?></h5>
                        <br>
                        <h5>Year: <?php echo $teacher['Year']; ?></h5>
                        <br>
                        <h5>Division: <?php echo $teacher['Division']; ?></h5>
                        <br>
                        <h5>Batch: <?php echo $teacher['Batch']; ?></h5>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container text-center">
                        <div class="jumbotron text-center info">
                            <h1>Students Database</h1>
                            <div class="row">
                                <div class="col-md-6">
                                    <button onclick="fclass()" class="btn btn-lg btn-primary c1">class</button>
                                </div>
                                <div class="col-md-6">
                                    <button onclick="fbatch()" class="btn btn-lg btn-primary c2">batch</button> 
                                </div>
                            </div>
                        </div>
                        <div id="class">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Date Of birth</th>
                                        <th>Year</th>
                                        <th>Division</th>
                                        <th>Roll No</th>
                                        <th>Batch</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    //print_r($classstu);
                                        while($rows=mysqli_fetch_assoc($classstu)){
                                            //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                                            echo('
                                                <tr class="clickrow" data-href="student_info.php?id='.$rows["student_id"].'">
                                                    <td>'.$rows["student_id"].'</td>
                                                    <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                                                    <th>'.$rows["Date_of_birth"].'</th>
                                                    <th>'.$rows["Study_year"]. '</th>
                                                    <th>'.$rows["Division"].'</th>
                                                    <td>'.$rows["Roll_no"].'</td>
                                                    <th>'.$rows["Batch"].'</th>
                                                </tr>'
                                            );
                                        }
                                    ?>
                                </tbody>
                            </table> 
                        </div>
                        <div id="batch" style="display:none;">
                            <table class="table">
                                <thead>
                                    <tr>
                                            <th>Name</th>
                                            <th>Date Of birth</th>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Batch</th>
                                    <tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while($rows=mysqli_fetch_assoc($batchstu)){
                                        //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                                        echo('
                                        <tr class="clickrow" data-href="student_infohod.php?id='.$rows["student_id"].'">
                        
                                            <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                                            <th>'.$rows["Date_of_birth"].'</th>
                                            <th>'.$rows["Study_year"]. '</th>
                                            <th>'.$rows["Division"].'</th>
                                            <th>'.$rows["Batch"].'</th>
                                        </tr>');
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div id="batch" style="display:none;">
        <table class="table table-hover" style="height:50%; width:40%; left:430px; top:200px; position:absolute; ">
                <tbody>
                    <tr>
                    <th colspan="5" style="text-align: center;">Details</th>
                    </tr>
                    <tr>
                            <th>Name</th>
                            <th>Date Of birth</th>
                            <th>Year</th>
                            <th>Division</th>
                            <th>Batch</th>
                    <tr>
                    <?php 
                    while($rows=mysqli_fetch_assoc($batchstu)){
                        //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                        echo('
                        <tr class="clickrow" data-href="student_info.php?id='.$rows["student_id"].'">
        
                            <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                            <th>'.$rows["Date_of_birth"].'</th>
                            <th>'.$rows["Study_year"]. '</th>
                            <th>'.$rows["Division"].'</th>
                            <th>'.$rows["Batch"].'</th>
                            <th>hello</th>
                        </tr>');
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </body>
</html>                            