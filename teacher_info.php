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
            body{
                background-color: #45A29E;
            }
            .info{
                background-color: #1F2833;
                color: #66FCF1;
                margin-top: 25px;
                width: 60%;
                border-radius: 50px;
                padding: 10px;
            }
            .thumbnail{
                width: 200px;
                height: 200px;
                border-radius: 50%; 
            }
            .heading{
                width: 220px;
                height: 220px;          
                background-color: #66FCF1;
                border-radius: 100%;
                padding: 10px;
                margin-top: 20px;
            }
            .container-fluid{
                /* margin-right: 40px; */
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

        <div class="container text-center info">
            <div class="container text-center heading">
                <img src="contact.jpg" alt="pratik" class="thumbnail">
            </div>
            <div class="container-fluid text-center" id="details">
                <?php
                    $id=$_GET['id'];
                    $q1 = "select * from professor natural join professor_email natural join prof_address natural join prof_rol 
                            natural join prof_sub where professor_id=$id";
                    $query1 = mysqli_query($conn, $q1);
                    //echo mysqli_num_rows($query1);
                    $professor = mysqli_fetch_assoc($query1);
                ?>
                <h1><?php echo $professor['First'].' '.$professor['Middle'].' '.$professor['Last']; ?></h1>
                <br>
                <h3>Date of Birth: <?php echo $professor['Date_of_Birth']; ?></h3>
                <br>
                <h3>Email: <?php echo $professor['Email_id']; ?></h3>
                <br>
                <h3>Address: <?php echo $professor['Location']; ?></h3>
                <br>
                <h3>Role: <?php echo $professor['Role']; ?></h3>
                <br>
                <h3>Year: <?php echo $professor['Year']; ?></h3>
                <br>
                <h3>Division: <?php echo $professor['Division']; ?></h3>
                <br>
                <h3>Batch: <?php echo $professor['Batch']; ?></h3>
                <br>
                <h3>Subject: <?php echo $professor['Subject']; ?></h3>
                <br>
                <h3>Year: <?php echo $professor['Year']; ?></h3>
                <br>
                <h3>Division: <?php echo $professor['Division']; ?></h3>
                <br>
            </div>
        </div>
    </body>
</html>