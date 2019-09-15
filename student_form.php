<html>
    <head>
        <title>Student Login Form</title>
        <style>
            body{
                background-color: aquamarine
            }

            .error {color: #FF0000;}

            .title{
                padding: 25px 37%;
                margin: 20px;
                border-style: solid;
                border-color: aqua;
                height: 100px;
                font-size: 20px;
                color: darkblue;
                background-color: darkcyan;
            }

            .personal{

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
            echo "Connected successfully ";
            $q = "select * from students where First = 'Pratik'";
            $query = mysqli_query($conn,$q);
            $value = mysqli_fetch_assoc($query);

            /*$q1 = "select Email_id from email as e, students as s 
                    where students.First = 'Pratik' and email.id = students.student_id";*/
            $q1 ="select email from students NATURAL JOIN student_email";
            
            $query1 = mysqli_query($conn, $q1);
            $value1 = mysqli_fetch_assoc($query1);

            $p = "select student_id from students where First = 'Pratik'";
            $pery = mysqli_query($conn, $p);
            $pv = mysqli_fetch_assoc($pery);
            echo $pv['student_id'];

            $firstErr = $middleErr = $lastErr = $motherErr = $dobErr = $b_grpErr = $emailErr = "";
            $first = $middle = $last = $mother = $dob = $b_grp = $email = "";

            $skilltypeErr = $skillnameErr = $a_typeErr = $cerErr = $wlErr = $desErr = "";
            $skilltype = $skillname = $cer = $wl = $a_type = $des = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["firstname"])) {
                    $firstErr = "First Name is required";
                } 
                else {
                    
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/",$first)) {
                        $firstErr = "Only letters allowed";
                    }
                    else{
                        $first = test_input($_POST["firstname"]);
                    }
                }

                if (empty($_POST["middlename"])) {
                    $middleErr = "Middle Name is required";
                } 
                else {
                    $middle = test_input($_POST["middlename"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/",$middle)) {
                        $middleErr = "Only letters allowed";
                    }
                }
                
                if (empty($_POST["lastname"])) {
                    $lastErr = "Last Name is required";
                } 
                else {
                    $last = test_input($_POST["lastname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/",$last)) {
                        $lastErr = "Only letters allowed";
                    }
                }

                if (empty($_POST["mothername"])) {
                    $motherErr = "Mother Name is required";
                } 
                else {
                    $mother = test_input($_POST["mothername"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z]*$/",$mother)) {
                        $motherErr = "Only letters allowed";
                    }
                }

                if (empty($_POST["dob"])) {
                    $dobErr = "Date of Birth is required";
                } 
                else {
                    $dob = test_input($_POST["mothername"]);

                }

                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } 
                else {
                    $email = test_input($_POST["email"]);
                    // check if name only contains letters and whitespace
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }

                if (empty($_POST["bloodgrp"])) {
                    $b_grpErr = "Blood Group is required";
                } 
                else {
                    $b_grp = test_input($_POST["bloodgrp"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[ABO+- ]*$/",$b_grp)) {
                        $b_grpErr = "Invalid blood group";
                    }
                }

                if (empty($_POST["skilltype"])) {
                    $skilltypeErr = "Type of Skill is required";
                } 
                else {
                    $skilltype = test_input($_POST["skilltype"]);
                }

                if (empty($_POST["skillname"])) {
                    $skillnameErr = "Name of skill is required";
                }
                else {
                    $skillname = test_input($_POST["skillname"]);
                    // check if string contains only lowercase letters and symbols
                    if (!preg_match("/^[a-z0-9+- ]*$/")) {
                        $skillnameErr = "Invalid format";
                    }
                }

                if (!empty($_POST["a_type"]) or !empty($_POST["description"]) or !empty($_POST["wl"]) or !empty($_POST["certificate"])) {
                    if (empty($_POST["a_type"])) $a_typeErr = "Cannnot be left blank";
                    if (empty($_POST["description"])) $desErr = "Cannot be left blank";
                    if (empty($_POST["wl"])) $wlErr = "Cannot be left blank";
                    if (empty($_POST["certificate"])) $cerErr = "Cannot be left blank";

                    if(!empty($_POST["certificate"])) {
                        $cer = test_input($_POST["certificate"]);
                        // check if url is valid
                        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$cer)) {
                            $cerErr = "Invalid url";
                        }
                    }
                }

            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>
        <div class="title">
            <h1>Student Profile</h1>
        </div>
        <div class="personal">
            <h1>Personal Student Details</h1>
            <form method="post" action="student_form.php">
                First name:
                <input type="text" name="firstname" value="<?php echo $value["FIrst"]; ?>">
                <span class="error">* <?php echo $firstErr;?></span>
                <br><br>
                Middle name:
                <input type="text" name="middlename" value="<?php echo $value["Middle"]; ?>">
                <span class="error">* <?php echo $middleErr;?></span>
                <br><br>
                Last name:
                <input type="text" name="lastname" value="<?php echo $value["Last"]; ?>">
                <span class="error">* <?php echo $lastErr;?></span>
                <br><br>
                Mother name:
                <input type="text" name="mothername" value="<?php echo $value["Mother"];?>">
                <span class="error">* <?php echo $motherErr;?></span>
                <br><br>
                Date of Birth:
                <input type="date" name="dob" value="<?php echo $value["Date_of_birth"]; ?>">
                <span class="error">* <?php echo $dobErr;?></span>
                <br><br>
                Blood Group:
                <input type="text" name="bloodgrp" value="<?php echo $value["Blood_grp"]; ?>">
                <span class="error">* <?php echo $b_grpErr;?></span>
                <br><br>
                Email:
                <input type="email" name="email" value="<?php echo $value1["email"]; ?>">
                <span class="error">* <?php echo $emailErr;?></span>
                <br>
                <p>Year of Study: <?php echo $value["Study_year"]; ?></p>
                <p>Division: <?php echo $value["Division"]; ?></p>              
                <p>Roll_no: <?php echo $value["Roll_no"]; ?></p>
                <p>Batch: <?php echo $value["Batch"]; ?></p>

                <h1>Skillsets</h1>
                Type of Skill:
                <input type="radio" name="skilltype" <?php if (isset($skilltype) && $skilltype=="T") echo "checked";?> value="T">Technical
                <input type="radio" name="skilltype" <?php if (isset($skilltype) && $skilltype=="NT") echo "checked";?> value="NT">Non Technical
                <span class="error">* <?php echo $skilltypeErr;?></span>
                <br><br>
                Name of Skill:
                <input type="text" name="skillname">
                <span class="error">* <?php echo $skillnameErr;?></span>
                <h3>Add another Skill</h3>

                <h1>Achievements</h1>
                Type of Achievement:
                <input type="radio" name="a_type" value="T">Technical
                <input type="radio" name="a_type" value="NT">Non Technical
                <span class="error"> <?php echo $a_typeErr;?></span>
                <br><br>
                Description:
                <textarea name="description" rows="5" cols="50"></textarea>
                <span class="error"> <?php echo $desErr;?></span>
                <br><br>
                Won/Lost:
                <input type="radio" name="wl" value="W">Won
                <input type="radio" name="wl" value="L">Lost
                <span class="error"> <?php echo $wlErr;?></span>
                <br><br>
                Certificate:
                <input type="url" name="certificate">
                <span class="error"> <?php echo $cerErr;?></span>
                <br><br>
                <h3>Add another Skill</h3>
                <br><br>

                <input type="submit" name="Submit" value="submit">
            </form>
        </div>

        <?php
        $servername="localhost";
            //add below line in every file. It displays error for all sql querries.
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            $conn = mysqli_connect($servername,"root","","computer_dept") ;
            $value2=13;
            $q2 = "update students set FIrst='$first', Middle='$middle', Last='$last', Mother='$mother', Date_of_birth='$dob', Blood_grp='$b_grp'
             where id=2 ";
            if (mysqli_query($conn, $q2)) {
                echo "Sucess";
            }
            /*echo "$first";
            $q3 = "select student_id from students where First = $first";
            $query2 = mysqli_query($conn, $q3);
            $value2 = mysqli_fetch_assoc($query1);*/


            /*$q4 = "insert into email (id,Email_id) values ($value2, $email)";
            /*if (mysqli_query($conn, $q4)) {
                echo "Sucess";
            }*/

            $q5 = "insert into skills (student_id,Skill_name,Certificate,Committee,Role) values ($value2, $skilltype, $skillname)";
            if (mysqli_query($conn, $q5)) {
                echo "Sucess";
            }

            if ($des != ""){
                $q6 = "insert into achivements (student_id,Tech/NonTech,Description Won/Lost,Certificate) values ($value2, $a_type, $des, $wl, $cer)";
                /*if (mysqli_query($conn, $q6)) {
                    echo "Sucess";
                }*/
            }

        ?>
        
    </body>
</html>