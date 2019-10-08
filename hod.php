<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hod page</title>
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
else{
echo "hello";
}
$query = "select * from students ";
$stud=mysqli_query($conn,$query);
$query1="select * from professor";
$profess=mysqli_query($conn,$query1);
?>
<script>
        function fstudents() {
        var x = document.getElementById("students");
        x.style.display = "block";
        var y = document.getElementById("professor");
        y.style.display = "none";
        console.log(x);
    }
    function fprofessor() {
        var x = document.getElementById("professor");
        x.style.display = "block";
        var y = document.getElementById("students");
        y.style.display = "none";
        console.log(x);
    }
    jQuery(document).ready(function($) {
    $(".clickrow").click(function() {
        window.location = $(this).data("href");
    });
    });
</script>
</head>
<body>
    <div class="base" style="position:relative;">
        <div class="options">
            <p>NAME:Pande</p>
            <br>
            <p>Email id</p>
        </div>
        
        <button onclick="fstudents()" class="btn btn-primary" style="position:absolute; left:400px; top:30px; ">Student</button>
        <button onclick="fprofessor()" class="btn btn-primary" style="position:absolute; left:550px; top:30px; ">Professor</button>
        <div id="students" style="display:none;">
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
                    while($rows=mysqli_fetch_assoc($stud)){
                        //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                        echo('
                        <tr class="clickrow" data-href="student_info.php?id='.$rows["student_id"].'">
        
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
        <div id="professor">
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
                        while($rows=mysqli_fetch_assoc($profess)){
                            //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                            echo('
                            <tr class="clickrow" data-href="teacher_info.php?id='.$rows["professor_id"].'">
            
                                <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                                <th>'.$rows["Date_of_Birth"].'</th>
                                <th>'.$rows["Year"]. '</th>
                                <th>'.$rows["Division"].'</th>
                                <th>'.$rows["Batch"].'</th>
                                <th>hello</th>
                            </tr>');
                        }
                        ?>
                    </tbody>
                </table>
            hello I am professor
        </div>
    </div>
</body>
</html>