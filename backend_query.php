<?php session_start(); ?>
<?php
  $servername="localhost";
  //add below line in every file. It displays error for all sql querries.
  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $conn = mysqli_connect($servername,"root","","computer_dept");

  $id = $_SESSION['id'];

  //skills
  if(isset($_POST['skill_array_student'])){
    $s = $_POST['skill_array_student'];
    $ty=$_POST['type'];
    //$q1 = "INSERT INTO skills VALUES ($id,'t','$s');";
    $q1 = "INSERT INTO skills (student_id,Type,Skill_name)
          SELECT $id,'$ty','$s'
          from dual
          WHERE NOT EXISTS (SELECT * from skills where Skill_name = '$s' and student_id = $id) ;";
    $query1 = mysqli_query($conn,$q1);
    echo $query1;
  }
  //achievement
  if(isset($_POST['a_type'])){
    $a_type = $_POST['a_type'];
    $description = $_POST['description'];
    $wl = $_POST['wl'];
    $certificate = $_POST['certificate'];
    // echo "function called";
    // send_mail($id, $a_type, $description, $wl, $certificate);
    $q2 = "INSERT INTO achivements VALUES ($id,'$a_type','$description','$wl','$certificate');";
    $query2 = mysqli_query($conn,$q2);
    echo $query2;
  }
  if(isset($_POST['something'])){
    $q1 = "SELECT  * FROM students natural join student_email
          WHERE  student_id=$id";
    $query1 = mysqli_query($conn,$q1);
    $value = mysqli_fetch_array($query1,MYSQLI_ASSOC);

    unset($_POST['something']);
    echo implode(',',$value);

  }
  if(isset($_POST['y'])){
    $q2 = " SELECT Skill_name FROM skills
            WHERE student_id = $id;";
    $query2 = mysqli_query($conn,$q2);
    unset($_POST['y']);
    $skill = '';
    while($row=mysqli_fetch_assoc($query2))
    {
      $skill = $skill.','.implode(',',$row);
    }
    echo substr($skill,1);
  }
  if(isset($_POST['z'])){
    $q3 = " SELECT * FROM achivements
            WHERE student_id = $id;";
    $query3 = mysqli_query($conn,$q3);
    unset($_POST['z']);
    $ach = '';
    while($row=mysqli_fetch_assoc($query3))
    {
      $ach = $ach.','.implode(',',$row);
    }
    echo substr($ach,1);
  }
  if(isset($_POST['skill_array']))
  {
    $skill_str = implode(',',$_POST['skill_array']);
    $q4 = "SELECT DISTINCT student_id FROM skills
        WHERE student_id not in ( SELECT student_id FROM (
        (SELECT student_id , Skill_name FROM (SELECT Skill_name FROM skills WHERE Skill_name in('$skill_str')) as p cross join
        (SELECT distinct student_id FROM skills) as sp)
        EXCEPT
        (SELECT student_id , Skill_name FROM skills) ) AS r ); ";
        // echo $skill_str.' '.'YO';
    $query4 = mysqli_query($conn,$q4);
    unset($_POST['skill_array']);
    $list = Array();
    while($row=mysqli_fetch_assoc($query4))
    {
      $list[]= $row['student_id'];
    }
    $list_str=implode(',',$list);
    // echo $list_str;
    $q5 = "SELECT * from students
          where student_id in ($list_str)";
    $query5 = mysqli_query($conn,$q5);
    $list1 = Array();
    while($row=mysqli_fetch_assoc($query5))
    {
      $list1[]= $row['student_id'];
      $list1[]= $row['First'];
      $list1[]= $row['Middle'];
      $list1[]= $row['Last'];
      $list1[]= $row['Date_of_birth'];
      $list1[]= $row['Study_year'];
      $list1[]= $row['Division'];
      $list1[]= $row['Batch'];
    }
    $list1_str=implode(',',$list1);
    echo $list1_str;
    // pratik ---write code here..
    // $query5 has result and has info about students. Echo the required information.
  }
  if(isset($_POST['updated'])){
    $upd = explode(',',$_POST['updated']);
    echo("Omkar");
    echo $upd[6];
    //$trigger="create trigger update after update on students for each row update student_email set Email = 'abcd@gmail.com' WHERE student_id = new.student_id ;";
    //$temp=mysqli_query($conn, $trigger);
    $q6 = "UPDATE students SET First = '$upd[1]',Middle = '$upd[2]',Last = '$upd[3]',Date_of_birth = '$upd[4]',Blood_grp = '$upd[5]' WHERE student_id = $upd[0];" ;
    $q7 = "UPDATE student_email SET Email = '$upd[6]' WHERE student_id = $upd[0];";
    $query6 = mysqli_query($conn,$q6);
    $query7 = mysqli_query($conn,$q7);
    echo("hello");
    echo($query6);
    echo($query7);
  }

  function send_mail($sid, $a_type, $description, $wl, $certificate){
            
    $mail = new PHPMailer(true);
    global $conn;

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'pratiknaik4799@gmail.com';                     // SMTP username
        $mail->Password   = 'uzumakinaruto@4799';                               // SMTP password
        $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 465;           // TCP port to connect to

        // echo $email['Email_id'];

        //Recipients
        $mail->setFrom('xyx@naikcorp.com', 'XYZ');
        // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
        $mail->addAddress('siddesh.pn23@gmail.com');               // Name is optional
        $mail->addReplyTo('pratiknaik4799@gmail.com', 'Reply');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        $qm = "select * from students where student_id=$sid";
        $query_mail = mysqli_query($conn, $qm);
        $details = mysqli_fetch_assoc($query_mail);
        $mn = $details['First'].' '.$details['Middle'].' '.$details['Last'];
        $my = $details['Study_year'];
        $md = $details['Division'];
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Recent achievement of a student';
        $mail->Body    = '
            <p>A student from our department has recently achieved a milestone</p>
            <h1>Name: '.$mn.'</h1>
            <h2>Year: '.$my.'</h2>
            <h2>Division: '.$md.'</h2>
            <h2>Achievement: '.$description.'</h2>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }
  
 ?>