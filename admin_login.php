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
<?php
$servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

if (!empty($_POST))
        {
$username=$_POST['email'];
$password=$_POST['pwd'];
if($username=='admin1234@gmail.com' && $password==98765)
{
header("Location:admin_panel.php");
}
else if($username=='hod1234@gmail.com' && $password==2468)
{
header("Location:hod.php");
}
else{
$q="select * from professor_email where Email_id='$username' and professor_id=$password";
$q1=mysqli_query($conn,$q);
$c=mysqli_num_rows($q1);
$q2  = "select Role from prof_role where professor_id = $password";
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
if ($c==0)
{
    echo "incorrect username and password";
}
else if($c1==1){
    if ($teacher["Role"]=='Guardian')
        header("Location:teacher2.php");
    else
        header("Location:teacher3.php");
}
else
{
    header("Location:teacher.php?pass=$password");
}

}
}
//include 'admin_panel.php';
?>
        
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Admin Panel</h1>
        </div>
        <div class="container">
            <form name="admin" action=admin_login.php method="post">
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