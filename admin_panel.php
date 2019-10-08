<!DOCTYPE php>
<php>
    <head>
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: #C5C6C7;
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
            .jumbotron{
                background-color: #0B0C10;
                color: #C5C6C7;
                padding: 60px 25px;
            }
            .jumbotron .admin{
                font-size: 75px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .dropdown-menu{
                background-color: #1F2833;
            }
            a{
                color: #66FCF1;
            }
            a:hover{
                color: #C5C6C7;
            }
            .dropdown-header{
                color: #C5C6C7;
                font-size: 30px;
            }
            #teacher{
                color: #0B0C10;
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

        <!-- <script>
            $( "selector" ).datepicker({
                altField : "#dob"
                altFormat: "yyyy-mm-dd"
            });

            $(document).ready( function() {
                $(document.body).on("click", "tr[data-href]", function () {
                    window.location.href = this.dataset.href;
                });
            });
        </script> -->
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

            //$q1 = "select * from professor";
            //$query1 = mysqli_query($conn, $q1);
        ?>
        <div class="jumbotron text-center">
            <h1 class="admin">Admin Panel</h1>
            <div class="dropdowm">
                <button class="btn btn-lg dropdown-toggle" type="button" data-toggle="dropdown">
                    Select Option <span class="caret"></span>
                </button>
                <ul class="dropdown-menu"> 
                    <li class="dropdown-header">Professor</li>
                    <li><a href="add_prof.php" >Add Professor</a></li>
                    <li><a href="add_profRole.php">Add Incharge/Guardian</a></li>
                    <li><a href="add_teaching.php">Add Teaching details</a></li>
                    <li><a href="update_profRole.php">Update Professor Role</a></li>
                    <li><a href="update_teaching.php">Update Teaching details</a></li>
                    <li><a href="del_prof.php">Delete Professor</a></li>
                    <li class="dropdown-header">Student</li>
                    <li><a href="add_stud.php">Add student</a></li>
                    <li><a href="update_stud.php">Update student</a></li>
                    <li><a href="del_stud.php">Delete student</a></li>
                    <li><a href="add_result.php">Add result</a></li>
                </ul>
            </div>
        </div>

        <div class="container text-center">
            <h2 id="teacher">Teacher Database</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Date Of birth</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Year</th>
                        <th>Division</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q1 = "select * from professor natural join professor_email natural join prof_rol";
                    $query1 = mysqli_query($conn, $q1);
                        While($rows=mysqli_fetch_assoc($query1))
                        {
                            //$q2 = "select Email_id from professor_email where professor_id = '".$rows['professor_id']."' ";
                            //$query2 = mysqli_query($conn, $q2);
                            //$query2 = mysqli_fetch_array($query2);
                    ?>
                    <tr class="details">
                        <td><?php echo $rows['professor_id']; ?></td>
                        <td><?php echo $rows['First']; ?></td>
                        <td><?php echo $rows['Middle']; ?></td>
                        <td><?php echo $rows['Last']; ?></td>
                        <td><?php echo $rows['Date_of_Birth']; ?></td>
                        <td><?php echo $rows['Email_id']; ?></td>
                        <td><?php echo $rows['Role']; ?></td>
                        <td><?php echo $rows['Year']; ?></td>
                        <td><?php echo $rows['Division']; ?></td>
                        <td><?php echo $rows['Batch']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>   
    </body>
</php>