<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap 4 Toast</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
    
    .options{
                height: 100%;
                width: 25%; /* Set the width of the sidebar */
                position: fixed; /* Fixed Sidebar (stay in place on scroll) */
                left: 0;
                background-color: rgb(114, 230, 114); /* Black */
                overflow-x: hidden; /* Disable horizontal scroll */
                padding-top: 20px;
            }

    .det{
        position: absolute;
        left:550px;
        top:100px;
    }
</style>
<script>
    $(document).ready(function(){
        $(".show-toast").click(function(){
            $("#myToast").toast('show');
        });
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
            else{
            echo "hello";
        }

        function helloclass(){

                    $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
                    $Div='A';
                    $query='select *
                    from students where Division="A"
                    ';
                    $classstu=mysqli_query($conn,$query);

                    echo'<table class="table table-hover" style="height:50%; width:40%; left:430px; top:200px; position:relative; ">
            <tbody>
                <tr>
                <th colspan="5" style="text-align: center;">Details</th>
                </tr>
                <tr>
                        <th>Name</th>
                        <th>Date Of birth</th>
                        <th>Year</th>
                        <th>Division</th>
                        <th>Batch</th>
                </tr>';
                //$rows=mysqli_fetch_assoc($classstu);
                //print_r(mysqli_fetch_array($classstu));
              while($rows=mysqli_fetch_assoc($classstu)){
                //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                echo('
                <tr>

                    <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                    <th>'.$rows["Date_of_birth"].'</th>
                    <th>'.$rows["Study_year"]. '</th>
                    <th>'.$rows["Division"].'</th>
                    <th>'.$rows["Batch"].'</th>
                    <th>hello</th>
                </tr>');
            }
                
                //echo .$rows.;
                //echo "Ravi";
                }
                
        function hellobatch(){
                                  $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
                    $Div='A';
                    $query='select *
                    from students where Batch=3
                    ';
                    $classstu=mysqli_query($conn,$query);

                    echo'<table class="table table-hover" style="height:50%; width:40%; left:430px; top:200px; position:relative; ">
            <tbody>
                <tr>
                <th colspan="5" style="text-align: center;">Details</th>
                </tr>
                <tr>
                        <th>Name</th>
                        <th>Date Of birth</th>
                        <th>Year</th>
                        <th>Division</th>
                        <th>Batch</th>
                </tr>';
                //$rows=mysqli_fetch_assoc($classstu);
                //print_r(mysqli_fetch_array($classstu));
              while($rows=mysqli_fetch_assoc($classstu)){
                //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                echo('
                <tr>

                    <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                    <th>'.$rows["Date_of_birth"].'</th>
                    <th>'.$rows["Study_year"]. '</th>
                    <th>'.$rows["Division"].'</th>
                    <th>'.$rows["Batch"].'</th>
                    <th>hello</th>
                </tr>');
            }
          }

  if (isset($_GET['class']) ) {
    helloclass();
  }
  if (isset($_GET['batch'])) {
    hellobatch();
  }

        if (!empty($_POST))
        {
$first=$_POST["firstname"];
$middle=$_POST["middlename"];
$last=$_POST["lastname"];
$Mother=$_POST["mothername"];
$sid=(int)$_POST["stu_id"];
$soy=$_POST["syear"];
$divi=$_POST["division"];
$rno=$_POST["rno"];
$ay=$_POST["ayear"];
$bat=$_POST["batch"];
    echo $first;
    echo $middle;
    echo $last;

    $q="insert into students (student_id,FIrst,Middle,Last,Mother,Date_of_birth,Blood_grp,Study_year,Admission_year,Division,Roll_no,Batch)
values ($sid,'$first','$middle','$last','$Mother',13-03-2000,'A+',$soy,$ay,'$divi',$rno,$bat)";
$q1=mysqli_query($conn,$q);
if($q1){
    echo "done";
}
    }
mysqli_close($conn);
    ?>


    <div class="bs-example" style="position:relative;">
    <div class="options">
        <p>Photo</p>
        <br>
        <a href='teacher.php?class=true;batch=false' class="btn btn-primary">class</a>
        <a href='teacher.php?batch=true;class=false' class="btn btn-primary">batch</a>
    </div>

	<button type="button" style="position: absolute; left:500px;" class="btn btn-primary show-toast">Show Toast</button>
    <div class="toast" data-autohide="false" id="myToast" style="position: absolute; top: 0; right: 0;">
        <div class="toast-header">
            <strong class="mr-auto"><i class="fa fa-grav"></i> We miss you!</strong>
            <small>11 mins ago</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <div>
                <h1>Write Details</h1>
                <form method="post" action="teacher.php">
                    firstname:<input type="text" name="firstname">
                    <br><br>
                    Middle name:
                    <input type="text" name="middlename">
                    <br>
                    Last name:
                    <input type="text" name="lastname">
                    <br>
                    Student_id:
                    <input type="text" name="stu_id">
                    <br>
                    Mother name:
                    <input type="text" name="mothername">
                    <br>
                    Study year:
                    <input type="date" name="syear">
                    <br>
                    Admission year:
                    <input type="date" name="ayear">
                    <br>
                    Division:
                    <input type="text" name="division">
                    <br>
                    Batch:
                    <input type="number" name="batch">
                    <br>
                    Roll no:
                    <input type="number" name="rno">
                    <br>
                    <input type="submit" name="submit">
    
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>                            