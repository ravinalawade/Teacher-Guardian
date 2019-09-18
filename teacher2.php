<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
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

            $id = $_SESSION["id"];
            $q1 = "select * from professor natural join professor_email natural join prof_role where professor_id = $id";
            $query1 = mysqli_query($conn, $q1);
            $teacher = mysqli_fetch_assoc($query1);
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
                            <h3><?php echo $teacher['First'].' '.$teacher['Middle'].' '.$teacher['Last']; ?></h3>
                            <br>
                            <h4>Address: <?php echo $teacher['Location']; ?></h4>
                            <br>
                            <h4>Date of Birth: <?php echo $teacher['Date_of_Birth']; ?></h4>
                            <br>
                            <h4>Email: <?php echo $teacher['Email_id']; ?></h4>
                            <br>
                            <h4>Role: <?php echo $teacher['Role']; ?></h4>
                            <br>
                            <h4>Year: <?php echo $teacher['Year']; ?></h4>
                            <br>
                            <h4>Division: <?php echo $teacher['Division']; ?></h4>
                            <br>
                            <h4>Batch: <?php echo $teacher['Batch']; ?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container text-center">
                        <h2>Teacher Database</h2>
                        <a href="#mytoast" class="btn btn-primary btn-lg show-toast">
                            Add a new Student  <span class="glyphicon glyphicon-arrow-right"></span>
                        </a>
                        <table class="table table-hover">
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
                                    if($teacher['Role']=='Incharge'){
                                        $q2 = "select * from students as s, 
                                                (select Division, Year from professor where professor_id = '$id') as p
                                                where s.Division = p.Division and s.Study_year = p.Year";
                                    }
                                    else if($teacher['Role']=='Guardian'){
                                        $q2 = "select * from students as s,
                                                ( select Division,Year,Batch from professor where professor_id = '$id') as p
                                                where s.Division = p.Division and Study_year = p.Year and s.Batch=p.Batch";
                                    }
                                    $query2 = mysqli_query($conn, $q2);
                                    echo mysqli_num_rows($query2);
                                    while($rows = mysqli_fetch_assoc($query2))
                                    {
                                ?>
                                <tr>
                                    <td><?php echo $rows['student_id']; ?></td>
                                    <td><?php echo $rows['First'].' '.$rows['Middle'].' '.$rows['Last']; ?></td>
                                    <td><?php echo $rows['Date_of_birth']; ?></td>
                                    <td><?php echo $rows['Year']; ?></td>
                                    <td><?php echo $rows['Division']; ?></td>
                                    <td><?php echo $rows['Roll_no']; ?></td>
                                    <td><?php echo $rows['Batch']; ?></td>
                                </tr>
                                <?php
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