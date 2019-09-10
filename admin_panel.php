<?php
    $servername="localhost";
    //add below line in every file. It displays error for all sql querries.
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conn = mysqli_connect($servername,"root","","computer_dept") ;

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $q1 = "select * from professor";
    $query1 = mysqli_query($conn, $q1);
?>

<html>
    <head>
    <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            .jumbotron{
                background-color: aquamarine;
                color: aliceblue;
                padding: 60px 25px;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Admin Panel</h1>
            <br><br>
            <a href="#" class="btn btn-primary btn-lg">
                Add a new Teacher  <span class="glyphicon glyphicon-arrow-right"></span>
            </a>
        </div>
        <div class="container text-center">
            <h2>Teacher Database</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Date Of birth</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Division</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>212</td>
                        <td>Jyoti</td>
                        <td>Shankar</td>
                        <td>Gaikwad</td>
                        <td>1986-09-04</td>
                        <td>jyoti_dm@gmail.com</td>
                        <td>Guardian</td>
                        <td>3rd</td>
                        <td>A</td>
                        <td>3</td>
                    </tr>
                </tbody>
            </table>
        </div>    
    </body>
</html>