<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style>
            body{
                background-color: #45A29E;
            }
            .container{
                margin-top: 130px;
                width: 30%;
                height: 30%;
                background-color: #1F2833;;
                border-radius: 50px;
                padding: 15px;
                transition: box-shadow 0.5s;
            }
            .container:hover {
                box-shadow: 10px 15px 30px rgba(28, 28, 31, 0.952);
            }
            .btn{
                background-color: #0B0C10;
                border: 1px solid #66FCF1;
                border-radius: 30px;
                color: #66FCF1;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .btn:hover {
                background-color: #4FA29E;
                color: #0B0C10;
            }
            .input-group{
                /* border: 1.5px solid rgb(26, 1, 49); */
                height: 30px;
                border-radius: 20px;
            }
            .form-group{
                color: #45A29E;
                font-size: 20px;
            }
            .form-control::placeholder{
                /* border-left: 1.5px solid rgb(26, 1, 49); */
                color: #45A29E;
            }
            .form-control{
                border-radius: 20px;
            }
            .input-group-addon{
                background-color: #C5C6C7;
                border-radius: 20px;
                /* border: 1px solid rgb(26, 1, 49); */
            }
            .glyphicon{
                color: #0a0501;
            }   
            .heading{
                background-color: #0B0C10;
                border-radius: 50px;
                color: #66FCF1;
                font-size: 35px;
                margin: 0 0 10px 0;
                padding: 10px;
                /* height: 60px; */
            }
            .checkbox{
                color: #66FCF1;
            }
            /* .jumbotron.h2{
                font-size: 25px;
                margin-bottom: 15px; 
            } */
        </style>

        <?php
            $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            if (!empty($_POST)){
                $username=$_POST['email'];
                $password=$_POST['pwd'];
                if($username=='admin1234@gmail.com' && $password==98765){
                    header("Location:admin_panel.php");
                }
                else if($username=='hod1234@gmail.com' && $password==2463){
                    header("Location:hod1.php");
                }
                else{
                    $q="select * from professor_email where Email_id='$username' and professor_id=$password";
                    $q1=mysqli_query($conn,$q);
                    $c=mysqli_num_rows($q1);
                    $q2  = "select Role from prof_rol where professor_id = $password";
                    $query = mysqli_query($conn, $q2);
                    $teacher=mysqli_fetch_assoc($query);
                    $c1 = mysqli_num_rows($query);
                    $_SESSION["id"]=$password;
                    
                    /*
                    $cb="select Division,Batch from professor where professor_id=$password";
                            $cb1=mysqli_query($conn,$cb);
                            $cb2=mysqli_fetch_assoc($cb1);
                            $_SESSION['Div']=$cb2['Division'];
                            $_SESSION['Bat']=$cb2['Batch'];*/
                    if ($c==0 ){
                        if($c1==0){
                            $q3 = "select * from student_email where student_id=$password and Email='$username'";
                            $qu3 = mysqli_query($conn, $q3);
                            $c2 = mysqli_num_rows($qu3);
                            if($c2!=0)
                                header("Location:student_form.php");
                            else
                                echo "<script> alert('incorrect username and password'); </script>";
                        }
                        else
                        echo "<script> alert('incorrect username and password'); </script>";
                    }
                    else if($c1==1){
                        if ($teacher["Role"]=="Guardian"){
                            echo $teacher["Role"];
                            header("Location:teacher2.php");
                        }
                        else
                            header("Location:teacher3.php");
                    }
                    else{
                        header("Location:teacher.php?pass=$password");
                    }

                }
            }
            //include 'admin_panel.php';
        ?>
        
    </head>
    <body>
        <div class="container">
            <form name="admin" action=admin_login.php method="post">
                <div class="heading text-center">
                    <h1>Login Form</h1>
                </div>
                <div class="form-group">
                    <label for="email">Email Address: </label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="pwd" type="password" class="form-control" name="pwd" placeholder="Password" required>
                    </div>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" class="btn btn-success btn-lg">
                </div>
            </form>
        </div>
    </body>
</html>