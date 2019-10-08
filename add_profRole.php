<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="forms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Professor</title>

    <style>
        body{
            background-color: #45A29E;
        }
        .container{
            margin-top: 50px;
            width: 600px;
            background-color: #1F2833;
            border-radius: 50px;
        }
        .container:hover {
            box-shadow: 10px 15px 30px rgba(28, 28, 31, 0.952);
        }
        .jumbotron{
            background-color: #0B0C10;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
        .heading{
            color: #45A29E;
            font-size: 60px;
        }
        .form-group{
            color: #66FCF1;
            font-size: 25px;
        }
        .form-control{
            background-color: #C5C6C7;
            border-radius: 20px;
        }
        .form-control::placeholder{
            color: #0B0C10;
        }
        .btn{
            margin-left: 40%;
            background-color: #0B0C10;
            border: 1px solid #66FCF1;
            border-radius: 30px;
            color: #66FCF1;
            margin-bottom: 10px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        button:hover{
            background-color: #4FA29E;
            color: #0B0C10;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="jumbotrom text-center">
            <h2 class="heading">Add Professor Role</h2>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">&times;</button>
        </div>
        <div class="container-fluid">
            <form action="add_profRole.php" method="POST">
                <div class="form-group">
                    <label for="pid">Professor ID: </label>
                    <input id="pid" type="number" class="form-control" name="pid" placeholder="ID" required>
                </div>
                <div class="form-group">
                    <label for="role">Role: </label>
                    <select class="form-control" id="role" name="role">
                        <option>Guardian</option>
                        <option>Incharge</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year: </label>
                    <input id="year" type="number" class="form-control" name="year" placeholder="Year" required>
                </div>
                <div class="form-group">
                    <label for="div">Division: </label>
                    <input id="div" type="text" class="form-control" name="div" placeholder="DIV" required>
                </div>
                <div class="form-group">
                    <label for="bat">Batch: </label>
                    <input id="bat" type="number" class="form-control" name="bat" placeholder="Batch">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <?php
        $servername="localhost";
        //add below line in every file. It displays error for all sql querries.
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = mysqli_connect($servername,"root","","computer_dept") ;
    
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if(!empty($_POST)){
            $pid = (int)test_input($_POST["pid"]);
            $role = test_input($_POST["role"]);
            $year = (int)test_input($_POST["year"]);
            $div = test_input($_POST["div"]);
            $batch = (int)test_input($_POST["bat"]);
    
            $q3  = "insert into prof_rol values ($pid, '$role', $year, '$div', $batch)";
            if(mysqli_query($conn, $q3)){
                echo "Added role Successfully";
                header("Location: admin_panel.php");
            }
    
            mysqli_close($conn);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>