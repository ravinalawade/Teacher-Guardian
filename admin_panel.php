<!DOCTYPE html>
<html>
    <head>
        <title>Admin Panel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            .jumbotron{
                background-color: aquamarine;
                color: aliceblue;
                padding: 60px 25px;
            }
        </style>

        <script>
            $(document).ready(function(){
                $(".show-toast").click(function(){
                    $("#mytoast").toast('show');
                });
            });
        </script>
        <script>
            $( "selector" ).datepicker({
                altField : "#dob"
                altFormat: "yyyy-mm-dd"
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

            $q1 = "select * from professor";
            $query1 = mysqli_query($conn, $q1);
        ?>
        <div class="jumbotron text-center">
            <h1>Admin Panel</h1>
            <br><br>
            <a href="#mytoast" class="btn btn-primary btn-lg show-toast">
                Add a new Teacher  <span class="glyphicon glyphicon-arrow-right"></span>
            </a>
        </div>

        <div class="toast" id="mytoast" data-autohide="false" data-animation="true" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <h2>Add New Professor</h2>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
            </div>
            <div class="toast-body">
                <form action="data_entry.php" method="POST">
                    <div class="form-group">
                        <label for="pid">Professor ID: </label>
                        <input id="pid" type="number" class="form-control" name="pid" placeholder="ID" required>
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
                        <label for="email">Email: </label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role: </label>
                        <input id="role" type="text" class="form-control" name="role" placeholder="Guardian/Incharge/HOD" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year of teaching: </label>
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
                        <th>Role</th>
                        <th>Year</th>
                        <th>Division</th>
                        <th>Batch</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        While($rows=mysqli_fetch_assoc($query1))
                        {
                            $q2 = "select Email_id from professor_email where professor_id = '".$rows['professor_id']."' ";
                            $query2 = mysqli_query($conn, $q2);
                            $query2 = mysqli_fetch_array($query2);
                    ?>
                    <tr>
                        <td><?php echo $rows['professor_id']; ?></td>
                        <td><?php echo $rows['First']; ?></td>
                        <td><?php echo $rows['Middle']; ?></td>
                        <td><?php echo $rows['Last']; ?></td>
                        <td><?php echo $rows['Date_of_Birth']; ?></td>
                        <td><?php echo $query2['Email_id']; ?></td>
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
</html>