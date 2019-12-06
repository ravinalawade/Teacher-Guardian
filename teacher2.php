<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Teacher</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css">
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
                position: sticky;
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
        </style>

        <script>
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

            $id = $_SESSION["id"];

            $q1 = "select * from professor natural join professor_email natural join prof_rol natural join prof_address where professor_id = $id";

            $query1 = mysqli_query($conn, $q1);
            $teacher = mysqli_fetch_assoc($query1);
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 text center">
                    <div class="container text-center heading">
                        <img src="contact.jpg" alt="pratik" class="thumbnail">
                    </div>
                    <div class="container details">
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
                            <h1>Student Details</h1>
                        </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id = $_SESSION['id'];
                                    $q2 = "";
                                    if($teacher['Role']=='Incharge'){
                                        $q2 = "select * from students as s, 
                                                (select Division, Year from prof_rol where professor_id = '$id') as p
                                                where s.Division = p.Division and s.Study_year = p.Year";
                                    }
                                    else if($teacher['Role']=='Guardian'){
                                        $q2 = "select * from students as s,
                                                ( select Division,Year,Batch from prof_rol where professor_id = '$id') as p
                                                where s.Division = p.Division and Study_year = p.Year and s.Batch=p.Batch";
                                    }
                                    $query2 = mysqli_query($conn, $q2);
                                    //echo mysqli_num_rows($query2);
                                    while($rows = mysqli_fetch_assoc($query2))
                                    {
                                        echo('
                                            <tr class="clickrow" data-href="student_infohod.php?id='.$rows["student_id"].'">
                                                <td>'.$rows['student_id'].'</td>
                                                <td>'.$rows['First'].' '.$rows['Middle'].' '.$rows['Last'].'</td>
                                                <td>'.$rows['Date_of_birth'].'</td>
                                                <td>'.$rows['Year'].'</td>
                                                <td>'.$rows['Division'].'</td>
                                                <td>'.$rows['Roll_no'].'</td>
                                                <td>'.$rows['Batch'].'</td>
                                            </tr>'
                                        );
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="toast" id="mytoast" data-autohide="false" data-animation="true" style="position: absolute; top: 0; right: 0; background-color: aqua;">
                <div class="toast-header">
                    <h2>Add New Professor</h2>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
                </div>
                <div class="toast-body">
                    <form action="data_entry2.php" method="POST">
                        <div class="form-group">
                            <label for="pid">Student ID: </label>
                            <input id="pid" type="number" class="form-control" name="sid" placeholder="ID" required>
                        </div>
                        <div class="form-group">
                            <label for="first">First Name: </label>
                            <input id="first" type="text" class="form-control" name="first" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="middle">Middle Name: </label>
                            <input id="middle" type="text" class="form-control" name="middle" placeholder="Middle Name" required>
                        </div>
                        <div class="form-group">
                            <label for="last">Last Name: </label>
                            <input id="last" type="text" class="form-control" name="last" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth: </label>
                            <input id="dob" type="date" class="form-control" name="dob" placeholder="Date" required>
                        </div>
                        <div class="form-group">
                            <label for="year">Year: </label>
                            <input id="year" type="number" class="form-control" name="year" placeholder="Year" required>
                        </div>
                        <div class="form-group">
                            <label for="first">Division: </label>
                            <input id="div" type="text" class="form-control" name="div" placeholder="DIV" required>
                        </div>
                        <div class="form-group">
                            <label for="first">Batch: </label>
                            <input id="batch" type="number" class="form-control" name="batch" placeholder="Batch">
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>