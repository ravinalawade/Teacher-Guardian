<?php session_start(); ?>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <title>Student Login Form</title>
    <style>
      body{
            background-color: #C5C6C7;
          }
          .container.page{
            background-color: #45A29E;
            color: #0B0C10;
            border-radius: 10px;
            /* padding: 0; */
          }
          .container.name{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
            font-style: italic;
          }
          .container.additional{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
            /* font-style: italic;  */
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
              margin: 20px 20px 20px 20px;
              background-color: #66FCF1;
              border-radius: 100%;
              padding: 10px;
          }
          .jumbotron{
            background-color: #1F2833;
            color: #45A29E;
            font-size: 25px;
            font-family: Arial, Helvetica, sans-serif;
            padding: 15px;
            width: 100%;
            margin-top: 15px;
          }
          .title{
            margin-top: 0px;
            width: 100%;
            border-radius: 20px;
            border-radius: 0;
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
          .rows:hover{
              background-color: #0B0C10;
              color: #66FCF1;
          }
          button{
              background-color: #0B0C10;
              border: 1px solid #66FCF1;
              color: #66FCF1;
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
          }
          button:hover{
              background-color: #4FA29E;
              color: #0B0C10;
          }
          .form-control{
            width: 600px;
            background-color: #C5C6C7;
            color: #0B0C10;
          }
          textarea, #cer{
            background-color: #C5C6C7;
            color: #0B0C10;
          }
          .search-box{
            width: 300px;
            position: relative;
            display: inline-block;
            font-size: 14px;
          }
          .search-box input[type="text"]{
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
          }
          .result{
            display: inline;
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
          }
          .search-box input[type="text"], .result{
            width: 100%;
            box-sizing: border-box;
          }
            /* Formatting result items */
          .result p{
            /* display: inline; */
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
            background: white;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
          }
          .result p:hover{
            background: #f2f2f2;
          }
          .round_selected{
            display: block;
            padding: 16px 16px 16px 16px;
            margin: 10px 10px 10px 10px;
            width: 250px;
            border :2px solid;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 20px;
          }
          #fs{
            margin-left: 450px;
          }
          #fs:hover{
            color: #0B0C10;
            border: 1px solid #0b0c10;
          }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <script>
        function editDetails() {
            var x = document.getElementById("editbox");
            x.style.display = "block";
            var y = document.getElementById("displayBox");
            y.style.display = "none";
            console.log(x);
        }
    
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
      $id = $_SESSION['id'];
      $qp = "select * from students natural join student_email natural join student_address where student_id=$id";
      $queryp = mysqli_query($conn, $qp);
      $detail = mysqli_fetch_assoc($queryp);
      $qs = "select * from skills where student_id=$id";
      $querys = mysqli_query($conn, $qs);
      $qa = "select * from achivements where student_id=$id";
      $querya = mysqli_query($conn, $qa);
      $qr = "select * from result where student_id=$id";
      $queryr = mysqli_query($conn, $qr);
      $qat = "select * from attendance where student_id=$id";
      $queryat = mysqli_query($conn, $qat);
    ?>
    <div class="jumbotron text-center title">
      <h1>Student Profile</h1>
      <button type="button" class="btn btn-lg" onclick="editDetails()">Edit Details</button>
    </div>
    <div class="container page">
      <div class="container-fluid" id="displayBox">
          <div class="jumbotron text-center">
              <h1>Personal Student Details</h1>
          </div>
          <div class="container name">
              <div class="row">
                <div class="col-md-3">
                    <div class="container text-center heading">
                        <img src="contact.jpg" alt="pratik" class="thumbnail">
                    </div>
                </div>
                <div class="col-md-9">
                    <h3>Name: <?php echo $detail['First'].' '.$detail['Middle'].' '.$detail['Last']; ?></h3>
                    <h3>Mother Name: <?php echo $detail['Mother'].' '.$detail['Last']; ?></h3>
                    <h3>Date of Birth: <?php echo $detail['Date_of_birth']; ?></h3>
                    <h3>Blood Group: <?php echo $detail['Blood_grp']; ?></h3>
                    <h3>Email: <?php echo $detail['Email']; ?></h3>
                    <h3>Address: <?php echo $detail['Location']; ?></h3>
                    <h3>Year of Study: <?php echo $detail['Study_year']; ?></h3>
                    <h3>Division: <?php echo $detail['Division']; ?></h3>
                    <h3>Batch: <?php echo $detail['Batch']; ?></h3>
                    <h3>Roll_no: <?php echo $detail['Roll_no']; ?></h3>
                </div>
              </div>
          </div>
          <div class="jumbotron text-center">
              <h1>Skills</h1>
          </div>
          <table class="table">
              <thead>
                  <tr>
                      <th>Type of Skill</th>
                      <th>Name of Skill</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      while($rows=mysqli_fetch_assoc($querys))
                      {
                  ?>
                  <tr class="rows">
                          <td><?php echo $rows['Type']; ?></td>
                          <td><?php echo $rows['Skill_name']; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
              </tbody>
          <table>
          <div class="jumbotron text-center">
              <h1>Achievements</h1>
          </div>
          <table class="table">
              <thead>
                  <tr>
                      <th>Type</th>
                      <th>Description</th>
                      <th>Perfomance</th>
                      <th>Certificate</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                      while($rows=mysqli_fetch_assoc($querya))
                      {
                  ?>
                  <tr class="rows">
                          <td><?php echo $rows['Tech/NonTech']; ?></td>
                          <td><?php echo $rows['Description']; ?></td>
                          <td><?php echo $rows['Won/Lost']; ?></td>
                          <td><?php echo $rows['Certificate']; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
              </tbody>
          <table>
          <div class="jumbotron text-center">
              <h1>Results</h1>
          </div>
          <table class="table" >
              <thead class="thead-dark">
                <tr class="table-active">
                <td>Exam-Date</td>
                <td>Semester</td>
                <td>Subject</td>
                <td>Pointer</td>
                <td>Pass/Fail</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($rows=mysqli_fetch_assoc($queryr))
                  {
                ?>
                <tr class="rows">
                    <td><?php echo $rows['Exam_date']; ?></td>
                    <td><?php echo $rows['Semester']; ?></td>
                    <td><?php echo $rows['Subject']; ?></td>
                    <td><?php echo $rows['Pointer']; ?></td>
                    <td><?php echo $rows['Pass/Fail']; ?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
          </table>
          <div class="jumbotron text-center">
              <h1>Attendance</h1>
          </div>
          <table class="table" >
              <thead class="thead-dark">
                <tr class="table-active">
                <td>Semester</td>
                <td>Year</td>
                <td>Month</td>
                <td>Attendance</td>
                </tr>
              </thead>
              <tbody>
                <?php
                  while($rows=mysqli_fetch_assoc($queryat))
                  {
                ?>
                <tr class="rows">
                  <td><?php echo $rows['Semester']; ?></td>
                  <td><?php echo $rows['Year']; ?></td>
                  <td><?php echo $rows['Month']; ?></td>
                  <td><?php echo $rows['attend']; ?></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
          </table>
      </div>
      <div class="container-fluid personal" style="display:none;" id="editbox">
          <div class="jumbotron text-center">
              <h1>Personal Student Details</h1>
          </div>
          <div class="container name">
            <form action="student_form.php" method="POST">
              <div class="form-group">
                  <label for="first">First Name: </label>
                  <input id="first" type="text" class="form-control" name="firstname" placeholder="First Name" required>
              </div>
              <div class="form-group">
                  <label for="middle">Middle Name: </label>
                  <input id="middle" type="text" class="form-control" name="middlename" placeholder="Middle Name" required>
              </div>
              <div class="form-group">
                  <label for="last">Last Name: </label>
                  <input id="last" type="text" class="form-control" name="lastname" placeholder="Last Name" required>
              </div>
              <div class="form-group">
                  <label for="dob">Date of Birth: </label>
                  <input id="dob" type="date" class="form-control" name="dob" placeholder="Date" required>
              </div>
              <div class="form-group">
                  <label for="bloodgrp">Blood Group: </label>
                  <input id="bloodgrp" type="text" class="form-control" name="bloodgrp" placeholder="Blood Group" required>
              </div>
              <div class="form-group">
                  <label for="email">Email: </label>
                  <input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
              </div>
          </form>
              <h3 name = "syear">Year of Study: </h3>
              <h3 name = "divi">Division: </h3>
              <h3 name = "roll">Roll_no: </h3>
              <h3 name = "batch">Batch: </h3>
          </div>
          <div class="jumbotron text-center">
            <h1>Skills</h1>
          </div>
            <div class="container additonal">
              <h3>Type of Skill:</h3>
              <select id="skill_type" name="skill_type">
                <option value="none" selected >none</option>
                <option value="t">Technical</option>
                <option value="nt">Non-Technical</option>
              </select>
              <br>
              <div class="search-box">
                <input type="text" id="myinput" autocomplete="off" placeholder="Search skill..." />
                <div class="result"> </div>
              </div>
              <button id = 'my_button' type="button">Add Skill</button>
              <div id="selected"> </div>
            </div>
            <div class="jumbotron text-center">
              <h1>Achievement</h1>
            </div>
            <div class="container additional">
              <!-- <div id = "ach">
                <table id ="tach" >
                  <th> Type </th>
                  <th> Status </th>
                  <th> Description </th>
                  <th> Certificate </th>
                </table>
              </div> -->
              <form method="POST" action="student_form.php">
                <div class="form-group">
                    <label for="type">Type of Achievement:</label>
                    <input type="radio" name="a_type" value="T">Technical
                    <input type="radio" name="a_type" value="NT">Non Technical
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" rows="5" cols="50" > </textarea>
                </div>
                <div class="form-group">
                    <label for="participate">Won/Participation:</label>
                    <input type="radio" name="wl" value="W" >Won
                    <input type="radio" name="wl" value="P">Participation
                </div>
                <div class="form-group">
                    <label for="certificate">Certificate:</label>
                    <input type="url" name="certificate" id="cer">
                    <button id = 'my_ach_button' type="button">Add Achievement</button>
                </div>
              </form>
              <button type="submit" name="Submit"class="btn btn-lg" id="fs" onclick="window.location.href = 'student_form.php';"> Submit</button>
            </div>
      </div>
    </div>
    <script type="text/javascript">
      var selected_items=[];
      var text='';
      var type;
      //hiding skill addition box
      $(document).ready(function(){
        $("#myinput").hide();
        $("#my_button").hide();
        $("[name = 'a_type']").prop('checked',false);
        $("[name = 'description']").val('');
        $("[name = 'wl']").prop('checked',false);
        $("[name = 'certificate']").val('');
        $("#skill_type").val('none');
        $.post('backend_query.php',{something :'t'}).done(function(data){
          var value = data.split(',');
          // alert(data);
          $("[name = 'firstname']").val(value[1]);
          $("[name = 'middlename']").val(value[2]);
          $("[name = 'lastname']").val(value[3]);
          $("[name = 'mothername']").val(value[4]);
          $("[name = 'dob']").val(value[5]);
          $("[name='bloodgrp']").val(value[6]);
          $("[name = 'syear']").append(value[7]);
          $("[name = 'divi']").append(value[9]);
          $("[name = 'roll']").append(value[10]);
          $("[name = 'batch']").append(value[11]);
          $("[name='email']").val(value[12]);
          // alert(value[12]);
        })
        //display skills
        $.post('backend_query.php',{ y : 't'}).done(function(data){
          var display_skill = data.split(',');
          if (display_skill.length > 0 ){
            var i = display_skill.length;
            while(i > 0){
              $("#selected").append('<div class="round_selected">'+ display_skill[i-1] +'</div>');
              selected_items.push(display_skill[i-1]);
              i=i-1;
            }
          }
        })
        //display achievements
        $.post('backend_query.php',{ z:'t'}).done(function(data){
          var display_ach = data.split(',');
          if (display_ach.length > 0){
            var i = display_ach.length;
            while(i > 0){
              $("#tach").append('<tr><td>'+ display_ach[i-4] +'</td><td>'+ display_ach[i-2] +'</td><td>'+ display_ach[i-3] +'</td><td>'+ display_ach[i-1] +'</td></tr>');
              i=i-5;
            }
          }
        })
      });
      //showing skill addition box
      $(document).ready(function(){
        $("#skill_type").change(function(){
          type = $("#skill_type").val();
          $("#myinput").show();
          $("#my_button").show();
          //console.log(type);
        })
      });
      //searchbox code
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
            }
          else{
            resultDropdown.empty();
            }
        });
        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
        //$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        //$(this).parent(".result").empty();
          text=$(this).text();
          $("#myinput").val(text);
          $(this).parent(".result").empty();
        });
      });
        //submit skill button action
      $(document).ready(function(){
        $("#my_button").click(function(){
          //alert(text);
          //alert(selected_items.includes(text));
          if(!selected_items.includes(text)){
            if(text!=''){
              $("#selected").append('<div class="round_selected">'+text+'</div>');
              selected_items.push(text);
            }
            else{
              text = $("#myinput").val() + '';
              $("#selected").append('<div class="round_selected">'+text+'</div>')
              selected_items.push(text);
            }
          }
          $("#myinput").val('');
          //alert(type);
          $.post('backend_query.php', {skill_array_student: text,type: type}).done(function(data){
            //alert(data);
          });
          //alert(selected_items);
          $("#skill_type").val('none');
          $("#myinput").hide();
          $("#my_button").hide();
        })
      });
      $(document).ready(function(){
        $("#my_ach_button").click(function(){
            var a_type = $("input[name = 'a_type']:checked").val();
            alert(a_type);
            var description = $("[name = 'description']").val();
            var wl = $("input[name = 'wl']:checked").val();
            var certificate = $("[name = 'certificate']").val();
            if(!(a_type && description && wl && certificate)){
              alert("cannot leave blank fields");
            }
            else{
              $.post('backend_query.php', {a_type: a_type,description: description,wl: wl,certificate: certificate}).done(function(data){
              //  alert(data);
                $("#ach").append("<div> <p>"+description+"</p><p>"+wl+"</p><p>"+certificate+"</p></div>");
                $("[name = 'a_type']").prop('checked',false);
                $("[name = 'description']").val('');
                $("[name = 'wl']").prop('checked',false);
                $("[name = 'certificate']").val('');
              });
            }
        })
      })
      $(document).ready(function(){
        $("#fs").click(function(){
          //write code here.
          var id ='<?php echo $id ;?>';
          var updateda =[];
          updateda.push(id);
          updateda.push($('#first').val());
          updateda.push($('#middle').val());
          updateda.push($('#last').val());
           updateda.push($('#dob').val());
           updateda.push($('#bloodgrp').val());
           updateda.push($('#email').val());
           var updated = updateda.toString();
           alert(id);
           $.post('backend_query.php',{updated:updated}).done(function(data){
             alert(data);
           });
         });
       });
    </script>
  </body>
</html>