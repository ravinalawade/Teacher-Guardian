<?php session_start();?>
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
    function fclass() {
        var x = document.getElementById("class");
        x.style.display = "block";
        var y = document.getElementById("batch");
        y.style.display = "none";
        console.log(x);
    }
    function fbatch() {
        var x = document.getElementById("batch");
        x.style.display = "block";
        var y = document.getElementById("class");
        y.style.display = "none";
        console.log(x);
    }
    jQuery(document).ready(function($) {
    $(".clickrow").click(function() {
        window.location = $(this).data("href");
    });
});


</script>
<script>
    $( "selector" ).datepicker({
        altField : "#dob"
        altFormat: "yyyy-mm-dd"
    });

    $(document).ready( function() {
        $(document.body).on("click", "tr[data-href]", function () {
            window.location.href = this.dataset.href;
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
        $id=$_SESSION["id"];
        $Divi=$_SESSION['Div'];
        $Bat=$_SESSION['Bat'];
        $query="select *
                    from students where Division='$Divi'
                    ";
        $classstu=mysqli_query($conn,$query);
        $query1="select *
                    from students where Batch=$Bat";
                    
        $batchstu=mysqli_query($conn,$query1);
        /*$cb="select Division,Batch from professor where professor_id=$id";
        $cb1=mysqli_query($conn,$cb);
        $cb2=mysqli_fetch_assoc($cb1);
        $Div=$cb2['Division'];
        $Bat=$cb2['Batch'];*/

        /*function helloclass(){

                    $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
                    $id = $_SESSION['id'];
                    
                    $query =  "select * from students as s, 
                                (select Division, Year from professor where professor_id = '$id') as p
                                where s.Division = p.Division and s.Study_year = p.Year";
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
                //print_r(mysqli_fetch_array($classstu));
              while($rows=mysqli_fetch_assoc($classstu)){
                //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                echo('
                <tr data-href="student_info.html">

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
                    $id = $_SESSION['id'];

                    $query = "select * from students as s,
                            ( select Division,Year,Batch from professor where professor_id = '$id') as p
                            where s.Division = p.Division and Study_year = p.Year and s.Batch=p.Batch";
                    
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
  }*/

        if (!empty($_POST))
        {
$first=$_POST["firstname"];
$middle=$_POST["middlename"];
$last=$_POST["lastname"];
$Mother=$_POST["mothername"];
$date = $_POST["dob"];
$sid=(int)$_POST["stu_id"];
$soy=(int)$_POST["syear"];
$divi=$_POST["division"];
$rno=(int)$_POST["rno"];
$ay=(int)$_POST["ayear"];
$bat=$_POST["batch"];
    echo $first;
    echo $middle;
    echo $last;

    $q="insert into students (student_id,First,Middle,Last,Mother,Date_of_birth,Blood_grp,Study_year,Admission_year,Division,Roll_no,Batch)
values ($sid,'$first','$middle','$last','$Mother', '$date','A+',$soy,$ay,'$divi',$rno,$bat)";
$q1=mysqli_query($conn,$q);
if($q1){
    echo "done";
}
    }

    ?>


    <div class="bs-example" style="position:relative;">
    <div class="options">
        <p>Photo</p>
        <br>
        <button onclick="fclass()" class="btn btn-primary">class</button>
        <button onclick="fbatch()" class="btn btn-primary">batch</button>
        <?php
        //static $id;
        $id=$_SESSION["id"];
        $det1="select * from professor natural join professor_email natural join prof_role where professor_id=$id";
        $det2=mysqli_query($conn,$det1);
        $det3=mysqli_fetch_assoc($det2);
        //print_r($det3);
        echo "
        <br>
        Professor id:<p>".$det3['professor_id']."</p><br>
        Name:<p>".$det3['First']."".$det3['Middle']."".$det3['Last']."</p><br>
        Date of birth:<p>".$det3['Date_of_Birth']."</p><br>
        Email_id:<p>".$det3['Email_id']."</p><br>
        Role:<p>".$det3['Role']."</p><br>
        Year:<p>".$det3['Year']."</p><br>
        Division:<p>".$det3['Division']."</p><br>
        Batch:<p>".$det3['Batch']."</p><br>
        ";

        ?>
    </div>
    
    <div id="class">
    <table class="table table-hover" style="height:50%; width:40%; left:430px; top:200px; position:absolute; ">
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
                <tr>
                <?php 
                while($rows=mysqli_fetch_assoc($classstu)){
                    //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                    echo('
                    <tr class="clickrow" data-href="studentinfo.php?id='.$rows["student_id"].'">
    
                        <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                        <th>'.$rows["Date_of_birth"].'</th>
                        <th>'.$rows["Study_year"]. '</th>
                        <th>'.$rows["Division"].'</th>
                        <th>'.$rows["Batch"].'</th>
                        <th>hello</th>
                    </tr>');
                }
                ?>
            </tbody>
    </table>    
    
    </div>

    <div id="batch" style="display:none;">
    <table class="table table-hover" style="height:50%; width:40%; left:430px; top:200px; position:absolute; ">
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
                <tr>
                <?php 
                while($rows=mysqli_fetch_assoc($batchstu)){
                    //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                    echo('
                    <tr class="clickrow" data-href="studentinfo.php">
    
                        <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                        <th>'.$rows["Date_of_birth"].'</th>
                        <th>'.$rows["Study_year"]. '</th>
                        <th>'.$rows["Division"].'</th>
                        <th>'.$rows["Batch"].'</th>
                        <th>hello</th>
                    </tr>');
                }
                ?>
            </tbody>
    </table>

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
                    Student_id:
                    <input type="number" name="stu_id">
                    <br>
                    Firstname:<input type="text" name="firstname">
                    <br>
                    Middle name:
                    <input type="text" name="middlename">
                    <br>
                    Last name:
                    <input type="text" name="lastname">
                    <br>
                    Mother name:
                    <input type="text" name="mothername">
                    <br>
                    Date ofBirth:
                    <input type="date" name="dob">
                    <br>
                    Study year:
                    <input type="number" name="syear">
                    <br>
                    Admission year:
                    <input type="number" name="ayear">
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