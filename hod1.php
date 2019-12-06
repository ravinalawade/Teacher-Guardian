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

            body{
                background-color: #C5C6C7;
            }
            .col-md-3{
                background-color: #0B0C10;;
                height: 100vh;
                margin-left: 0;
                padding: 10px;
                position: sticky;
            }
            .thumbnail{
                width: 200px;
                height: 200px;
                /* margin-left: 80px; */
                border-radius: 50%; 
            }
            .heading{
                width: 220px;
                height: 220px;
                margin: 20px 0 20px 55px;
                background-color: #66FCF1;
                border-radius: 100%;
                padding: 10px;
            }
            .details{
                color: #66FCF1;
                font-size: 15px;
            }
            .jumbotron{
                background-color: #1F2833;
                color: #45A29E;
                padding: 25px;
                margin-top: 20px;
                border-radius: 40px;
            }
            .table{
                background-color: #1F2833;
                color: #4FA29E;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            thead{
                background-color: #0B0C10;
                color: #C5C6C7;
            }
            tr:hover{
                background-color: #0B0C10;
                color: #66FCF1;
            }
            .c1{
                margin-left: 150px;
            }
            .c2{
                margin-right: 150px;
            }
            .btn{
                background-color: #0B0C10;
                border: 1px solid #66FCF1;
                border-radius: 30px;
                font-size: 30px;
                color: #66FCF1;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .btn:hover{
                background-color: #4FA29E;
                color: #0B0C10;
            }
            .submit, #my_button{
                background-color: #45A29E;
                columns: #0B0C10;
                font-size: 25px;
                border: 1px solid #0B0C10;
                border-radius: 10px;
                margin-top: 5px;
            }
            form{
                margin: 10px;
            }
            select{
                background-color: #C5C6C7;
                color: #0B0C10;
                font-size: 25px;
                border: 1px solid #0B0C10;
                border-radius: 15px;
                margin: 5px;
            }
            select option{
                font-size: 20px;
                background-color: #45A29E;
            }
            .search-box{
                width: 300px;
                position: relative;
                display: inline-block;
                font-size: 24px;
                padding: 10px;
                border-radius: 25px;
                background-color: #C5C6C7;
                color: #1F2833;
                margin-top: 15px;
            }
            .search-box input[type="text"]{
                height: 32px;
                padding: 5px 10px;
                border: 1px solid #CCCCCC;
                background-color: #C5C6C7;
                color: #1F2833;
                font-size: 24px;
            }
            /* .result{
                position: absolute;
                z-index: 999;
                top: 100%;
                left: 0;
            } */
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */
            .result p{
                position:relative;
                margin: 0;
                padding: 7px 10px;
                border: 1px solid  #45A29E;
                border-top: none;
                cursor: pointer;
            }
            .result p:hover{
                background:  #45A29E;
            }
            .round_selected{
                display:inline-block;
                padding: 16px 16px 16px 16px;
                margin: 10px 10px 10px 10px;
                min-width:10px;
                border :2px solid black;
                border-top-right-radius: 25px;
                border-bottom-right-radius: 25px;
                border-top-left-radius: 25px;
                border-bottom-left-radius: 25px;
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
            $query = "select * from students ";
            $stud=mysqli_query($conn,$query);
            //echo isset($_POST['submit']);
            if(isset($_POST['submit'])){
                $y=$_POST['Year'];
                $d=$_POST['Division'];
                $b=$_POST['Batch'];
                $query ="select * from students where Study_year like '$y%' and Division like '$d%' and Batch like '$b%' ";
                $stud=mysqli_query($conn,$query);
                //echo"in selection";
                //print_r($stud);
            }
            $query1="select * from professor natural join prof_rol";
            $profess=mysqli_query($conn,$query1);

            $qh = "select * from professor natural join prof_address natural join professor_email where professor_id=1233";
            $hod = mysqli_query($conn, $qh);
            $detail = mysqli_fetch_assoc($hod);
        ?>
        <script>
            function fstudents() {
                var x = document.getElementById("students");
                x.style.display = "block";
                var y = document.getElementById("professor");
                y.style.display = "none";
                var z = document.getElementById("studSkills");
                z.style.display = "none";
                console.log(x);
            }
            function fprofessor() {
                var x = document.getElementById("professor");
                x.style.display = "block";
                var y = document.getElementById("students");
                y.style.display = "none";
                var z = document.getElementById("studSkills");
                z.style.display = "none";
                console.log(x);
            }
            function skillstudents() {
                var x = document.getElementById("studSkills");
                x.style.display = "block";
                var y = document.getElementById("students");
                y.style.display = "none";
                var z = document.getElementById("professor");
                z.style.display = "none";
                console.log(x);
            }
            jQuery(document).ready(function($) {
            $(".clickrow").click(function() {
                window.location = $(this).data("href");
            });
            });
        </script>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script type="text/javascript">

            var selected_items=[];

            $(document).ready(function(){
                $('.search-box input[type="text"]').on("keyup input", function(){
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if(inputVal.length){
                        $.get("backend-search.php", {term: inputVal}).done(function(data){
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else{
                        resultDropdown.empty();
                    }
                });

                // Set search input value on click of result item
                $(document).on("click", ".result p", function(){
                    //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    //$(this).parent(".result").empty();
                    var text=$(this).text();
                    selected_items.push(text);
                    $("#selected").append('<div class="round_selected">'+text+'</div>');
                    $(this).parent(".result").empty();
                    $("#myinput").val('');
                });
            });

            // $(document).ready(function(){
            //     $("#my_button").click(function(){
            //         alert (selected_items) ;
            //         $.post('backend_query.php', {skill_array: selected_items}).done(function(data){
            //         selected_items=[];
            //         // alert (data);
            //         // console.log(data);
            //         // write code to display echoed statements.  variable data has all the returned echo values.
            //         // $("#studSkills").append('<div>'+data+'</div>');
            //         const skills = document.getElementById('studSkills');
            //         var datarr = new Array();
            //         datarr = data.split(',');
            //         alert (datarr);
                    
            //         });
            //     });
            // });

            $(document).ready(function(){
                $("#my_button").click(function(){
                    // alert (selected_items) ;
                    $.post('backend_query.php', {skill_array: selected_items}).done(function(data){
                    selected_items=[];
                    // alert (data);
                    // console.log(data);
                    // write code to display echoed statements.  variable data has all the returned echo values.
                    // $("#studSkills").append('<div>'+data+'</div>');
                    const skills = document.getElementById('studSkills');
                    var datarr = new Array();
                    datarr = data.split(',');
                    // alert (datarr);
                    var j= datarr.length ;
                    while(j>0){
                      $("#mt").append('<tr><td>'+datarr[j-7]+' '+datarr[j-6]+' '+datarr[j-5]+'</td><td>'+datarr[j-4]+'</td><td>'+datarr[j-3]+'</td><td>'+datarr[j-2]+'</td><td>'+datarr[j-1]+'</td></tr>');
                      j=j-8;
                    }
                    //stuid8
                    //fn7 mn6 ln5 dob4 stuyr3 div2 batch1
                    });
                })
            });

        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="container text-center heading">
                        <img src="contact.jpg" alt="pratik" class="thumbnail">
                    </div>
                    <div class="container details">
                        <h4><?php echo $detail['First'].' '.$detail['Middle'].' '.$detail['Last']; ?></h4>
                        <br>
                        <h5>Date of Birth: <?php echo $detail['Date_of_Birth']; ?></h5>
                        <br>
                        <h5>Address: <?php echo $detail['Location']; ?></h5>
                        <br>
                        <h5>Email: <?php echo $detail['Email_id']; ?></h5>
                        <br>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container text-center">
                        <div class="jumbotron text-center info">
                            <h1>College Database</h1>
                            <div class="row">
                                <div class="col-md-4">
                                    <button onclick="fstudents()" class="btn btn-primary">Student</button>
                                    <form name="selection" action="hod1.php" method="post">
                                        <select name="Year">
                                            <option value="_">None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                        <select name="Division">
                                            <option value="_">None</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                        </select>
                                        <select name="Batch">
                                            <option value="_">None</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>  
                                        <button type="submit" name="submit" onclick="fstudents()" class="submit">Submit</button>
                                    </form> 
                                </div>
                                <div class="col-md-4">
                                    <button onclick="fprofessor()" class="btn btn-primary">Professor</button>
                                </div>
                                <div class="col-md-4">
                                    <div class="search-box">
                                        <input type="text" id="myinput" autocomplete="off" placeholder="Search skill..." />
                                        <div class="result"></div>
                                    </div>
                                    <input id="my_button" type="button" value="Submit" onclick="skillstudents()"/>
                                    <br>
                                    <div id="selected"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div id="students">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date Of birth</th>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Batch</th>
                                        <tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($rows=mysqli_fetch_assoc($stud)){
                                            //echo $rows["FIrst"].' '.$rows["Middle"].' '.$rows["Last"];
                                            echo('
                                            <tr class="clickrow" data-href="student_infohod.php?id='.$rows["student_id"].'">
                            
                                                <th>'.$rows["First"].' '.$rows["Middle"].' '.$rows["Last"] .'</th>
                                                <th>'.$rows["Date_of_birth"].'</th>
                                                <th>'.$rows["Study_year"]. '</th>
                                                <th>'.$rows["Division"].'</th>
                                                <th>'.$rows["Batch"].'</th>
                                            </tr>');
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="professor" style="display:none;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date Of birth</th>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Batch</th>
                                        <tr>
                                    </thead>
                                    <tbody>
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
                                            </tr>');
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="container" style="display: none;" id="studSkills">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date Of birth</th>
                                            <th>Year</th>
                                            <th>Division</th>
                                            <th>Batch</th>
                                        <tr>
                                    </thead>
                                    <tbody id="mt">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>