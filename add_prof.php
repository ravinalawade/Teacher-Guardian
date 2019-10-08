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
            <h2 class="heading">Add New Professor</h2>
        </div>
        <div class="container-fluid">
            <form action="add_prof.php" method="POST">
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
                    <label for="address">Address: </label>
                    <textarea id="address" class="form-control" name="address" rows="5" cols="25" required></textarea>
                </div>
                <button type="submit" class="btn btn-lg">Submit</button>
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
            $fname = test_input($_POST["first"]);
            $mname = test_input($_POST["middle"]);
            $lname = test_input($_POST["last"]);
            $date = $_POST["dob"];
            $email = test_input($_POST["email"]);
            $address = $_POST["address"];
            echo $fname;
            echo $address;
            // echo $date;
        
            $q1 = "insert into professor values ($pid, '$fname', '$mname', '$lname', '$date')";
            if(!mysqli_query($conn, $q1)){
                echo "Added successfully";
            }
            $q2 = "insert into professor_email values ($pid, '$email')";
            if(mysqli_query($conn, $q2)){
                echo "added 2 successfully";
            }
            $q2_1 = "insert into prof_address values ($pid, '$address')";
            if(mysqli_query($conn, $q2_1)){
                echo "added 3 successfully";
            }
            if($q1 and $q1 and $q2_1) header("Location: admin_panel.php");
    
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