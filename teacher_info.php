<!DOCTYPE html>
<html>
    <head>
        <title>professor Details</title>
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
                                $q1 = "select * from professor where professor_id=$id";
                                $query1 = mysqli_query($conn, $q1);
                                //echo mysqli_num_rows($query1);
                                $professor = mysqli_fetch_assoc($query1);
                            ?>
                            <h3><?php echo $professor['First'].' '.$professor['Middle'].' '.$professor['Last']; ?></h3>
                            <br>
                            <h4>Date of Birth: <?php echo $professor['Date_of_Birth']; ?></h4>
                            <br>
                            <h4>Division: <?php echo $professor['Division']; ?></h4>
                            <br>
                            <h4>Batch: <?php echo $professor['Batch']; ?></h4>
                            <br>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="container-fluid text-center">
                        <div class="jumbotron">
                            <h1>Results</h1>
                        </div>
                        <h2>Semester 1</h2>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>